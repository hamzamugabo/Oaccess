
<?php 

include_once('../config/config.php');
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>Applications</title>   
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
        <form method="POST" action="../app/auth/logout.php" style="float:right">
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
        <a href="../index.php">Home</a>
        &nbsp&nbsp&nbsp
        <a href="non_individual_profile.php">Profile</a>
            <div class="card">
                <div class="card-header"><h4>Applications</h4></div>

                <div class="card-body">
                    <div class="row">
                    <?php
        //   $user_id = $_SESSION['user_id'];
      
          $app="select * from application";   



          if($app_data = mysqli_query($dbC,$app)){

            while($row_app = mysqli_fetch_array($app_data)){
            $app_photo = "../images/applications/".$row_app['app_logo'];
        $app_name = $row_app['name'];
        $app_id = $row_app['application_id'];
        // $_SESSION['project_id'] = $project_id;
        // $award = $row_project['award'];
        // $from = $row_project['award_from'];
        // echo $row_['message'];
        // echo $row_['date'];
        
        echo '
        <div class="col-6">
        <img src='.$app_photo.' alt="award"  height="70%"><br>
        <form  method="POST" action="" style="text-align:center;">
        <input type= "text" hidden name="id" value="'.$app_id.'">
        <button type="submit" class="btn btn-link">'.$app_name.'</button><br>
        </form>
        
       </div>
           
        ';
        // echo $row_['message'];
            }
        } 
         
         
       ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 