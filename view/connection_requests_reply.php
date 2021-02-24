
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

    <title>Connections Requests</title>   
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
                <div class="card-header">Connections Requests</div>

                <div class="card-body">
                    <?php
 $check_user="select * from connection_requests WHERE reciever_id ='$user_id' AND status = 0";   
      
 $run=mysqli_query($dbC,$check_user);
 while($row = mysqli_fetch_array($run)){ 
     $users =$row['sender_id'];
     $uid =$row['connection_id'];
    //  echo $uid;
     $check_name="select first_name,last_name from user WHERE user_id ='$users'"; 

 $run_name=mysqli_query($dbC,$check_name);
 $row_name = mysqli_fetch_assoc($run_name);
 $fname = $row_name['first_name'];
 $lname = $row_name['last_name'];

 
if($user_type === 'individual')
 $check_profile="select * from profile_individual WHERE user_id ='$users'"; 
 else
 $check_profile="select * from profile_non_individual WHERE user_id ='$users'"; 

 $run_profile=mysqli_query($dbC,$check_profile);
 $row_profile = mysqli_fetch_assoc($run_profile);


 $dp = "../images/dp/".$row_profile['photo'];
//  echo $row_profile['first_name'];

echo'
<div class="row">

<div class="col-4">
<a href="">'.$fname.'  '.$lname.'</a>
</div>
<div class="col-4">
<button type="button" class="btn btn-primary" >
  <a href="requests_update.php?link='.$uid.'" style="color:white;">Accept Connection Request</a>
</button>
</div>
</div>
';

 }

 if($user_type === 'individual'){
 echo'
 <br><br>
<div style="text-align:center;">
 <a href="individual_profile.php" style="text-align:center">Profile</a>
 </div>
 ';}
 else{
    echo'
    <br><br>
<div style="text-align:center;">

    <a href="non_individual_profile.php" style="text-align:center">Profile</a>
    </div>
    ';}  
 
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 