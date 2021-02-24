<?php
// error_reporting(E_ALL & ~E_NOTICE);

// echo $_GET['link'];

session_start();

$user_id =$_SESSION['user_id'];
$user_type =$_SESSION['user_type'];

include_once('../config/config.php');
if($_GET['link']){


$reciever_id =$_GET['link'];
// $date =date('h:i A l F jS ');
// $regard_to = $_GET['link'];
// $status = 1;
$sql = "DELETE FROM connection_requests WHERE reciever_id='$reciever_id' AND sender_id='$user_id'";

if (mysqli_query($dbC, $sql)) {
    if($user_type === 'individual')
    echo "<script>window.history.go(-1)</script>";  

    // echo "<script>window.open('non_individual_profile.php','_self')</script>";  
    else
    echo "<script>window.history.go(-1)</script>";  

    // echo "<script>window.open('non_individual_profile.php','_self')</script>";  


  } else {
    echo "Error updating record: " . mysqli_error($dbC);
  }
}else{
    echo "<script>window.alert('Something is Wrong')</script>";  

    echo "<script>window.history.go(-1)</script>";  

}
?>