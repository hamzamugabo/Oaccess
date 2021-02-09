<?php   
session_start();//session starts here   
   
?>   
   
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../../css\bootstrap.css">   
    <!-- <link type="text/css" rel="stylesheet" href="../../css\layout2.css">  -->
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 
      
    <title>forgot password</title>   
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
           <!-- <span  style="color: red;"> <?php echo $wrong_email;?></span> -->
                <div class="card-header" ">Forgot Pasword
                
                
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                  

                    <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Enter Email</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control " name="email" required autocomplete="email" autofocus>

                             
                                  
                            </div>
                            
                            
                        </div>

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   send
                                </button>

                               
                            </div>
                        </div>
                        
                      
<?php
   include("../../config/config.php");   

if(isset($_POST['email'])){
       
    $user_email=$_POST['email'];   
    $check_user_ind="select *  from user WHERE email='$user_email'";   
    // $count=mysqli_num_rows($result);
$run_ind=mysqli_query($dbC,$check_user_ind);  
$count=mysqli_num_rows($run_ind);
if($count == 1)
       $_SESSION['mail'] = $_POST['email'];
       if($count === 1){
        echo "<script>window.open('resetpass.php','_self')</script>";

       }else{
           $wrong_email = "Wrong Email";
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

