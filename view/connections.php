
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

    <title>Potential Connections</title>   
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
                <div class="card-header">Potential Connections</div>

                <div class="card-body">
                    <?php
            //    $check_user_conn="select sender_id,reciever_id from connection_requests WHERE sender_id !='$user_id' OR reciever_id !='$user_id'";   
            //    //   if($check_user)  {}  
            //     $run_conn=mysqli_query($dbC,$check_user_conn);
            //     $num=mysqli_num_rows($run_conn);
            //     if($num != 0){
            //        //  echo 'connection';
            //     while($row_conn = mysqli_fetch_array($run_conn)){ 
                  
            //         $senderid =$row_conn['sender_id'];
            //         $recieverid =$row_conn['reciever_id'];
            //    echo $senderid;
            //    echo $recieverid;
            //    echo $user_id;
                    // $json = [$senderid, $recieverid];
//                if($user_id != $recieverid)
//  $check_user="select * from user WHERE user_id IN ($recieverid) ";   

//             //    $wall="select * from wall WHERE user_id IN ($user_id,$senderid) ";   
//                elseif($user_id != $senderid)
//  $check_user="select * from user WHERE user_id IN ($senderid)";
//  else   
 $check_user="select * from user WHERE user_id !='$user_id'";   

            //    $wall="select * from wall WHERE user_id IN ($recieverid) ";


      
 $run=mysqli_query($dbC,$check_user);
 while($row = mysqli_fetch_array($run)){ 

    
     $fname =$row['first_name'];
     $lname =$row['last_name'];
     $uid =$row['user_id'];
     $u_type =$row['user_type'];


if($u_type === 'individual')
 $check_profile="select * from profile_individual WHERE user_id ='$uid'"; 
 else
 $check_profile="select * from profile_non_individual WHERE user_id ='$uid'"; 

 $run_profile=mysqli_query($dbC,$check_profile);
 $row_profile = mysqli_fetch_assoc($run_profile);

 $dp = "../images/dp/".$row_profile['photo'];

echo'
<div class="row">
<div class="col-1">
<img src='.$dp.'  style="border-radius: 50%;" width="20px" height="40px">

</div>
<div class="col-4">
'.$fname.'  '.$lname.'
</div>
<div class="col-4">
<button type="button" class="btn btn-primary" >
  <a href="connection_request.php?link='.$uid.'" style="color:white;">Send Connection Request</a>
</button>
</div>
</div>
';

 }
                // }
                //             }                // }
                    // else{
                    //     // echo "no";
                    //     $check_user="select * from user WHERE user_id !='$user_id'";   
      
                    //     $run=mysqli_query($dbC,$check_user);
                    //     while($row = mysqli_fetch_array($run)){ 
                    //         $fname =$row['first_name'];
                    //         $lname =$row['last_name'];
                    //         $uid =$row['user_id'];
                    //         $u_type =$row['user_type'];
                       
                       
                    //    if($u_type === 'individual')
                    //     $check_profile="select * from profile_individual WHERE user_id ='$uid'"; 
                    //     else
                    //     $check_profile="select * from profile_non_individual WHERE user_id ='$uid'"; 
                       
                    //     $run_profile=mysqli_query($dbC,$check_profile);
                    //     $row_profile = mysqli_fetch_assoc($run_profile);
                       
                    //     $dp = "../images/dp/".$row_profile['photo'];
                       
                    //    echo'
                    //    <div class="row">
                    //    <div class="col-1">
                    //    <img src='.$dp.'  style="border-radius: 50%;" width="20px" height="40px">
                       
                    //    </div>
                    //    <div class="col-4">
                    //    '.$fname.'  '.$lname.'
                    //    </div>
                    //    <div class="col-4">
                    //    <button type="button" class="btn btn-primary" >
                    //      <a href="connection_request.php?link='.$uid.'" style="color:white;">Send Connection Request</a>
                    //    </button>
                    //    </div>
                    //    </div>
                    //    ';
                       
                    //     }

                    // }

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
 