  
<?php   
session_start();//session starts here   
   
include("../config/config.php");//make connection here   
$user_email=$_SESSION['email'];
$user_id = $_SESSION['user_id'];



    $event=$_POST['event'];//here getting result from the post array after submitting the form.   
    $start_date=$_POST['start_date'];//same   
    $start_time=$_POST['start_time']; 
    $start =$start_date.','.$start_time;
    $end_date=$_POST['end_date']; 
    $end_time=$_POST['end_time']; 
    $end =$end_date.','.$end_time;

    $privacy=$_POST['privacy']; 
    $location=$_POST['location']; 
    $description=$_POST['description']; 
    // echo $description;
    // $photo =$_POST['photo']; 
   
    

        
if(isset($event,$start_date,$start_time,$end_date,$end_time,$privacy,$location))   
{   

    $photo = $_FILES['photo']['name'];
    $target_dir = "../images/events/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  
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
$sql = "INSERT INTO event (event_name,start_date,end_date,privacy,location,description,photo,sender_id)
VALUES ( '$event', '$start','$end','$privacy','$location','$description','$photo','$user_id')";

$query="mysql_num_rows($sql)";
if(mysqli_query($dbC, $sql)){
    // echo "<script>window.history.go(-1)</script>";  
    echo "<script>window.open('events.php','_self')</script>";
  

} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
}
    
       // Upload file
       move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo);
    //    move_uploaded_file($_FILES['logo']['tmp_name'],$target_dir1.$logo);
  
    }
   


// close connection
mysqli_close($dbC);
}  

?>  