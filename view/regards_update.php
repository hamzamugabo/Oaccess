<?php
error_reporting(E_ALL & ~E_NOTICE);

// echo $_GET['link'];

session_start();

$user_id =$_SESSION['user_id'];
$user_type =$_SESSION['user_type'];

include_once('../config/config.php');
if($_GET['link']){


$regard_id =$_GET['link'];
$date =date('h:i A l F jS ');
$regard_to = $_GET['link'];
$status = 1;
$sql = "UPDATE regards SET status='$status' WHERE regard_id='$regard_id'";

if (mysqli_query($dbC, $sql)) {
    echo "<script>window.open('non_individual_profile.php','_self')</script>";  

  } else {
    echo "Error updating record: " . mysqli_error($dbC);
  }
}else{
    echo "<script>window.history.go(-1)</script>";  

}
?>