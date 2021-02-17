
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('app/auth/login.php','_self')</script>";  
}
$_SESSION['index'] = 'index';
$user_type =$_SESSION['user_type'];
$user_id =$_SESSION['user_id'];
$who_posted = '';
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 
    <link type="text/css" rel="stylesheet" href="../css\modal.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>About Us</title>   
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
#map {
  height: 300px;
  width: 590px;
  background-color: grey;
}
</style>   
<body class="home" >   
<div id="login-header">
             <div class="container" >
                 <div class="row">
                     <div class="col-md-3 logo"><img src="../images/official-access-logo.png"/></div>
          <div class="pull-right col-md-6" style="float: right;">
        <!-- <div class="loginform"> -->
        <form method="POST" action="app/auth/logout.php" style="float:right">
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
         
 <span style=" border-right: 1px solid black;"><a href=""> Projects  </a></span> &nbsp
 <span style=" border-right: 1px solid black;"><a href=""> Relationship Partners  </a></span>&nbsp
 <span style=" border-right: 1px solid black;"><a href=""> Reports  </a></span>&nbsp
<div class="container" style="margin-top:30px">
    <div class="row">
    <div class="col-2" style="margin-right:0px;">
    <?php
    
    include("../config/config.php");   
       
    // if($_SESSION['email'])   
    // {   
        $user_email = $_SESSION['email'];
        // $user_id = $_SESSION['user_id'];
         
      
//     if($user_type === 'individual'){
//         $user_email = $_SESSION['email'];
//         // $user_id = $_SESSION['user_id'];
         
//         $check_user="select * from profile_individual WHERE email='$user_email'";   
       
//         $run=mysqli_query($dbC,$check_user);   
//         $row_ind = mysqli_fetch_assoc($run);
//         $image = $row_ind['photo'];
//         $img_path = "../images/dp/".$image;
//         $first_name = $row_ind['first_name'];
//         $last_name = $row_ind['last_name'];
//         $user_id = $row_ind['user_id'];
//         $past_job_position = $row_ind['employement_past_position'];
//         $past_job_name = $row_ind['employement_past_name'];
        
// // $_SESSION[$user_id];
// // echo $_SESSION['user_id'];
//         echo '<img src='.$img_path.' height="200" width=""200>';
    
//         echo "
//         <div >
//         <strong> $first_name $last_name</strong> <br>
//       Fmr $past_job_position  <br>
//        <strong> $past_job_name 
//            & 3 OTHER JOBS
//        </strong>
//        </div>
//         ";
    // }else{
        
    
    include("../config/config.php");   
       
    // if($_SESSION['email'])   
    // {   
        $user_email = $_SESSION['email'];
        $uid = $_SESSION['user_id'];
         
        $check_user="select * from profile_non_individual WHERE user_id='$uid'";   
       
        $run=mysqli_query($dbC,$check_user);   
        $row_non = mysqli_fetch_assoc($run);
        $image = $row_non['photo'];
        $name = $row_non['name'];
        $license = $row_non['license_no'];
        $mission = $row_non['mission'];
        $division = $row_non['division'];
        $tin = $row_non['tin'];
        $img_path = "../images/dp/".$image;
        // $first_name = $row_non['first_name'];
        // $last_name = $row_non['last_name'];
        $user_id = $row_non['user_id'];
        $_SESSION['profile_id'] = $row_non['profile_non_individual_id'];
        
        echo '<img src='.$img_path.' height="200" width=""200>';
    
   

    echo'<div > '.$name.' <br>
    '.$division.'  License No  '.$license.' <br>
    TIN  ' .$tin.'<br><br><br>
   <i><h5><a href=""> '.$mission.' </a></h5></i>
    </div>
    ';
  
        
    // }
        
       
    // }
        ?>
        <div style="margin-top: 40px;">
        <?php $user_type = $_SESSION['user_type'];
        if($user_type === 'individual'){
echo'
<a href="view/individual_profile.php">My Profile</a><br>

';
        }else{
            echo'
            <a href="view/non_individual_profile.php">My Profile</a><br>
            
            ';
        }
        ?>
        <br><br><br><br>
       <h6 style="color: green;"> You and East African Community share thefollowing in common</h6>

        <?php
        echo '
        <div class ="row">
<h5><a href="">Annversiries Today 11</a></h5>


</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

<div class ="row">
<h5><a href="">Subscribe to the Following </a></h5>


</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

<div class ="row">
<h5><a href="">Pontential Connections 10</a></h5>


</div>

<hr style="height:2px;border-width:0;color:black;background-color:black">
<div class ="row">
<h5><a href="">New Application for Efficiency 7</a></h5>


