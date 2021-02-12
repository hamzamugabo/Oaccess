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

if($_POST['parnership_id']){
$parnership_id = $_POST['parnership_id'];
$sql = "UPDATE relatioship_partners SET confirm_status=1 WHERE relationship_id=$parnership_id";

if (mysqli_query($dbC, $sql)) {
  // echo "Record updated successfully";
      echo "<script>window.open('../index.php','_self')</script>";

} else {
  echo "Error updating record: " . mysqli_error($dbC);
}
// $sql = "INSERT INTO likes(date,wall_id,user_id,status) VALUES('$comment_date','$wall_id','$user_id','$comment')";
//    //  mysqli_query($con,$query);
 
//     // Upload file
//    //  move_uploaded_file($_FILES['award']['tmp_name'],$target_dir.$name);
//     $query="mysql_num_rows($sql)";
//     if(mysqli_query($dbC, $sql)){
//         if($index === 'index')
//       echo "<script>window.open('../index.php','_self')</script>";
//       else
//       {
//           if($user_type === 'individual')
//       echo "<script>window.open('individual_profile.php','_self')</script>";
//       else
//       echo "<script>window.open('non_individual_profile.php','_self')</script>";


//       }

        
// }
// else{
//    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
// }
}
?>