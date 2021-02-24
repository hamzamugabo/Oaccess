
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Account</title>   
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
        <div class="col-md-6">
        <a href="../index.php">Home</a>
        &nbsp&nbsp&nbsp
        <a href="non_individual_profile.php">Profile</a>
            <div class="card">
                <div class="card-header"><h4>Account Settings</h4></div>

                <div class="card-body">
                

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      if($user_type === 'individual')
      {
echo'
<button type="button" class="btn btn-link"><a href="account_settings.php" ">Account Setting </a></button><br><br>

';
      }else{
        echo'
        <button type="button" class="btn btn-link"><a href="account_settings.php" ">Account Setting </a></button><br><br>
        
        ';
      }
      ?>
        <button type="button" class="btn btn-link"><a href="" ">Help Center</a></button><br><br>
        <button type="button" class="btn btn-link"><a href="../app/auth/logout.php" ">Logout</a></button><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Account 
</button><br><br>
        <!-- <button type="button" class="btn btn-primary">Account </button><br><br> -->
        <?php
      if($user_type === 'individual')
      {
echo'
<button type="button" class="btn btn-primary"><a href="../app/auth/edit_individual_profile.php" style="color:white;" >Account Setting Profile</button><br><br>

';
      }else{
        echo'
<button type="button" class="btn btn-primary"><a href="../app/auth/edit_non_individual_profile.php" style="color:white;">Account Setting Profile</button><br><br>
        
        ';
      }
      ?>
        <button type="button" class="btn btn-primary"><a href="connection_settings.php" style="color: white;">Account Setting Business Connections</a></button><br><br>
        <button type="button" class="btn btn-primary"><a href="privacy.php" style="color: white;">Account Setting Privacy</a></button><br>
                   
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 