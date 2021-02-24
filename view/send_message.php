<?php
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('../app/auth/login.php','_self')</script>";  
    
}
$user_id=$_SESSION['user_id'];
                include("../config/config.php");   

if(isset($_POST['content'],$_POST['reciever_id'])){
$comment_date=  date('h:i A l F jS ');
$message = $_POST['content'];
$reciever_id =$_POST['reciever_id'];
$sql = "INSERT INTO message(sender_id,reciever_id,message,date) 
VALUES('$user_id','$reciever_id','$message','$comment_date')";
   //  mysqli_query($con,$query);
 
    // Upload file
   //  move_uploaded_file($_FILES['award']['tmp_name'],$target_dir.$name);
    $query="mysql_num_rows($sql)";
    if(mysqli_query($dbC, $sql)){
        echo "<script>window.history.go(-1)</script>";  

        
}
else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
}}
?>