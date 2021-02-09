
<?php   
session_start();//session starts here   
   
   include("../../config/config.php");   
      
   if(isset($_POST['email'],$_POST['password']))   
   {   
       
    $user_email=$_POST['email'];   
    $user_pass=$_POST['password'];  
       $check_user="select * from user WHERE email='$user_email'AND password='$user_pass'";   
      
       $run=mysqli_query($dbC,$check_user);   
       $row = mysqli_fetch_assoc($run);
       $_SESSION['email']=$user_email;
           $_SESSION['user_id']=$row['user_id'];
      //  $_SESSION['user_id'];
       if(mysqli_num_rows($run))   
       {


           if($row['user_type'] === 'individual'){

            $user_id =$_SESSION['user_id'];
            $check_user_ind="select user_id  from profile_individual WHERE user_id='$user_id'";   
            // $count=mysqli_num_rows($result);
        $run_ind=mysqli_query($dbC,$check_user_ind);  
        $count=mysqli_num_rows($run_ind);
        if($count == 1)
            echo "<script>window.open('../../view/individual_profile.php','_self')</script>";  
else
            echo "<script>window.open('individual_register.php','_self')</script>";  
           }  
           else
{
    $user_id =$_SESSION['user_id'];
    $check_user_non="select user_id  from profile_non_individual WHERE user_id='$user_id'";   

$run_non=mysqli_query($dbC,$check_user_non);  
$count=mysqli_num_rows($run_non);

if($count === 1)
    echo "<script>window.open('../../view/non_individual_profile.php','_self')</script>";  
else
    echo "<script>window.open('non_individual_register.php','_self')</script>";

    
    //here session is used and value of $user_email store in $_SESSION.   

}
          
       }   
       else   
       {   
         echo "<script>alert('Email or password is incorrect!')</script>";  
         echo "<script>window.open('login.php','_self')</script>";  

       }   
   } 
    else{echo "<script>alert('not set email n pass')</script>";
        echo "<script>window.open('login.php','_self')</script>";  
    
    }  
   ?>