
<?php 

include_once('../config/config.php');
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
if($_GET['link'])
$reciever_id = $_GET['link'];
else
$reciever_id = $_SESSION['reciever_id'];

if($_GET['link']){
    $update = $_GET['link'];
    $update_message="UPDATE message SET status=1 WHERE sender_id='$update'";

if (mysqli_query($dbC, $update_message)) {
    // echo "yes"; 
    $yes='yes'; 

  } else {
    echo "Error updating record: " . mysqli_error($dbC);
  }
}else{
    $update = $_SESSION['reciever_id'];
    $update_message="UPDATE message SET status=1 WHERE sender_id='$update'";

if (mysqli_query($dbC, $update_message)) {
    // echo "yes"; 
    $yes='yes'; 

  } else {
    echo "Error updating record: " . mysqli_error($dbC);
  }

}

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
        <br>
        <br>
            <div class="card">
                <div class="card-header">
                <?php
                if($_GET['link']){

                    $reciever_id = $_GET['link'];
 $reciever_names="select user_type, first_name,last_name from user WHERE user_id ='$reciever_id'";   
 $run_reciever=mysqli_query($dbC,$reciever_names);
 $row_reciever = mysqli_fetch_assoc($run_reciever);
 $reciever_fname =$row_reciever['first_name'];
 $reciever_lname =$row_reciever['last_name'];
 $reciever_type =$row_reciever['user_type'];
if($reciever_type === 'individual')
 $reciever_dp="select photo from profile_individual WHERE user_id ='$reciever_id'"; 
 else  
 $reciever_dp="select photo from profile_non_individual WHERE user_id ='$reciever_id'"; 

 $run_reciever_dp=mysqli_query($dbC,$reciever_dp);
 $row_reciever_dp = mysqli_fetch_assoc($run_reciever_dp);
 $dp_photo ="../images/dp/".$row_reciever_dp['photo'];


 echo'
 <div class="row">
<div class="col-2">
<img src='.$dp_photo.'  style="border-radius: 50%;" width="20px" height="40px">

</div>

<div class="col-4">
'.$reciever_fname.'  '.$reciever_lname.'
</div>
</div>
 ';

                }
                ?>
                
                </div>

                <div class="card-body" >
                <!-- <div style="float: left;"> -->
                <?php

$chat1 = "select * from message WHERE reciever_id IN ($reciever_id,$user_id) AND sender_id IN ($reciever_id,$user_id)";
$chat1_result = mysqli_query($dbC,$chat1);
while( $all_row_chat1 = mysqli_fetch_array($chat1_result)){
    $message = $all_row_chat1['message'];
    $senderid = $all_row_chat1['sender_id'];
    $recieverid = $all_row_chat1['reciever_id'];
    if($senderid===$reciever_id &&  $recieverid === $user_id)
        $who = $reciever_fname;
        else
        $who = 'you';
        echo '
        <strong>'.$who.':</strong> '.$message.'
        
        <br><br>';
    // {
        // echo '
        // <div style="padding:1px;background-color:lightgray;color:black;"border-radius: 20%;">
        // '.$message.'
        
        // </div><br>';
    // }else
    // {
    //     echo '
    //     <div style="padding:1px;background-color:lightgreen;color:black;"border-radius::50%;">
    //     '.$message.'
    //     </div><br>
    //     <br>
    //     ';
    // }
   
}
?>
                <!-- </div> -->

                <!-- <div style="text-align: right;float:right"> -->
                <?php
// WHERE sender_id='$reciever_id' AND reciever_id='$user_id'
                    $chat2 = "select * from message WHERE sender_id='$user_id' AND reciever_id='$reciever_id'";
                    $chat2_result = mysqli_query($dbC,$chat2);
                    while( $all_row_chat2 = mysqli_fetch_array($chat2_result)){
                        $message = $all_row_chat2['message'];
                        // echo '
                        // <div style="padding:1px;background-color:lightgreen;color:black;"border-radius::50%;">
                        // '.$message.'
                        // </div><br>
                        // <br>
                        // ';
                    }
                    ?>
                
                <!-- </div> -->
                <div></div>
                   
                    
                </div>
                <?php
 
 
 echo '
 <form method="POST" action="send_message.php">
 <div class="form-group row">

                            <div class="col-md-8">
                            <textarea rows="2" cols="50" required name="content" placeholder="Enter message..."></textarea>
                             
                            <input hidden value="'.$reciever_id.'"  type="text" class="form-control" name="reciever_id" required>
                                  
                            </div>
                            <div class="col-md-1">
&nbsp                             
                                  
                            </div>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                            send
                         </button>

                                  
                            </div>
                            
                        </div>
                        </form>
 ';

 if($user_type === 'individual'){
 echo'
 <br>
<div style="text-align:center;">
 <a href="individual_profile.php" style="text-align:center">Profile</a>
 </div>
 ';}
 else{
    echo'
    <br>
<div style="text-align:center;">

    <a href="non_individual_profile.php" style="text-align:center">Profile</a>
    </div>
    ';}  
 
                    ?>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 