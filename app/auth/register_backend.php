 
<?php   
   
session_start();//session starts here   

   include("../../config/config.php");   
   
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
   $fname = mysqli_real_escape_string($dbC, $_POST['fname']);
   $lname = mysqli_real_escape_string($dbC, $_POST['lname']);
   if($_POST['gender'])
   $gender = mysqli_real_escape_string($dbC, $_POST['gender']);
   else
   $gender ='';

    $dob= mysqli_real_escape_string($dbC, $_POST['dob']);
   $email = mysqli_real_escape_string($dbC, $_POST['email']);
   $contact = mysqli_real_escape_string($dbC, $_POST['contact']);
   $password = mysqli_real_escape_string($dbC, $_POST['pass']);
   $user_type = mysqli_real_escape_string($dbC, $_POST['user_type']);
$hash_pass = password_hash($password,PASSWORD_DEFAULT);
//    $user_type ='individual';
$check_user="select * from user WHERE email='$email";   
      
$run=mysqli_query($dbC,$check_user); 
// if(!$run){
   // attempt insert query execution
   $sql = "INSERT INTO user (first_name,last_name,password,email,user_type,gender,dob,contact)
    VALUES ( '$fname', '$lname','$password','$email', '$user_type','$gender','$dob','$contact')";
   
    $query="mysql_num_rows($sql)";
   if(mysqli_query($dbC, $sql)){
    $_SESSION['success']= 'Registered successfuly! Login';
     echo "<script>alert('Registered successfuly! Login')</script>";
        echo "<script>window.open('login.php','_self')</script>"; 

   
   } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
   //  if(!$run){
   //      $_SESSION['email_exists']= $email;
   //   echo "<script>alert('Email already exists')</script>";

   //      echo "<script>window.open('login.php','_self')</script>"; 
   //      }else{
   //      $_SESSION['email_exists']= 'Server Error';
   //   echo "<script>alert('Server Error, try again')</script>";

   //      echo "<script>window.open('login.php','_self')</script>"; 

   //      }
    //    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbC);
   }
// }else{
    
//     $_SESSION['email_exists']= $email;
//     echo "<script>window.open('login.php','_self')</script>"; 

// }
   // close connection
   mysqli_close($dbC);
   ?>