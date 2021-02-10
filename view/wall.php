<?php
session_start();
// include("config.php");
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "business_access"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
 
  $name = $_FILES['news_photo']['name'];
  $message = $_POST['news'];
  $user_id = $_SESSION['user_id'];
  $date = date('h:i A l F jS ');
  $target_dir = "../images/wall/";
  $target_file = $target_dir . basename($_FILES["news_photo"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  // if( 
    in_array($imageFileType,$extensions_arr); 
  // ){
 
     // Insert record
     $sql = "INSERT INTO wall(user_id,date,photo,message) VALUES('$user_id','$date','$name','$message')";
    //  mysqli_query($con,$query);
  
     // Upload file
     move_uploaded_file($_FILES['news_photo']['tmp_name'],$target_dir.$name);
     $query="mysql_num_rows($sql)";
     if(mysqli_query($con, $sql)){

      $user_type= $_SESSION['user_type'];

      if($user_type === 'individual')
      echo "<script>window.open('individual_profile.php','_self')</script>";
      else  
      echo "<script>window.open('non_individual_profile.php','_self')</script>";

  

  
     
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
     }


  // }else{echo'no photo';}
 
}else{echo'not submittd';}
?>