</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

        ';
        ?>
        </div>
       
        </div>
        <div class="col-7">
        <?php

 echo '
 <div style="text-align:center;">
 <h2 style="color:blue;">'.$name.'</h2>
 <img src='.$img_path.' height="300">

 </div>';
        ?>
       
          
           
            <?php
            include_once('../config/config.php');
            $contact_us="select * from contact_us WHERE user_id='$user_id'";   
       
            $run_conatct_us=mysqli_query($dbC,$contact_us);   
            $row_ind_contact_us = mysqli_fetch_assoc($run_conatct_us);
            $web = $row_ind_contact_us['website'];
            $district = $row_ind_contact_us['district_city'];
            $name = $row_ind_contact_us['business_building_name'];
            $street = $row_ind_contact_us['business_street_name'];
            $city = $row_ind_contact_us['city'];
            $tel = $row_ind_contact_us['tel'];
            $fax = $row_ind_contact_us['fax'];
            $mobile = $row_ind_contact_us['mobile'];
            $pobox = $row_ind_contact_us['p_o_box'];
            $plot = $row_ind_contact_us['business_plot_number'];
            $contact = $row_ind_contact_us['contact_person'];
            $hours = $row_ind_contact_us['work_hours'];
            
            ?>
          
        <br>
        <div style="text-align: center;">
      

        </div>

        <div >
        <?php
                echo'
                <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Status</strong>
                </div>
                <div class="col-9">
                Sponsered Company
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Formed</strong>
                </div>
                <div class="col-9">
                1st October 1962
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Mandate</strong>
                </div>
                <div class="col-9">
               To coordinate and act as a focal point on all East african Community matters in Uganda.
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Vision</strong>
                </div>
                <div class="col-9">
                A prosperous,stable and politically united East Africa
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Mission</strong>
                </div>
                <div class="col-9">
                A prosperous,stable and politically united East Africa

                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>What We Do</strong>
                </div>
                <div class="col-9">
                <ul>
                <li>Implementation of Ugandas Regional Integration Policy in East Africa</li>
                <li>Coordinating the harmonization of East Africas sectoral activities/policies and programmes.</li>
                <li>Laising Public Sector, Public Sector, non Government Organisations, Civil Soceity and other stake holders
                on East Africa corperation matters</li>
                <li>To enhance awareness of East African Community integration Agenda</li>
                </ul>
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Institutional</strong>
                </div>
                <div class="col-9">
                "For God And My Country"

                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Mission</strong>
                </div>
                <div class="col-9">
                A prosperous,stable and politically united East Africa

                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>HeadQuarters</strong>
                </div>
                <div class="col-9">
                Kampala Uganda.

                </div>
                  </div> <br>
                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Area Served</strong>
                </div>
                <div class="col-9">
              East Africa

                </div>
                  </div> <br>
                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Number of Locations</strong>
                </div>
                <div class="col-9">
                6(January 2010)

                </div>
                  </div> <br>
                ';

        ?>
        
                 

           
            </div>
        </div>
        
        <!-- <div class="col-1"></div> -->
        <div class="col-3" style="text-align:center;float:right;">
        <br>
        <br>
        
        <?php
$award_user_id=$_SESSION['user_id'];
$confirm_status =0;
$award_="select * from relatioship_partners WHERE user_id='$award_user_id' AND confirm_status=$confirm_status";   
if($award_result = mysqli_query($dbC,$award_)){

    while($row_ = mysqli_fetch_array($award_result)){

        $who_added_you = $row_['add_by'];
        $parnership_id = $row_['relationship_id'];
        $parnership_project = $row_['project_id'];
        $count_requests = mysqli_num_rows($award_result); 
        // user bio
        $adder_bio="select user_type,first_name,last_name from user WHERE user_id='$who_added_you'";   
        $adder_results = mysqli_query($dbC,$adder_bio);
        $adder_row_ = mysqli_fetch_array($adder_results);
        $adder_fname = $adder_row_['first_name'];
        $adder_lname = $adder_row_['last_name'];
        $adder_user_type = $adder_row_['user_type'];


        // project bio
 // user bio
 $project_bio="select name from projects WHERE project_id='$parnership_project'";   
 $project_results = mysqli_query($dbC,$project_bio);
 $project_row_ = mysqli_fetch_array($project_results);

 $project_name = $project_row_['name'];



        // echo $adder_fname;
        // echo $adder_lname;
        // echo $adder_user_type;
if($adder_user_type === 'individual'){
    $adder_profile="select photo from profile_individual WHERE user_id='$who_added_you'";   
    $adder_profile_results = mysqli_query($dbC,$adder_profile);
    $adder_profile_row_ = mysqli_fetch_array($adder_profile_results);
$adder_photo = "../images/dp/".$adder_profile_row_['photo'];
}else{
    $adder_profile="select photo from profile_non_individual WHERE user_id='$who_added_you'";   
    $adder_profile_results = mysqli_query($dbC,$adder_profile);
    $adder_profile_row_ = mysqli_fetch_array($adder_profile_results);
$adder_photo = "../images/dp/".$adder_profile_row_['photo'];
}
      



echo '
<div class ="row">
<h5><a href="">Official Connection Requests '.$count_requests.'</a></h5>


</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

<div class ="row">
<h5><a href="">Annversiries Today 11</a></h5>


</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

<div class ="row">
<h5><a href="">Subscribe to the Following </a></h5>


</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

<div class ="row">
<h5><a href="">Pontential Connections 10</a></h5>


</div>

<hr style="height:2px;border-width:0;color:black;background-color:black">
<div class ="row">
<h5><a href="">New Application for Efficiency 7</a></h5>


</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

 
 ';
// echo $row_['message'];
    }
}else{
    echo "ERROR: Could not able to execute $award_. " . mysqli_error($dbC);

}
            ?>

         
        </div>
    </div>
</div>
</body>   
   
</html>   
