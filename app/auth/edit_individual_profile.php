
<?php 
include_once('../../config/config.php');
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
if($_SESSION['user_type'] != 'individual'){
    echo "<script>window.open('../../view/non_individual_profile.php','_self')</script>";  

}
$user_id = $_SESSION['user_id'];

$check_user="select * from profile_individual WHERE user_id='$user_id'";   
      
$run=mysqli_query($dbC,$check_user);   
$row = mysqli_fetch_assoc($run);
$past_position = $row['employement_past_position'];
$current_position = $row['employement_position'];
$past_name = $row['employement_past_name'];
$past_address = $row['employement_past_address'];
$current_name = $row['employement_name'];
$current_address = $row['current_address'];
$education = $row['education'];
$specialisties = $row['specialisties'];
$marital = $row['marital_status'];
$logo = $row['logo'];
$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];
$gender = $row['gender'];
$dob = $row['dob'];
$photo = $row['photo'];
$id = $row['profile_individual_id'];
// echo $user_id;
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 

    <title>update profile</title>   
</head>   
<style>   
    .login-panel {   
        margin-top: 150px;   }
        .content {
  display: none;
}
input[type="radio"]:checked + div,
input[type="radio"]:checked + input {
  display: block;
}
</style>   
<body class="home" style="background-color: lightgray;">   
<div id="login-header">
             <div class="container">
                 <div class="row">
                     <div class="col-md-3 logo"><img src="../../images/official-access-logo.png"/></div>
          <div class="pull-right col-md-6" style="float: right;">
        <!-- <div class="loginform"> -->
        <form method="POST" action="logout.php" style="float:right">
        <div class="row">
        <!-- <div style="float:right"> -->

                                <button type="submit" class="btn btn-primary">
                                   Logout
                                </button>
                            <!-- </div> -->
                            
                        </div>
        </form>

        <!-- </div> -->
         
         </div>
         
                 </div>
         
              
             </div>
         </div> 
     
<div class="container">
    <div class="row justify-content-center" style="padding-top: 0px;">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Individual profile update</div>

                <div class="card-body">
                <?php
                echo '
                    <form method="POST" action="edit_individual_profile_backend.php" enctype="multipart/form-data">
                  

                        <div class="form-group row">
                           
                        
                               
                                <input  required  type="text" hidden value="'.$fname.'" class="form-control" name="fname"  autocomplete="email" autofocus>
                                <input  required  type="text" hidden value="'.$lname.'" class="form-control" name="lname"  autocomplete="email" autofocus>
                                <input  required  type="text" hidden value="'.$email.'" class="form-control" name="email"  autocomplete="email" autofocus>
                                <input  required  type="text" hidden value="'.$dob.'" class="form-control" name="dob"  autocomplete="email" autofocus>
                                <input  required  type="text" hidden value="'.$gender.'" class="form-control" name="gender"  autocomplete="email" autofocus>
                                <input  required  type="text" hidden value="'.$id.'" class="form-control" name="id"  autocomplete="email" autofocus>
                                
                                
                               
                            
                        </div>

                        
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Current Employment:</label>
                            <div class="col-md-3">
                            <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                            </div>

                            
                            <label for="email" class="col-md-3 col-form-label text-md-right">Past Employment:</label>
                            <div class="col-md-3">
                            <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                            </div>
                           
                            
                        </div>
                        
                      
                        <div class="form-group row">
                        <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Current Status:</label>

                            <input  required class="check-form-input" required type="radio" name="status" value="self employed"id="choice-animals-dogs"data-require-pair="#choice-animals-dogs">
                            <label for="male" class="form-check-lebel">Self Employed</label>
                            <input  required class="check-form-input" required type="radio" name="status" value="Employed" id="choice-animals-dogs"data-require-pair="#choice-animals-cats">
                            <label for="male" class="form-check-lebel">Employed</label>


                        </div> 
                            <label for="email" class="col-md-3 col-form-label text-md-right">Past Job Postion</label>

                            <div class="col-md-3">
                                
                                <input  required  type="text" class="form-control" name="past_position" value="'.$past_position.'"  autocomplete="email" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">current Job Postion</label>

                            <div class="col-md-3  reveal-if-active"" >
                                <input  required  type="text" value=" '.$current_position.'" class="form-control" name="current_position"  autocomplete="email" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Past Job Name</label>

                            <div class="col-md-3">
                                <input  required  type="text" value=" '.$past_name.'" class="form-control" name="past_name"  autocomplete="email" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">current Job Name</label>

                            <div class="col-md-3">
                                <input  required  type="text" value=" '.$current_name.'" class="form-control" name="current_name"  autocomplete="email" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Past Job Address</label>

                            <div class="col-md-3">
                                <input  required  type="text" value=" '.$past_address.'" class="form-control" name="past_address"  autocomplete="email" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">current Job Address</label>

                            <div class="col-md-3">
                                <input  required  type="text" value=" '.$current_address.'" class="form-control" name="current_address"  autocomplete="email" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">past job logo</label>

                            <div class="col-md-3">
                                <input  type="file" value="'.$logo.'" class="form-control" name="logo" >

                             
                                  
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Education</label>

                            <div class="col-md-3">
                               
                              
                                <input  required  type="text" value="'.$education.'" class="form-control" name="education"  autocomplete="email" autofocus>
                                
                             
                                

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Marital Status</label>

                            <div class="col-md-3">
                            <select class="form-select" required aria-label="Default select example" required name="marital_status" values="'.$marital.'">
                            <option selected></option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="devorced">Devorced</option>
                            </select>

                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Specialities</label>

                            <div class="col-md-3">
                                <input  required  type="text" value="'.$specialisties.'" class="form-control" name="specialisties"  autocomplete="email" autofocus>

                             
                                  
                            </div>

                            <label for="email" class="col-md-3 col-form-label text-md-right">Profile Photo</label>

                            <div class="col-md-3">
                                <input    type="file" class="form-control" name="photo" value="'.$photo.'">

                             
                                  
                            </div>
                           
                            
                        </div>

                       

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>

                            </div>
                        </div>
                    </form>
                    ';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 
 <script>
$(document).on('click','.test',function(event){
	var selectedOption = $(this).val()
  console.log(selectedOption)
});
 </script>