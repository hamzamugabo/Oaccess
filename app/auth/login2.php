<?php   
session_start();//session starts here   

if(isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['pass'])){
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $email =$_POST['email'];
    $pass =$_POST['pass'];
}else{
    echo "<script>window.history.go(-1)</script>";  

}
 
  ?> 
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../../css\bootstrap.css">   
    <!-- <link type="text/css" rel="stylesheet" href="../../css\layout2.css">  -->
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 
      
    <title>Login</title>   
</head>   
<style>   
    .login-panel {   
        margin-top: 150px;   }


   
</style>   
   
<body class="home" style="background-color: lightgray;">   
<div id="login-header">
             <div class="container">
                 <div class="row">
                     <div class="col-md-3 logo"><img src="../../images/official-access-logo.png"/></div>
          <div class="pull-right col-md-6" style="float: right;">
        <!-- <div class="loginform"> -->
        <form method="POST" action="login_backend.php" style="float:right">
        <div class="row">
        <!-- <div style="float:right"> -->

                                    <label for="email" style="color:white" >Email</label>

                            <input id="email" type="email"  name="email" required autocomplete="email" >


                                
                                    
                                <!-- </div>
                                <div style="float:right"> -->

                                <label for="email" style="color: white;" >Password</label>

                                <input id="password" type="password"  name="password" required >

                         
                                <button type="submit" class="btn btn-primary">
                                   Login
                                </button>
                            <!-- </div> -->
                            
                        </div>
        </form>

        <!-- </div> -->
         
          <div class="forgotp"><a href="forgotpassword.php"><u>Forgot Password?</u></a></div> 
         </div>
         
                 </div>
         
              
             </div>
         </div>
         <div class="container">
    <div class="row justify-content-center" style="padding-top: 50px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ">Registration
                
                
                </div>

                <div class="card-body">
                    <form method="POST" action="register_backend.php">
                  

                    <div class="form-group row">
                            <!-- <label for="email" class="col-md-3 col-form-label text-md-right">First Name</label> -->

                            <div class="col-md-3">
                                <input hidden value="<?php echo $fname  ?>"  type="text" class="form-control " name="fname" required autocomplete="fname" autofocus>

                             
                                  
                            </div>
                            <!-- <label for="email" class="col-md-3 col-form-label text-md-right">Last Name</label> -->

                            <div class="col-md-3">
                                <input   hidden value="<?php echo $lname  ?>"  type="text" class="form-control" name="lname" required autocomplete="lname" autofocus>

                             
                                  
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label> -->

                            <div class="col-md-3">
                                <input  hidden value="<?php echo $email  ?>"  type="email" class="form-control" name="email" required autocomplete="email" autofocus>

                             
                                  
                            </div>
                            <!-- <label for="password" class="col-md-3 col-form-label text-md-right">Password</label> -->

<div class="col-md-3">
    <input  hidden value="<?php echo $pass  ?>" id="password" type="password" class="form-control " name="pass" required autocomplete="current-password">

  
        
   
</div>
                            
                        </div>

                        <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Gender:</label>

                            <input class="check-form-input" type="radio" name="gender" value="male">
                            <label for="male" class="form-check-lebel">male</label>
                            <input class="check-form-input" type="radio" name="gender" value="female">
                            <label for="male" class="form-check-lebel">female</label>


                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-3 col-form-label text-md-right">DOB</label>

                            <div class="col-md-3">
                                <input id="date" type="date" class="form-control" name="dob" required autocomplete="gender" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Official Contact</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="contact" required autocomplete="contact" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">User Type:</label>

                            <input class="check-form-input" type="radio" name="user_type" value="individual" required>
                            <label for="male" class="form-check-lebel">Individual</label>
                            <input class="check-form-input" type="radio" name="user_type" value="non_individual" required>
                            <label for="male" class="form-check-lebel">Non Individual</label>


                        </div>

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>

                               
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
