<?php
include_once('../config/config.php');
session_start();
$current_user_id = $_SESSION['user_id'];
$current_user_type = $_SESSION['user_type'];
 if(isset($_POST['wall_id'])){
$wall_id =$_POST['wall_id'];
$date1 = new DateTime('today');
$date = date("Y-m-d H:i:s");
    foreach ($_POST['partner'] as $icon) 
      {
       ///your insert code//
      //  echo  $icon.',';
      $pizza  = $icon.',';
$pieces = explode(",", $pizza);
      
      // echo $pieces[0];
      // echo "</br>";  
      // echo $pieces[1];

      $user_one = $pieces[0];
$user_one_sepa = explode(" ", $user_one);
// echo $user_one_sepa[0];
$fname = $user_one_sepa[0];

// echo "</br>";  
// echo $user_one_sepa[1];
// echo "</br>";  
$lname = $user_one_sepa[1];
// $last_portion = strstr($project_name, 'id ');
// $pro_id = str_replace("id ", "", "$last_portion");
// // echo $pro_id;
// // echo "</br>";  

// // echo $last_portion;
// // echo "</br>";  

// $trim_pro_name =substr($project_name, 0, strpos($project_name, "id"));
// $real_pro_name =  $trim_pro_name;
// echo $trim_pro_name;
// echo "</br>";  

$check_user="select * from user WHERE first_name='$fname'AND last_name='$lname'";   
      
$run=mysqli_query($dbC,$check_user);   
if($run){
      $row = mysqli_fetch_assoc($run);

      $userid = $row['user_id'];
      $user_type = $row['user_type'];
      // $user_photo = $row['user_id'];
      
     
            
            $sql1 = "INSERT INTO share (content_id,date,shared_from_id,shared_to_id)
            VALUES ('$wall_id','$date','$current_user_id','$userid')";
            if(mysqli_query($dbC,$sql1)){
                 
                if($current_user_type === 'non_individual')
                {
                    echo "<script>window.open('non_individual_profile.php','_self')</script>";   

                }else{
                    echo "<script>window.open('individual_profile.php','_self')</script>";   

                }
                 
                  
                 
            
            }else{ echo "ERROR: Could not able to execute $sql1. " . mysqli_error($dbC);}
      
      
     
}else{
      echo "ERROR: Could not able to execute $check_user. " . mysqli_error($dbC);

}

        
}

 }
 ?>