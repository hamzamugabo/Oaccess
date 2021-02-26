<?php 
// error_reporting(E_ALL & ~E_NOTICE);
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
$user_id = $_SESSION['user_id'];

include_once('../config/config.php');
$_users = $_POST['users'];
$wall_id = $_POST['wall_id'];
foreach($_users as $user){
    $user_ids=(int)$user;
    $sql1 = "INSERT INTO privacy (user_id,wall_id)
    VALUES ('$user_ids','$wall_id')";
    if(mysqli_query($dbC,$sql1)){
         
        // if($current_user_type === 'non_individual')
        // {
            echo "<script>window.open('../index.php','_self')</script>";   

        // }else{
        //     echo "<script>window.open('individual_profile.php','_self')</script>";   

        // }
         
          
         
    
    }else{ echo "ERROR: Could not able to execute $sql1. " . mysqli_error($dbC);}


}
?>