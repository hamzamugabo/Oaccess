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
 
  $name = $_FILES['award']['name'];
  $title = $_POST['title'];
  $user_id = $_SESSION['user_id'];
  $from = $_POST['from'];
  $target_dir = "../images/award/";
  $target_file = $target_dir . basename($_FILES["award"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $sql = "INSERT INTO award(name_of_award,award_from,award_picture,user_id) VALUES('$title','$from','$name','$user_id')";
    //  mysqli_query($con,$query);
  
     // Upload file
     move_uploaded_file($_FILES['award']['tmp_name'],$target_dir.$name);
     $query="mysql_num_rows($sql)";
     if(mysqli_query($con, $sql)){
  
      if($user_type === 'individual')
      echo "<script>window.open('individual_profile.php','_self')</script>";
      else  
      echo "<script>window.open('non_individual_profile.php','_self')</script>";

  
     
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
     }


  }
 
}
?>
