<?php
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('../app/auth/login.php','_self')</script>";  
    
}
                include("../config/config.php");   

if($_POST['content']){
$comment_date=  date('h:i A l F jS ');
$comment_user = $_SESSION['user_id'];
$comment =$_POST['content'];
$wall_id = $_SESSION['wall_id'];
$comment_id = $_SESSION['comment_id'];
$sql = "INSERT INTO comment_comment(comment_id,wall_id,comment,date,user_id) 
VALUES('$comment_id','$wall_id','$comment','$comment_date','$comment_user')";
   //  mysqli_query($con,$query);
 
    // Upload file
   //  move_uploaded_file($_FILES['award']['tmp_name'],$target_dir.$name);
    $query="mysql_num_rows($sql)";
    if(mysqli_query($dbC, $sql)){
      echo "<script>window.open('comment.php','_self')</script>";
        
}
else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
}}
?>