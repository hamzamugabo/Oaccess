
<?php 

include_once('../config/config.php');
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>Account Settings</title>   
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
        <form method="POST" action="../app/auth/logout.php" style="float:right">
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
                <div class="card-header">Account Settings</div>

                <div class="card-body">
                    
                   <h4>Profile</h4>
                   <?php
                   if($user_type === 'individual')
                   echo' <p ><a href="individual_profile.php"> View Profile</a></p> ';
                   else
                   echo' <p ><a href="non_individual_profile.php"> View Profile</a></p> ';

                   ?>

<?php
                   if($user_type === 'individual')
                   echo' <p ><a href="../app/auth/edit_individual_profile.php"> Edit Profile</a></p> ';
                   else
                   echo' <p ><a href="../app/auth/edit_non_individual_profile.php"> Edit Profile</a></p> ';

                   ?>
                   <p ><a href="../app/auth/delete_profile.php"> Delete Profile</a></p> 

                 
                   <h4>Account</h4>
                   <p ><a href="../app/auth/delete_account.php"> Delete Account</a></p> 

                   <h4>Wall</h4>
                   <p><a href="view_posts.php"> View Posts</a></p>

                   <h4>Privacy</h4>
                   


                    
                    
                    <?php
           

 if($user_type === 'individual'){
 echo'
 <br><br>
<div style="text-align:center;">
 <a href="individual_profile.php" style="text-align:center">Profile</a>
 <a href="../index.php" style="text-align:center">Home</a>
 <a href="account.php" style="text-align:center">Account</a>
 </div>
 ';}
 else{
    echo'
    <br><br>
<div style="text-align:center;">

    <a href="non_individual_profile.php" style="text-align:center">Profile</a>
    <a href="../index.php" style="text-align:center">Home</a>
    <a href="account.php" style="text-align:center">Account</a>


    </div>
    ';}  
    
 
                    ?>
                     <!-- <br><br>
<div style="text-align:center;">

    <a href="../index.php" style="text-align:center">Home</a>
    </div>

    <br><br>
<div style="text-align:center;">

    <a href="account.php" style="text-align:center">Account</a>
    </div> -->
    
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 