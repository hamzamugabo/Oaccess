
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
    <link type="text/css" rel="stylesheet" href="../css\bootstrap.css">   
    <!-- <link type="text/css" rel="stylesheet" href="../../css\layout2.css">  -->
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 
      
    <title> Add Award</title>   
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
                <div class="card-header" ">upload Award photo
                
                
                </div>
                
                <div class="card-body">
                <form method="POST" action="award.php"  enctype="multipart/form-data" class="mb-3">
  <div>
    <input  type="file" name="award">
    <label  for="chooseFile">Select file</label>
  </div>
  <div>
  <input type="text" name="title" placeholder="enter award title">
<br>
<br>
  <input type="text" name="from" placeholder="award From">
  </div>

  <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
    Upload Award
  </button>
</form>
                </div>
                <div style="text-align:center;">
                <?php

                if($current_user_type === "individual"){
                    echo '
                    <a href="individual_profile.php">Back to Profile</a>
                    ';
                }else{
                    echo '
                    <a href="non_individual_profile.php">Back to Profile</a>
                    ';
                }
                ?>
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