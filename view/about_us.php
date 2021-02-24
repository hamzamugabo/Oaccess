
<?php 
include_once('../config/config.php');
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('app/auth/login.php','_self')</script>";  
}
$_SESSION['index'] = 'index';
$user_type =$_SESSION['user_type'];
$user_id =$_SESSION['user_id'];
$who_posted = '';


$check_user_ind="select *  from about_us WHERE user_id='$user_id'";   
            // $count=mysqli_num_rows($result);
        $run_ind=mysqli_query($dbC,$check_user_ind);  
        $count__=mysqli_num_rows($run_ind);
        // echo $count__;
        if(!$count__ == 1)
            echo "<script>window.open('about_us_form.php','_self')</script>";  


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
<a href="individual_profile.php">My Profile</a><br>

';
        }else{
            echo'
            <a href="non_individual_profile.php">My Profile</a><br>
            
            ';
        }
        ?>
        <br><br><br><br>
       <h6 style="color: green;"> You and East African Community share thefollowing in common</h6>

        <?php
//         echo '
//         <div class ="row">
// <h5><a href="">Annversiries Today 11</a></h5>


// </div>
// <hr style="height:2px;border-width:0;color:black;background-color:black">

// <div class ="row">
// <h5><a href="">Subscribe to the Following </a></h5>


// </div>
// <hr style="height:2px;border-width:0;color:black;background-color:black">

// <div class ="row">
// <h5><a href="">Pontential Connections 10</a></h5>


// </div>

// <hr style="height:2px;border-width:0;color:black;background-color:black">
// <div class ="row">
// <h5><a href="">New Application for Efficiency 7</a></h5>


// </div>
// <hr style="height:2px;border-width:0;color:black;background-color:black">

//         ';
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
            $contact_us="select * from about_us WHERE user_id='$user_id'";   
       
            $run_conatct_us=mysqli_query($dbC,$contact_us);   
            $row_ind_contact_us = mysqli_fetch_assoc($run_conatct_us);
            $status = $row_ind_contact_us['type'];
            $formed = $row_ind_contact_us['date'];
            $mandate = $row_ind_contact_us['classification'];
            $vision = $row_ind_contact_us['statement_of_business_mission'];
            $head = $row_ind_contact_us['headquarters'];
            $location = $row_ind_contact_us['number_of_locations'];
            $area = $row_ind_contact_us['area_served'];
            $key_name = $row_ind_contact_us['key_people_name'];
            $key_title = $row_ind_contact_us['key_people_title'];
            $key_no = $row_ind_contact_us['key_people_official_contact'];;
            
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
               '.$status.'
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Formed</strong>
                </div>
                <div class="col-9">
                '.$formed.'
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Mandate</strong>
                </div>
                <div class="col-9">
               '.$mandate.'
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Vision</strong>
                </div>
                <div class="col-9">
                '.$mission.'
                </div>
                  </div> <br>

                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Mission</strong>
                </div>
                <div class="col-9">
                '.$mission.'

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
                <strong>HeadQuarters</strong>
                </div>
                <div class="col-9">
               '.$head.'

                </div>
                  </div> <br>
                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Area Served</strong>
                </div>
                <div class="col-9">
             '.$area.'

                </div>
                  </div> <br>
                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Number of Locations</strong>
                </div>
                <div class="col-9">
               '.$location.'

                </div>
                  </div> <br>
                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Key Person</strong>
                </div>
                <div class="col-9">
               '.$key_name.'

                </div>
                  </div> <br>
                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Key Person Official Contact</strong>
                </div>
                <div class="col-9">
               '.$key_no.'

                </div>
                  </div> <br>
                  <div class="row" style="margin-left:100px;">
                <div class="col-3">
                <strong>Key Person Title</strong>
                </div>
                <div class="col-9">
               '.$key_title.'

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
      


  $connection_requests="select * from connection_requests WHERE reciever_id='$user_id' AND status=0";   
  $run_requests=mysqli_query($dbC,$connection_requests);
  $count_requests=mysqli_num_rows($run_requests);
   



echo '
<div class ="row">
<button type="button" class="btn btn-link" >
       <a href=connection_requests_reply.php">Connection Requests
       <span class="badge badge-light">'.$count_requests.'</span>
  <span class="sr-only">unread messages</span> </a>
</button><br>

</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">
';
$anniversary = "select * from profile_non_individual";
       
$run_anniversary=mysqli_query($dbC,$anniversary);  
while( $all_row_anniversary = mysqli_fetch_array($run_anniversary)){ 

$name = $all_row_anniversary['name'];
$date = $all_row_anniversary['date'];
$photo_ann = $all_row_anniversary['photo'];
$photo_url="images/dp/".$photo_ann;
// echo $photo;
  $from = new DateTime($date);
  $from_date =$from->format('m-d');
  $to   = new DateTime('today');
  $to_date = $to->format('m-d');
 $years= $from->diff($to)->y;
  if($from_date ===  $to_date){
if(mysqli_num_rows($run_anniversary)!=0){
    $number_of_anniversaries = json_encode(mysqli_num_rows($run_anniversary));
    // echo $number_of_anniversaries;
  }
  else{
      $num = 0;
  $number_of_anniversaries= json_encode($num) ;

    // echo $num;
  }
    

  }else{
    $num = 0;
  $number_of_anniversaries= json_encode($num) ;
}
}

$users = "select user_id from user WHERE user_id!='$user_id'";
$conn_query = mysqli_query($dbC,$users);
$user_conn_number = mysqli_num_rows($conn_query);


$app = "select * from application ";
$app_query = mysqli_query($dbC,$app);
$app_number = mysqli_num_rows($app_query);

echo'
<div class ="row">

<button type="button" class="btn btn-link" >
       <a href="non_individual_profile.php">Annversiries Today
       <span class="badge badge-light">'. $number_of_anniversaries.'</span>
  <span class="sr-only">unread messages</span> </a>
</button><br>
</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">';
echo'

<div class ="row">
<a href="connections.php">Pontential Connections
       <span class="badge badge-light">'. $user_conn_number.'</span>
  <span class="sr-only">unread messages</span> </a>
</button><br>

</div>

<hr style="height:2px;border-width:0;color:black;background-color:black">
<div class ="row">

<a href="applications.php">Applications for Efficiency
       <span class="badge badge-light">'. $app_number.'</span>
  <span class="sr-only">unread messages</span> </a>
</button><br>

</div>
<hr style="height:2px;border-width:0;color:black;background-color:black">

 
 ';
// echo $row_['message'];
    }
}else{
    echo "ERROR: Could not able to execute $award_. " . mysqli_error($dbC);

}
            ?>
<?php

?>
         
        </div>
    </div>
</div>
</body>   
   
</html>   
