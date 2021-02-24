<?php
error_reporting(E_ALL & ~E_NOTICE);

// echo $_GET['link'];

session_start();

$user_id =$_SESSION['user_id'];
$user_type =$_SESSION['user_type'];

include_once('../config/config.php');
if($_GET['link']){


$regard ="regards";
$date =date('h:i A l F jS ');
$regard_to = $_GET['link'];
$status = 0;
$check_user="select * from regards WHERE sender_id='$user_id' AND user_id='$regard_to'";   
      
$run=mysqli_query($dbC,$check_user);  

if(mysqli_num_rows($run))   
{
    echo "<script>window.history.go(-1)</script>";  

}else{


$insert_regards = "INSERT INTO regards (regard,date,user_id,sender_id,status)
VALUES ( '$regard', '$date','$regard_to','$user_id','$status')";

$query="mysql_num_rows($sql)";
if(mysqli_query($dbC, $insert_regards)){
    if($user_type === 'non_individual')
    echo "<script>window.open('non_individual_profile.php','_self')</script>";  
    else
    echo "<script>window.open('../index.php','_self')</script>";  


} else{
   echo "ERROR: Could not able to execute $insert_regards. " . mysqli_error($dbC);
}
}
}else{
    echo "<script>window.history.go(-1)</script>";  

}
?>