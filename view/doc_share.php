
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
$current_user_id = $_SESSION['user_id'];
$current_user_type = $_SESSION['user_type'];
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>Document share</title>   
</head>   
<style>   
    .login-panel {   
        margin-top: 150px;   }
        .content {
  display: none;
}
input[type="radio"]:checked + div,
input[type="radio"]:checked + input {
  display: block;
}
</style>   
<body class="home" style="background-color: lightgray;">   
<div id="login-header">
             <div class="container">
                 <div class="row">
                     <div class="col-md-3 logo"><img src="../images/official-access-logo.png"/></div>
          <div class="pull-right col-md-6" style="float: right;">
        <!-- <div class="loginform"> -->
        <form method="POST" action="logout.php" style="float:right">
        <div class="row">
        <!-- <div style="float:right"> -->

                                <button type="submit" class="btn btn-primary">
                                   Logout
                                </button>
                            <!-- </div> -->
                            
                        </div>
        </form>

        <!-- </div> -->
         
         </div>
         
                 </div>
         
              
             </div>
         </div> 
     
<div class="container">
    <div class="row justify-content-center" style="padding-top: 0px;">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Share Documents</div>

                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                  
                        
                       
                        
                        
                         
                        <div class="form-group row">
                        <label for="member_name" class="col-md-3 col-form-label text-md-right">Select documents</label>

<div class="col-md-3">
<div>
    <input type="file" name="fileUpload[]"  id="chooseFile" multiple required>
  </div>
 
      
</div>
                            <label for="member_name" class="col-md-3 col-form-label text-md-right">Select</label>

                            <div class="col-md-3">
                            <select multiple name="partner[]"  class="form-control" id="exampleFormControlSelect2" required>
                            <?php
    include("../config/config.php");   

 $app="select * from user WHERE user_id !=$current_user_id ";   



 if($app_data = mysqli_query($dbC,$app)){

   while($row_app = mysqli_fetch_array($app_data)){
//    $app_photo = "../images/applications/".$row_app['app_logo'];
$app_name = $row_app['first_name'];
$lname = $row_app['last_name'];
$user_id = $row_app['user_id'];
echo
'
<option>
   '.$app_name.' '.$lname.'    
      
</option>
';
} 
}

?>
     
    </select>
                             
                                  
                            </div>
                           
                            
                        </div>

                        
                       

                       

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                            
                                <button type="submit" name="submit" class="btn btn-primary">
                                   Add
                                </button>
                                &nbsp&nbsp
                                <?php
                                if($current_user_type === 'individual')
                                {
                                    echo '
                                    <a href="individual_profile.php">back to profile</a>
                                      
                                      ';
                                }
                                else{
                                    echo '
                                  <a href="non_individual_profile.php">back to profile</a>
                                    
                                    ';

                                }
                                ?>
                                
                              
                               
                                  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>  
 <?php
//  if(isset($_POST['project'],$_POST['date'])){

    // $hostname = "localhost";
    // $username = "root";
    // $password = "";
    // try {
    //     $conn = new PDO("mysql:host=$hostname;dbname=business_access", $username, $password);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     //echo "Database connected successfully";
    // } catch(PDOException $e) {
    //     echo "Database connection failed: " . $e->getMessage();
    // }


    if(isset($_POST['submit'])){
        
        $uploadsDir = "../images/docs/";
        $allowedFileType = array('pdf','doc','docx');
        $time_stamp = date("Y-m-d h:i:sa");

        // Velidate if files exist
        if (!empty(array_filter($_FILES['fileUpload']['name']))) {
            
            // Loop through file items
            foreach($_FILES['fileUpload']['name'] as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['fileUpload']['name'][$id];
                $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
                $fileName_trim =str_replace(' ', '', $fileName);
                $targetFilePath  = $uploadsDir . $fileName_trim;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $user_id = $_SESSION['user_id'];
                // $text = $_POST['text'];

                foreach ($_POST['partner'] as $icon) 
      {

        
       
      $pizza  = $icon.',';
$pieces = explode(",", $pizza);
      
// echo $icon;

      $user_one = $pieces[0];
$user_one_sepa = explode(" ", $user_one);
// echo $user_one_sepa[0];
$fname = $user_one_sepa[0];
//   echo $fname;
//   echo '<br>';
$lname = $user_one_sepa[1];
 

$check_user="select * from user WHERE first_name='$fname'AND last_name='$lname'";   
      
$run=mysqli_query($dbC,$check_user);   


$uploadOk = 1;

                if(in_array($fileType, $allowedFileType)){
                    while($row = mysqli_fetch_array($run)){
                        $userid = $row['user_id'];
                        $user_type = $row['user_type'];
                      
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            // echo $userid;
                            // echo '<br>';
                            
                            $sqlVal = "('".$fileName_trim."','".$current_user_id."','".$userid."','".$time_stamp."')";
                            // echo $fileName_trim;
                            // echo '<br>';

                            
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }

                        if(!empty($sqlVal)) {
                            // echo $userid;
                            // echo '<br>';
                            $insert = "INSERT INTO documents (document,sender_id,reciever_id,time_stamp) VALUES
                             ( '$fileName_trim','$current_user_id','$userid', '$time_stamp')";

                            if($insert) {
                                if(mysqli_query($dbC, $insert)){

                                    $response = array(
                                        "status" => "alert-success",
                                        "message" => "Files successfully uploaded."
                                    );
                                    if($current_user_type === 'individual')
                echo "<script>window.open('individual_profile.php','_self')</script>";  
                else
                echo "<script>window.open('non_individual_profile.php','_self')</script>";   
            
                                                } else{
                                                   echo "ERROR: Could not able to execute $insert. " . mysqli_error($dbC);
                                                }
                               
        
                            } else {
                                $response = array(
                                    "status" => "alert-danger",
                                    "message" => "Files coudn't be uploaded due to database error."
                                );
                            }
                        }
                    }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
            
                // Add into MySQL database
                
// }
        
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
// $date =$_POST['date'];
// $project_name = $_POST['project'];
    

//  }
 ?>