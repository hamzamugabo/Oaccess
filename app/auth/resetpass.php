<?php   
session_start();//session starts here   
   
?>   
   
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../../css\bootstrap.css">   
    <!-- <link type="text/css" rel="stylesheet" href="../../css\layout2.css">  -->
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 
      
    <title>password reset</title>   
</head>   
<style>   
    .login-panel {   
        margin-top: 150px;   }


   
</style>   
   
<body class="home" style="background-color: lightgray;">   

         <div class="container">
    <div class="row justify-content-center" style="padding-top: 50px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ">Forgot Reset
                
                
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                  

                    <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Enter new password</label>

                            <div class="col-md-3">
                                <input  type="password" class="form-control " name="pass" required  autofocus>

                             
                                  
                            </div>
                            <label for="pass" class="col-md-3 col-form-label text-md-right">Confirm password</label>

                            <div class="col-md-3">
                                <input  type="password" class="form-control " name="pass2" required autofocus>

                             
                                  
                            </div>
                            
                            
                        </div>

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Reset
                                </button>

                               
                            </div>
                        </div>
                        
                      
<?php
   include("../../config/config.php");   

if(isset($_POST['pass'],$_POST['pass2'])){

       if($_POST['pass'] === $_POST['pass2']){
        $user_pass = $_POST['pass'];
    $user_email=$_SESSION['mail']; 
    $check_user_ind = "UPDATE user SET password='$user_pass' WHERE email='$user_email' "; 
    
$run_ind=mysqli_query($dbC,$check_user_ind);  
// $count=mysqli_num_rows($run_ind);
if($run_ind){
       $_SESSION['mail'] = $_POST['email'];
      
        echo "<script>window.open('login.php','_self')</script>";

       
       
    }else{
   echo "ERROR: Could not able to execute $check_user_ind. " . mysqli_error($dbC);

       }
}else{
    $wrong_email = "Passwords dont match";

echo '<strong style="color:red;">'.$wrong_email.'</strong>';

}

}
?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>   
</html>

