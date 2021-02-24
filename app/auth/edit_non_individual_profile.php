
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
if($_SESSION['user_type'] != 'non_individual'){
    echo "<script>window.open('../../view/individual_profile.php','_self')</script>";  

}
include_once('../../config/config.php');
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

$check_user="select * from profile_non_individual WHERE user_id='$user_id'";   
      
$run=mysqli_query($dbC,$check_user);  
// if($run){ 
$row = mysqli_fetch_assoc($run);
$id = $row['profile_non_individual_id'];
$name = $row['name'];
$division = $row['division'];
$license = $row['license_no'];
$photo = $row['photo'];
$tin = $row['tin'];
$mission = $row['mission'];
$date = $row['date'];
// }else{
//     echo "ERROR: Could not able to execute $check_user. " . mysqli_error($dbC);
// }
// echo $mission;
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 

    <title>Update Profile</title>   
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
        <a href="../../index.php">Home</a>
        &nbsp&nbsp
        <?php
        if($user_type === 'individual')
        echo '<a href="../../view/individual_profile.php">Profile</a>';
        else
        echo '<a href="../../view/non_individual_profile.php">Profile</a>';
        ?>
        

            <div class="card">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form method="POST" action="edit_non_individual_profile_backend.php" enctype="multipart/form-data">
                    <input hidden type="text" value="<?php echo $id ?>" class="form-control" name="id" >
                  

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Company/Organistaion Name</label>

                            <div class="col-md-3  reveal-if-active"" >
                            <input  type="text" value="<?php echo $name ?>" class="form-control" name="name" required autocomplete="name" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Location</label>

                            <div class="col-md-3">
                                <input  value="<?php echo $division ?>" type="text" class="form-control" name="location" required autocomplete="location" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">License Number</label>

                            <div class="col-md-3">
                                <input value="<?php echo $license ?>"  type="text" class="form-control" name="license" required autocomplete="license" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">TIN</label>

                            <div class="col-md-3">
                                <input  value="<?php echo $tin ?>" type="text" class="form-control" name="tin" required autocomplete="tin" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="mission" class="col-md-3 col-form-label text-md-right">Mission</label>

                            <div class="col-md-3">
                                <input value="<?php echo $mission ?>"  type="text" class="form-control" name="mission" required autocomplete="mission" autofocus>

                             
                                  
                            </div>
                            <label for="logo" class="col-md-3 col-form-label text-md-right">logo</label>

                            <div class="col-md-3">
                                <input  type="file" class="form-control" name="logo" >

                             
                                  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-3 col-form-label text-md-right">Date when company was formed</label>

                            <div class="col-md-3">
                                <input  type="date" value="<?php echo $date ?>" class="form-control" name="date" required autocomplete="date" autofocus>

                             
                                  
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
                    <br>
                    
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