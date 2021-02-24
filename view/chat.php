
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

    <title>Chat</title>   
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
            <div class="card">
                <div class="card-header">chat</div>

                <div class="card-body">
                    <?php

 $check_user="select * from connection_requests WHERE (reciever_id ='$user_id' OR sender_id ='$user_id') AND status = 1";   
//   if($check_user)  {}  
 $run=mysqli_query($dbC,$check_user);
 $num=mysqli_num_rows($run);
 if($num >= 1){
    //  echo 'yes';
 while($row = mysqli_fetch_array($run)){ 
     $users =$row['sender_id'];
     $rec =$row['reciever_id'];
    //  echo  $users;
    //  echo  '<br>';
    //  echo  $rec;
     $uid =$row['connection_id'];
     $chat1 = "select * from message WHERE (sender_id='$users' OR reciever_id='$rec') AND status=0";
     $chat1_result = mysqli_query($dbC,$chat1);
     $num_message=mysqli_num_rows($chat1_result);

    //  echo $uid;
    if($users === $user_id)
     $check_name="select user_id, user_type, first_name,last_name from user WHERE user_id ='$rec'"; 
     else
     $check_name="select user_id, user_type, first_name,last_name from user WHERE user_id ='$users'"; 


 $run_name=mysqli_query($dbC,$check_name);
 $row_name = mysqli_fetch_assoc($run_name);
 $fname = $row_name['first_name'];
 $lname = $row_name['last_name'];
 $utype = $row_name['user_type'];
 $sender_id = $row_name['user_id'];
//  echo $sender_id;

 
 $chat1 = "select * from message WHERE sender_id='$sender_id' AND status=0";
 $chat1_result = mysqli_query($dbC,$chat1);
 $num_message=mysqli_num_rows($chat1_result);

if($utype === 'individual')
 $check_profile="select * from profile_individual WHERE user_id IN ($users,$rec)"; 
 else
    $check_profile="select * from profile_non_individual WHERE user_id IN ($users,$rec)"; 

    $run_profile=mysqli_query($dbC,$check_profile);
//  if($run_profile)
 $row_profile = mysqli_fetch_assoc($run_profile);
//  else
//  echo "ERROR: Could not able to execute $check_profile. " . mysqli_error($dbC);




 $dp = "../images/dp/".$row_profile['photo'];
//  echo $row_profile['first_name'];
if($num_message){

echo'
<div class="row">
<div class="col-2">
<img src='.$dp.'  style="border-radius: 50%;" width="20px" height="40px">

</div>

<div class="col-4">
<a href="message.php?link='.$sender_id.'">'.$fname.'  '.$lname.' '.$num_message.'</a>
</div>
</div>
<br>
';

}else{
 
echo'
<div class="row">
<div class="col-2">
<img src='.$dp.'  style="border-radius: 50%;" width="20px" height="40px">

</div>

<div class="col-4">
<a href="message.php?link='.$sender_id.'">'.$fname.'  '.$lname.' </a>
</div>
</div>
<br>

';   
}

 }
}else{
    // echo 'no';
    $check_user="select * from connection_requests WHERE sender_id ='$user_id' AND status = 1";   
    //   if($check_user)  {}  
     $run=mysqli_query($dbC,$check_user);
     $num=mysqli_num_rows($run);
    while($row = mysqli_fetch_array($run)){ 
        $users =$row['reciever_id'];
        $uid =$row['connection_id'];
        
    
       //  echo $uid;
        $check_name="select user_id, user_type, first_name,last_name from user WHERE user_id ='$users'"; 
   
    $run_name=mysqli_query($dbC,$check_name);
    $row_name = mysqli_fetch_assoc($run_name);
    $fname = $row_name['first_name'];
    $lname = $row_name['last_name'];
    $utype = $row_name['user_type'];
    $reciever_id = $row_name['user_id'];
   
    $chat1 = "select * from message WHERE sender_id='$reciever_id' AND status=0";
    $chat1_result = mysqli_query($dbC,$chat1);
    $num_message=mysqli_num_rows($chat1_result);
    // echo $num_message;
   if($utype === 'individual')
    $check_profile="select * from profile_individual WHERE user_id ='$users'"; 
    else
       $check_profile="select * from profile_non_individual WHERE user_id ='$users'"; 
   
       $run_profile=mysqli_query($dbC,$check_profile);
   //  if($run_profile)
    $row_profile = mysqli_fetch_assoc($run_profile);
   //  else
   //  echo "ERROR: Could not able to execute $check_profile. " . mysqli_error($dbC);
   
   
   
   
    $dp = "../images/dp/".$row_profile['photo'];
   //  echo $row_profile['first_name'];
   
   if($num_message){

    echo'
    <div class="row">
    <div class="col-2">
    <img src='.$dp.'  style="border-radius: 50%;" width="20px" height="40px">
    
    </div>
    
    <div class="col-4">
    <a href="message.php?link='.$reciever_id.'">'.$fname.'  '.$lname.' '.$num_message.'</a>
    </div>
    </div>
    ';
    
    }else{
     
    echo'
    <div class="row">
    <div class="col-2">
    <img src='.$dp.'  style="border-radius: 50%;" width="20px" height="40px">
    
    </div>
    
    <div class="col-4">
    <a href="message.php?link='.$reciever_id.'">'.$fname.'  '.$lname.' </a>
    </div>
    </div>
    ';   
    }
    }
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
 