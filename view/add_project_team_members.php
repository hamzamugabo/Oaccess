
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>Add project Team</title>   
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
                <div class="card-header">
                
                <?php
    include("../config/config.php");   
    // if(isset($_POST['name'],$_POST['id'])){
$project_id =$_SESSION['project_id'];
        
$check_project="select * from projects WHERE project_id='$project_id'";   
      
$run_project=mysqli_query($dbC,$check_project);   
if($run_project){
      $row_project = mysqli_fetch_assoc($run_project);

      $project_name = $row_project['name'];
    //   $user_type = $row['user_type'];
      // $user_photo = $row['user_id'];
// $project_name =$_POST['name'];
 echo '<h3>Add Team Members for Project '.$project_name.'</h3>';
    }
    

                ?>

                
                </div>

                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                  
                        
                       
                        
                        
                         
                        <div class="form-group row">
                            <label for="member_name" class="col-md-3 col-form-label text-md-right">Select Partner</label>

                            <div class="col-md-3">
                            <select multiple name="partner[]"  class="form-control" id="exampleFormControlSelect2" required>
                            <?php

 $app="select * from user";   



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
                            <label for="date" class="col-md-3 col-form-label text-md-right">Date</label>

<div class="col-md-3">
    <input  type="date" class="form-control" name="date"   autofocus>

 
      
</div>
                            
                        </div>

                      
                       

                       

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Add
                                </button>
                                
                                  <a href="non_individual_profile.php">back to profile</a>
                              
                               
                                  
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
 <?php
 if(isset($_POST['date'])){
$date = $_POST['date'];
    foreach ($_POST['partner'] as $icon) 
      {
       ///your insert code//
      //  echo  $icon.',';
      $pizza  = $icon.',';
$pieces = explode(",", $pizza);
      
      // echo $pieces[0];
      // echo "</br>";  
      // echo $pieces[1];

      $user_one = $pieces[0];
$user_one_sepa = explode(" ", $user_one);
// echo $user_one_sepa[0];
$fname = $user_one_sepa[0];

// echo "</br>";  
// echo $user_one_sepa[1];
// echo "</br>";  
$lname = $user_one_sepa[1];

// echo $user_one;
// echo "</br>";  

$check_user="select * from user WHERE first_name='$fname'AND last_name='$lname'";   
      
$run=mysqli_query($dbC,$check_user);   
if($run){
      $row = mysqli_fetch_assoc($run);

      $userid = $row['user_id'];
      $user_type = $row['user_type'];
      // $user_photo = $row['user_id'];
      
     
            
            $sql1 = "INSERT INTO project_team (project_id,date,name,user_id)
            VALUES ('$project_id','$date','$icon','$userid')";
            if(mysqli_query($dbC,$sql1)){
                 
                 
                      echo "<script>window.open('project.php','_self')</script>";   
                  
                 
            
            }else{ echo "ERROR: Could not able to execute $sql1. " . mysqli_error($dbC);}
      
      
     
}else{
      echo "ERROR: Could not able to execute $check_user. " . mysqli_error($dbC);

}

        
}

 }
 ?>