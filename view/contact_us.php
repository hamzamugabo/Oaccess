
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

$check_user_ind="select *  from contact_us WHERE user_id='$user_id'";   
            // $count=mysqli_num_rows($result);
        $run_ind=mysqli_query($dbC,$check_user_ind);  
        $count_us=mysqli_num_rows($run_ind);
        if(!$count_us == 1)
            echo "<script>window.open('contact_us_form.php','_self')</script>";  


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
    <title>Contact Us</title>   
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
         
      
    if($user_type === 'individual'){
        $user_email = $_SESSION['email'];
        // $user_id = $_SESSION['user_id'];
         
        $check_user="select * from profile_individual WHERE email='$user_email'";   
       
        $run=mysqli_query($dbC,$check_user);   
        $row_ind = mysqli_fetch_assoc($run);
        $image = $row_ind['photo'];
        $img_path = "../images/dp/".$image;
        $first_name = $row_ind['first_name'];
        $last_name = $row_ind['last_name'];
        $user_id = $row_ind['user_id'];
        $past_job_position = $row_ind['employement_past_position'];
        $past_job_name = $row_ind['employement_past_name'];
        
// $_SESSION[$user_id];
// echo $_SESSION['user_id'];
        echo '<img src='.$img_path.' height="200" width=""200>';
    
        echo "
        <div >
        <strong> $first_name $last_name</strong> <br>
      Fmr $past_job_position  <br>
       <strong> $past_job_name 
           & 3 OTHER JOBS
       </strong>
       </div>
        ";
    }else{
        
    
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
    
   

    echo'<div style="text-align:center"> '.$name.' <br>
    '.$division.'  License No  '.$license.' <br>
    TIN  ' .$tin.'<br><br><br>
   <i><h5><a href=""> '.$mission.' </a></h5></i>
    </div>
    ';
  
        
    }
        
       
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
        About Me<br>
        </div>
       
        </div>
        <div class="col-7">
        <div id="map">
<script type="text/javascript" src="scripts/index.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCP5mkhNYD-bOxcNX1wOTCCKVh0CUBbdkc&sensor=false"></script>

<!-- <script async defer
    src="http://maps.googleapis.com/maps/api/js?sensor=false">
</script> -->
<?php
    
    include("../config/config.php");   
  $my_array = [];
  $my_array_lat = [];
  $my_array_log = [];
  $lat = [];
       
    // if($_SESSION['email'])   
    // {   
        // $user_email = $_SESSION['email'];
        // $user_id = $_SESSION['user_id'];
         
        $check_user1="select name,location,lat,log from projects";   
       if($run_map=mysqli_query($dbC,$check_user1)){
        
while($row_map = mysqli_fetch_array($run_map)){
       $my_array[] = $row_map;
       $my_array_lat[] = [$row_map['location'],$row_map['lat'], $row_map['log']];
       $lat[] = $row_map['lat'];
       $my_array_log[] = $row_map['log'];

}
      $js_array = json_encode($my_array);
      $js_array_lat = json_encode($my_array_lat);
      $js_array_log = json_encode($my_array_log);
      $lat = json_encode($my_array_log);

       };
     
        ?>

      
<script>
    //  function initMap() {
      var javascript_array = <?php 
      // $js_array = $arr;
      echo json_encode($js_array) ?>;
      var javascript_array_lati = <?php echo $js_array_lat; ?>;
// var loc =[javascript_array_lati];
// alert(javascript_array_lati[0][1]);
var latitude =parseFloat(javascript_array_lati[0][1]);
var longitude =parseFloat(javascript_array_lati[0][2]);
// alert(latitude)
  var center = {lat: 0.347500, lng: 32.649170};

var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: center
  });
var infowindow =  new google.maps.InfoWindow({});
var marker, count;
for (count = 0; count < javascript_array_lati.length; count++) {
  
  // for ( var count2 = 0; count2 < javascript_array_lati.length; cout2++){}
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(javascript_array_lati[count][1], javascript_array_lati[count][2]),
      map: map,
      title: javascript_array_lati[count][0]
    });
google.maps.event.addListener(marker, 'click', (function (marker, count) {
      return function () {
        infowindow.setContent(javascript_array_lati[count][0]);
        infowindow.open(map, marker);
      }
    })(marker, count));
  }
// }
 </script>
 </div>
        <!-- <div style="border: 1px solid black">    -->
        <!-- <form method="POST" action="wall.php" enctype="multipart/form-data">

        <br>
        <input type="text" name="news" placeholder="Communicate">
<br>
<br>
      <strong> upload photo:</strong> <input type="file" name="news_photo"><br>
<br>
        <input type="submit" value="submit" name="submit">
        </form >  -->
            <!-- </div> -->
            <br>
            <br>
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
            echo'
            <div style="text-align:center;">
            <a href="https://'.$web.'/">'.$web.'</a>
            </div>
            ';
            ?>
            <br>
        
        <br>
        <br>
        <div style="text-align: center;">
        <h5 style="color: green; float:center;">DEALERSHIP IN UGANDA</h5>

        </div>

        <div >
        <div class="row" style="margin-left:100px;">

        <?php
                echo'

                        <div class="col-6"  >
                      <strong>  '.$district.'</strong><br>
                        <a href="">'.$name.'</a><br>
                        '.$plot.' '.$street.'<br>
                        P.O.BOX '.$pobox.'<br>
                        '.$city.'<br>
                       Tel '.$tel.'<br>
                        Fax '.$fax.'<br>
                       Mobile  '.$mobile.'<br>
                       Contact Person  '.$contact.'<br>
                       Hours of Business  '.$hours.'<br>
                        </div>
                        
                ';

        ?>
                        </div>
        
                 

           
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
