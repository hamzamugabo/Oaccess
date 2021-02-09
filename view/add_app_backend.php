 
<?php   
   
   session_start();//session starts here   
   
      include("../config/config.php");   
      
      
      
       
      // Escape user inputs for security
      if(isset($_POST['app_name']))   
{ 
      $name = mysqli_real_escape_string($dbC, $_POST['app_name']);
      $date = mysqli_real_escape_string($dbC, $_POST['date']);
      $user_id = $_SESSION['user_id'];
    //   $profile_id = $_SESSION['profile_id'];
      
   //    $user_type ='individual';
//    $check_user="select * from user WHERE email='$email";   

$photo = $_FILES['app']['name'];
    $target_dir = "../images/applications/";
    $target_file = $target_dir . basename($_FILES["app"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    

    
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif",'PNG','JPG');
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
       // Insert record
      //here query check weather if user already registered so can't register again.   
$sql ="INSERT INTO application (user_id,date,name,app_logo)
VALUES ( '$user_id', '$date','$name','$photo')";

$query="mysql_num_rows($sql)";
if(mysqli_query($dbC, $sql)){
    echo "<script>window.open('non_individual_profile.php','_self')</script>";   

} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
}
    
       // Upload file
       move_uploaded_file($_FILES['app']['tmp_name'],$target_dir.$photo);
    //    echo "<script>window.open('project.php','_self')</script>";   
  
    }


      mysqli_close($dbC);}
      ?>