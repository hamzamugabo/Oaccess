<?php
error_reporting(E_ALL & ~E_NOTICE);

// echo $_GET['link'];

session_start();

$user_id =$_SESSION['user_id'];
$user_type =$_SESSION['user_type'];

include_once('../config/config.php');
if($_GET['link']){


// $regard ="regards";
$date =date('h:i A l F jS ');
$reciever_id = $_GET['link'];
$status = 0;
// echo $user_id;
// echo $reciever_id;




$check_user="select sender_id,reciever_id from connection_requests WHERE sender_id ='$user_id' AND reciever_id='$reciever_id' ";   
      
$run=mysqli_query($dbC,$check_user);  

if(mysqli_num_rows($run)!=0)   
{
    // echo mysqli_num_rows($run);
    $check_user2="select sender_id,reciever_id from connection_requests WHERE sender_id ='$user_id' OR reciever_id='$user_id' ";   
      
$run2=mysqli_query($dbC,$check_user2); 
// echo mysqli_num_rows($run2);
if( mysqli_num_rows($run2)!=0)
// while($row_conn = mysqli_fetch_array($run2)){ 
   
//     $senderid =$row_conn['sender_id'];
//     $recieverid =$row_conn['reciever_id'];
//     echo $senderid;
//     echo '<br>';
//     echo $recieverid;




// }
   { echo "<script>window.history.go(-1)</script>";  }else{
    $insert_requests = "INSERT INTO connection_requests (sender_id,reciever_id,status,date)
    VALUES ( '$user_id', '$reciever_id','$status','$date')";
    
    $query="mysql_num_rows($sql)";
    if(mysqli_query($dbC, $insert_requests)){
        echo "<script>window.open('connections.php','_self')</script>";  
      
    } else{
       echo "ERROR: Could not able to execute $insert_requests. " . mysqli_error($dbC);
    }
   }

}else{


$insert_requests = "INSERT INTO connection_requests (sender_id,reciever_id,status,date)
VALUES ( '$user_id', '$reciever_id','$status','$date')";

$query="mysql_num_rows($sql)";
if(mysqli_query($dbC, $insert_requests)){
    echo "<script>window.open('connections.php','_self')</script>";  
  
} else{
   echo "ERROR: Could not able to execute $insert_requests. " . mysqli_error($dbC);
}
}
}else{
    echo "<script>window.history.go(-1)</script>";  

}
?>