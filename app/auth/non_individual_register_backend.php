  
<?php   
session_start();//session starts here   
   
include("../../config/config.php");//make connection here   
$id=$_SESSION['user_id'];
// $user_id = $_SESSION['user_id'];
// echo $_SESSION['user_id'];
// echo $id;

$check_user="select * from user WHERE user_id='$id'";   
      
       $run=mysqli_query($dbC,$check_user);   
       $row = mysqli_fetch_assoc($run);
    //    $fname = $row['first_name'];
    //    $lname = $row['last_name'];
    //    $dob = $row['dob'];
    //    $gender = $row['gender'];
    //    $password = $row['password'];
       $user_id = $row['user_id'];
    //    $_SESSION['user_id'] = $user_id;
    //    echo $fname;
    

    $name=$_POST['name'];//here getting result from the post array after submitting the form.   
    $mission=$_POST['mission'];//same   
    $location=$_POST['location']; 
    $license=$_POST['license']; 
    $tin=$_POST['tin']; 
    // $past_address=$_POST['past_address']; 
    // $current_address=$_POST['current_address']; 
    // $photo =$_POST['photo']; 
    // $education =$_POST['education']; 
    // $specialisties =$_POST['specialisties']; 
    // $marital_status=$_POST['marital_status'];
   
    

        
if(isset($name,$mission,$location,$license,$tin))   
{   

    $photo = $_FILES['logo']['name'];
    $target_dir = "../../images/dp/";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
// logo
    // $logo = $_FILES['logo']['name'];
    // $target_dir1 = "../../images/logo/";
    // $target_file1 = $target_dir1 . basename($_FILES["logo"]["name"]);
  
    // Select file type
    // $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
       // Insert record
      //here query check weather if user already registered so can't register again.   
$sql = "INSERT INTO profile_non_individual (name,division,license_no,photo,user_id,
tin,mission)
VALUES ( '$name', '$location','$license','$photo','$user_id','$tin','$mission')";

$query="mysql_num_rows($sql)";
if(mysqli_query($dbC, $sql)){
    echo "<script>window.open('../../view/non_individual_profile.php','_self')</script>";   

} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
}
    
       // Upload file
    //    move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo);
       move_uploaded_file($_FILES['logo']['tmp_name'],$target_dir.$photo);
  
    }
   


// close connection
mysqli_close($dbC);
}  

?>  