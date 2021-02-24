
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Relationship partners</title>   
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
        <div class="col-md-6">
        <a href="../index.php">Home</a>
        &nbsp&nbsp&nbsp
        <a href="non_individual_profile.php">Profile</a>
            <div class="card">
                <div class="card-header"><h4>Relationship Partners</h4></div>

                <div class="card-body">
                
                <a href="add_partner.php">add Partners</a><br><br>
       <div class="row">

       <?php
          $uid = $_SESSION['user_id'];
         
          $check_partner="select * from relatioship_partners WHERE add_by='$uid' AND status=1";   
         

          if($project_data = mysqli_query($dbC,$check_partner)){

            while($row_partner = mysqli_fetch_array($project_data)){
            // $project_photo = "../images/relationship_partners/".$row_partner['project_award'];
        $partner_name = $row_partner['name'];
        $partner_profile_id= $row_partner['user_id'];
        $user_type= $row_partner['user_type'];
        $user_one_sepa = explode(" ", $partner_name);
        $fname = $user_one_sepa[0];
  
        $lname = $user_one_sepa[1];

        if($user_type === 'individual'){
            $ind="select * from profile_individual WHERE first_name='$fname' AND last_name='$lname'";   
            $ind_data=mysqli_query($dbC,$ind);  
            $row_ind = mysqli_fetch_assoc($ind_data);
            $ind_photo = $row_ind['photo'];

        }else{
            $non_ind="select * from profile_non_individual WHERE name='$fname'";   
            $non_ind_data=mysqli_query($dbC,$non_ind);  
            $row_non_ind = mysqli_fetch_assoc($non_ind_data);
            $ind_photo = $row_non_ind['photo'];
        }
        $display_photo = "../images/dp/".$ind_photo;
        // echo $display_photo;
        echo '
        <div class="col-4">
        <img src='.$display_photo.' alt="award" height="80px" width="90"><br>
       
       <a href ="">'.$partner_name.'</a><br>
      
        
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
   
</body>   
   
</html>   
 