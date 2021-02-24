
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
$current_user_id = $_SESSION['user_id'];
$current_user_type = $_SESSION['user_type'];
if($_POST['wall_id'])
$wall_id =$_POST['wall_id'];
else
echo'wall id not set';
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>Share</title>   
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
                     <div class="col-md-3 logo"><img src="../images/official-access-logo.png"/></div>
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
                <div class="card-header">share Post</div>

                <div class="card-body">
                    <form method="POST" action=" share_backend.php" >
                  
                        
                       
                        <input type="text" name="wall_id" value="<?php echo $wall_id ?>" hidden>
                        
                         
                        <div class="form-group row">
                            <label for="member_name" class="col-md-3 col-form-label text-md-right">Choose who you want to share to</label>

                            <div class="col-md-5">
                            <select multiple name="partner[]" required  class="form-control" id="exampleFormControlSelect2" required>
                            <?php
    include("../config/config.php");   

 $app="select * from user WHERE user_id !=$current_user_id ";   



 if($app_data = mysqli_query($dbC,$app)){

   while($row_app = mysqli_fetch_array($app_data)){
//    $app_photo = "../images/applications/".$row_app['app_logo'];
$app_name = $row_app['first_name'];
$lname = $row_app['last_name'];
$user_id = $row_app['user_id'];

echo
'
<option>
   '.$app_name.' '.$lname.'      
</option>
';
} 

}

?>
     
    </select>
                             
                                  
                            </div>


                            
                        </div>

                       

                       

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Add
                                </button>
                                &nbsp&nbsp

                                <?php
                                if($current_user_type === 'individual')
                                {
                                    echo '
                                    <a href="individual_profile.php">Profile</a>
                                      
                                      ';
                                }
                                else{
                                    echo '
                                  <a href="non_individual_profile.php">Profile</a>
                                    
                                    ';

                                }
                                ?>
                                &nbsp&nbsp
                                  <a href="../index.php">Home</a>
                                
                              
                               
                                  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>  
 