<?php
// error_reporting(E_ALL & ~E_NOTICE);

// echo $_GET['link'];

session_start();

$user_id =$_SESSION['user_id'];
$user_type =$_SESSION['user_type'];

include_once('../config/config.php');
if($_GET['link']){


$event_id =$_GET['link'];
$date =date('h:i A l F jS ');
// $regard_to = $_GET['link'];
$status = 1;
$check_user="select * from interested WHERE interested_id='$user_id' AND event_id='$event_id'";   
      
$run=mysqli_query($dbC,$check_user);  
$count=mysqli_num_rows($run);
if($count < 1)   
{

$sql ="INSERT INTO interested (interested_id,event_id)
VALUES ( '$user_id', '$event_id')";

if (mysqli_query($dbC, $sql)) {
    // if($user_type === 'individual')
    echo "<script>window.history.go(-1)</script>";  

    // echo "<script>window.open('non_individual_profile.php','_self')</script>";  
    // else
    // echo "<script>window.history.go(-1)</script>";  

    // echo "<script>window.open('non_individual_profile.php','_self')</script>";  


  } else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);

  }
}else{
    echo "<script>window.history.go(-1)</script>";  
    // echo 'exists';

}
}
?>