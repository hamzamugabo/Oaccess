  
<?php   
session_start();//session starts here   
   
include("../../config/config.php");//make connection here   
$user_email=$_SESSION['email'];
// $user_id = $_SESSION['user_id'];

$check_user="select * from user WHERE email='$user_email'";   
      
       $run=mysqli_query($dbC,$check_user);   
       $row = mysqli_fetch_assoc($run);
       $fname = $row['first_name'];
       $lname = $row['last_name'];
       $dob = $row['dob'];
       $gender = $row['gender'];
       $password = $row['password'];
       $user_id = $row['user_id'];
    //    $_SESSION['user_id'] = $user_id;
    //    echo $fname;
    

    $status=$_POST['status'];//here getting result from the post array after submitting the form.   
    $current_position=$_POST['current_position'];//same   
    $past_position=$_POST['past_position']; 
    $past_name=$_POST['past_name']; 
    $current_name=$_POST['current_name']; 
    $past_address=$_POST['past_address']; 
    $current_address=$_POST['current_address']; 
    // $photo =$_POST['photo']; 
    $education =$_POST['education']; 
    $specialisties =$_POST['specialisties']; 
    $marital_status=$_POST['marital_status'];
   
    

        
if(isset($status,$current_address,$current_position,$past_position,$past_name,$current_name,$past_address))   
{   

    $photo = $_FILES['photo']['name'];
    $target_dir = "../../images/dp/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
// logo
    $logo = $_FILES['logo']['name'];
    $target_dir1 = "../../images/logo/";
    $target_file1 = $target_dir1 . basename($_FILES["logo"]["name"]);
  
    // Select file type
    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
       // Insert record
      //here query check weather if user already registered so can't register again.   
$sql = "INSERT INTO profile_individual (first_name,last_name,email,gender,dob,photo,employement_current_status,
employement_position,employement_name,current_address,employement_past_position,employement_past_name,employement_past_address,specialisties,
education,marital_status,user_id,logo)
VALUES ( '$fname', '$lname','$user_email','$gender','$dob','$photo','$status','$current_position','$current_name',
'$current_address','$past_position','$past_name','$past_address','$specialisties','$education','$marital_status','$user_id','$logo')";

$query="mysql_num_rows($sql)";
if(mysqli_query($dbC, $sql)){
    echo "<script>window.open('../../view/individual_profile.php','_self')</script>";   

} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
}
    
       // Upload file
       move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo);
       move_uploaded_file($_FILES['logo']['tmp_name'],$target_dir1.$logo);
  
    }
   


// close connection
mysqli_close($dbC);
}  

?>  