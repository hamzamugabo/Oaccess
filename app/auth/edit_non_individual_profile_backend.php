  
<?php   
session_start();//session starts here   
   
include("../../config/config.php");//make connection here   
$user_id=$_SESSION['user_id'];
   

    $name=$_POST['name'];//here getting result from the post array after submitting the form.   
    $mission=$_POST['mission'];//same   
    $location=$_POST['location']; 
    $license=$_POST['license']; 
    $tin=$_POST['tin']; 
    $id=$_POST['id']; 
    $date=$_POST['date']; 
   
    

        
if(isset($name,$mission,$location,$license,$tin))   
{ 
    

    $photo = $_FILES['logo']['name'];
    if($photo)  {
    $target_dir = "../../images/dp/";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
       // Insert record
      //here query check weather if user already registered so can't register again.   
      $update="UPDATE profile_non_individual SET name='$name',division='$location',
      license_no='$license',photo='$photo',tin='$tin',mission='$mission' date='$date' WHERE profile_non_individual_id=$id";

if (mysqli_query($dbC, $update)) {
    // echo "Record updated successfully";
    echo "<script>window.open('../../view/non_individual_profile.php','_self')</script>"; 
  } else {
    echo "Error updating record: " . mysqli_error($dbC);
  }
    
       // Upload file
    //    move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo);
       move_uploaded_file($_FILES['logo']['tmp_name'],$target_dir.$photo);
  
    }
   
}else{
    $update="UPDATE profile_non_individual SET name='$name',division='$location',
    license_no='$license',tin='$tin',mission='$mission',date='$date' WHERE profile_non_individual_id=$id";

if (mysqli_query($dbC, $update)) {
  // echo "Record updated successfully";
  echo "<script>window.open('../../view/non_individual_profile.php','_self')</script>"; 
} else {
  echo "Error updating record: " . mysqli_error($dbC);
}
}

// close connection
mysqli_close($dbC);
}  

?>  