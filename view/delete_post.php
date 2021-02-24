<?php
session_start();//session starts here   
// echo $_SESSION['email']
$user_id =  $_SESSION['user_id'];
$index =  $_SESSION['index'];
$user_type =  $_SESSION['user_type'];

if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('../app/auth/login.php','_self')</script>";  
}
                include("../config/config.php");   

if($_POST['wall_id']){
// $comment_date=  date('h:i A l F jS ');
// $comment = 'liked';
$wall_id = $_POST['wall_id'];

// $check_user="DELETE FROM wall WHERE wall_id='$wall_id'";   
$check_user = "UPDATE wall SET status=1 WHERE wall_id='$wall_id'";
      
$run=mysqli_query($dbC,$check_user);  

if($run)   
{
    echo "<script>window.history.go(-1)</script>";  

}
else{
    echo "ERROR: Could not able to execute $check_user. " . mysqli_error($dbC);
 }
        
}else{
    echo "<script>window.history.go(-1)</script>";  
}



?>