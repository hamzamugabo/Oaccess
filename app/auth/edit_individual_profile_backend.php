  
<?php   
session_start();//session starts here   
   
include("../../config/config.php");//make connection here   
$user_email=$_SESSION['email'];
$user_id = $_SESSION['user_id'];



// if()


// echo $_POST['marital_status'];
// echo $_POST['logo'];

$fname =$_POST['fname'];
$lname =$_POST['lname'];
$email =$_POST['email'];
$dob =$_POST['dob'];
$status =$_POST['status'];
$past_position =$_POST['past_position'];
$past_address =$_POST['past_address'];
$past_name =$_POST['past_name'];
$current_position =$_POST['current_position'];
$current_name =$_POST['current_name'];
$current_address =$_POST['current_address'];
// $logo =$_POST['logo'];
$education =$_POST['education'];
// $photo =$_POST['photo'];
$specialisties =$_POST['specialisties'];
$marital_status =$_POST['marital_status'];
$gender =$_POST['gender'];
$status =$_POST['status'];
$id =$_POST['id'];

    $photo = $_FILES['photo']['name'];
    $target_dir = "../../images/dp/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
// logo
    $logo = $_FILES['logo']['name'];
    $target_dir1 = "../../images/logo/";
    $target_file1 = $target_dir1 . basename($_FILES["logo"]["name"]);
if($photo || $logo){
  
    // Select file type
    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

    $update="UPDATE profile_individual SET first_name='$fname',last_name='$lname',gender='$gender',
    dob='$dob',photo='$photo',employement_current_status='$status',employement_position='$current_position',
    employement_name='$current_name',current_address='$current_address',employement_past_position='$past_position',
    employement_past_name=$past_name,employement_past_address=$past_address,specialisties='$specialisties',
    education='$education',marital_status='$marital_status',logo='$logo' WHERE profile_individual_id=$id"; 
    if (mysqli_query($dbC, $update)) {
        // echo "Record updated successfully";
        echo "<script>window.open('../../view/individual_profile.php','_self')</script>"; 
      } else {
        echo "Error updating record: " . mysqli_error($dbC);
      }
      
       // Upload file
       move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo);
       move_uploaded_file($_FILES['logo']['tmp_name'],$target_dir1.$logo);
    }


}else{

    $update="UPDATE profile_individual SET first_name='$fname',last_name='$lname',gender='$gender',
    dob='$dob', employement_current_status='$status',employement_position='$current_position',
    employement_name='$current_name',current_address='$current_address',employement_past_position='$past_position',
    employement_past_name='$past_name',employement_past_address='$past_address',specialisties='$specialisties',
    education='$education',marital_status='$marital_status' WHERE profile_individual_id=$id"; 
    if (mysqli_query($dbC, $update)) {
        // echo "Record updated successfully";
        echo "<script>window.open('../../view/individual_profile.php','_self')</script>"; 
      } else {
        echo "ERROR: Could not able to execute $update. " . mysqli_error($dbC);
      }
}


   


// close connection
mysqli_close($dbC);
// }  

?>  