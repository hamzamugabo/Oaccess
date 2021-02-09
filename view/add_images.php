<?php 
    // Database
    // include 'config/database.php'; 
    session_start();
    $hostname = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$hostname;dbname=business_access", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Database connected successfully";
    } catch(PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }


    if(isset($_POST['submit'])){
        
        $uploadsDir = "../images/gallery/";
        $allowedFileType = array('jpg','png','jpeg','PNG','JPG');
        
        // Velidate if files exist
        if (!empty(array_filter($_FILES['fileUpload']['name']))) {
            
            // Loop through file items
            foreach($_FILES['fileUpload']['name'] as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['fileUpload']['name'][$id];
                $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $project_id = $_SESSION['project_id'];

                $uploadOk = 1;

                if(in_array($fileType, $allowedFileType)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            $sqlVal = "('".$fileName."', '".$project_id."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO project_images (file_name,project_id) VALUES $sqlVal");
                    if($insert) {
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
    echo "<script>window.open('project.php','_self')</script>";   

                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }

        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
    } 
?> 
   
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css\bootstrap.css">   
    <!-- <link type="text/css" rel="stylesheet" href="../../css\layout2.css">  -->
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 
      
    <title> upload photos</title>   
</head>   
<style>   
    .login-panel {   
        margin-top: 150px;   }


   
</style>   
   
<body class="home" style="background-color: lightgray;">   

         <div class="container">
    <div class="row justify-content-center" style="padding-top: 50px;">
        <div class="col-md-6">
            <div class="card">
           <!-- <span  style="color: red;"> <?php echo $wrong_email;?></span> -->
                <div class="card-header" ">upload project photos
                
                
                </div>

                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="mb-3">
  <div>
    <input type="file" name="fileUpload[]"  id="chooseFile" multiple>
    <label  for="chooseFile">Select file</label>
  </div>
  <div>
  <label  for="text">Text</label>

    <input type="text" name="text"  required>
  </div>

  <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
    Upload photos
  </button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>   
</html>





<!-- <form action="" method="post" enctype="multipart/form-data" class="mb-3">
  <div class="custom-file">
    <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
    <label class="custom-file-label" for="chooseFile">Select file</label>
  </div>

  <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
    Upload Files
  </button>
</form> -->