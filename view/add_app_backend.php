 
<?php   
   
   session_start();//session starts here   
   
      include("../config/config.php");   
      
      /*
      Attempt MySQL server connection. Assuming you are running MySQL
      server with default setting (user 'root' with no password)
      */
      // $dbC = mysqli_connect("localhost", "root", "", "indexing");
       
      // // Check connection
      // if($dbC === false){
      //     die("ERROR: Could not connect. " . mysqli_connect_error());
      // }
      
       
      // Escape user inputs for security
      if(isset($_POST['project_name'],$_POST['timeline'], $_POST['purpose'],$_POST['member1'],$_POST['title1']))   
{ 
      $name = mysqli_real_escape_string($dbC, $_POST['project_name']);
      $timeline = mysqli_real_escape_string($dbC, $_POST['timeline']);
      $user_id = $_SESSION['user_id'];
      $team = ''.$member1.','.$member2.','.$member3.','.$member4.'';
      
      $title = ''.$title1.','.$title2.','.$title3.','.$title4.'';
   //    $user_type ='individual';
//    $check_user="select * from user WHERE email='$email";   

$photo = $_FILES['award']['name'];
    $target_dir = "../images/award/";
    $target_file = $target_dir . basename($_FILES["award"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    

    
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
       // Insert record
      //here query check weather if user already registered so can't register again.   
$sql ="INSERT INTO projects (name,team_members,timeline,purpose,status,team_member_title,project_award,award,user_id)
VALUES ( '$name', '$team','$timeline','$purpose', '$status','$title','$photo','$award','$user_id')";

$query="mysql_num_rows($sql)";
if(mysqli_query($dbC, $sql)){
    echo "<script>window.open('project.php','_self')</script>";   

} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
}
    
       // Upload file
       move_uploaded_file($_FILES['award']['tmp_name'],$target_dir.$photo);
       echo "<script>window.open('project.php','_self')</script>";   
  
    }


      mysqli_close($dbC);}
      ?>