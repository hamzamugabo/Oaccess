
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('app/auth/login.php','_self')</script>";  
}
$user_type =$_SESSION['user_type'];
$who_posted = '';
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="css\layout.css"> 

    <title>Home</title>   
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
  width: 990px;
  background-color: grey;
}
</style>   
<body class="home" >   
<div id="login-header">
             <div class="container" >
                 <div class="row">
                     <div class="col-md-3 logo"><img src="images/official-access-logo.png"/></div>
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
         <div id="map"></div>
<script type="text/javascript" src="scripts/index.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap">
</script>
<?php
    
    include("config/config.php");   
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
     function initMap() {
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
}
 </script>
<div class="container" style="margin-top:30px">
    <div class="row">
    <div class="col-3" style="margin-right:0px;">
    <?php
    
    include("config/config.php");   
       
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
        $img_path = "images/dp/".$image;
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
        
    
    include("config/config.php");   
       
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
        $img_path = "images/dp/".$image;
        // $first_name = $row_non['first_name'];
        // $last_name = $row_non['last_name'];
        $user_id = $row_non['user_id'];
        $_SESSION['profile_id'] = $row_non['profile_non_individual_id'];
        // $past_job_position = $row_non['employement_past_position'];
        // $past_job_name = $row_non['employement_past_name'];
// $_SESSION[$user_id];
// echo $_SESSION['user_id'];
        echo '<img src='.$img_path.' height="200" width=""200>';
    
    //     echo "
    //     <div >
    //     <strong> $first_name $last_name</strong> <br>
    //   Fmr $past_job_position  <br>
    //    <strong> $past_job_name 
    //        & 3 OTHER JOBS
    //    </strong>
    //    </div>
    //     ";
       
    // }

    echo'<div style="text-align:center"> '.$name.' <br>
    '.$division.'  License No  '.$license.' <br>
    TIN  ' .$tin.'<br><br><br>
   <i><h5><a href=""> '.$mission.' </a></h5></i>
    </div>
    ';
    // echo $division. '  License No.' .$license. '<br>';
    // echo 'TIN  ' .$tin. '<br><br><br>';

    // echo '<i><h5><a href=""> '.$mission.' </a></h5></i>'
        
    }
        
       
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
        About Me<br>
        Documents & Reports 23<br>
        Work Applications<br>
        Subscription
        </div>
       
        </div>
        <div class="col-6">
        <div style="border: 1px solid black">   
        <!-- <form method="POST" action="wall.php" enctype="multipart/form-data">

        <br>
        <input type="text" name="news" placeholder="Communicate">
<br>
<br>
      <strong> upload photo:</strong> <input type="file" name="news_photo"><br>
<br>
        <input type="submit" value="submit" name="submit">
        </form >  -->
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        
        <br>
        <br>
        <h5 style="color: green;">RECENT ACTIVITY</h5>

        <div style="padding-left:50px;">
        
        <?php
$id=$_SESSION['user_id'];
// $wall="select * from wall ";   

$wall="select * from wall ";   
if($result = mysqli_query($dbC,$wall)){

    while($row_ = mysqli_fetch_array($result)){
        $photo_name = $row_['photo'];
    $news_photo = "images/wall/".$row_['photo'];
$date = $row_['date'];
$message = $row_['message'];
$poster = $row_['user_id'];
$wall_id = $row_['wall_id'];


$count_comments = "SELECT wall_id FROM comment WHERE wall_id = $wall_id"; 
      
    // Execute the query and store the result set 
    $count_result = mysqli_query($dbC, $count_comments); 
      
     
        $row_count = mysqli_num_rows($count_result); 
          
        
$all="select * from user WHERE user_id='$poster' ";   
$all_result = mysqli_query($dbC,$all);
$all_row_ = mysqli_fetch_array($all_result);
$poster_fname = $all_row_['first_name'];
$poster_lname = $all_row_['last_name'];
$space = '';
if($user_type === 'individual'){
    if($first_name === $poster_fname && $last_name === $poster_lname){
        echo '
        <a href=""> Yo </a>Posted on your wall <br>
        <div class="row" style="margin-top:10px;">
        <div class="col-2">';
    }else{
        echo '
        <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
        <div class="row" style="margin-top:10px;">
        <div class="col-2">';
    }
    
   
}else{
    echo '
    <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
    <div class="row" style="margin-top:10px;">
    <div class="col-2">';
}

if($photo_name !=''){
    echo'        
<img src='.$news_photo.' width=80 height=80>';
}else{
    // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
    echo'     ';
}
echo'
            </div>
            <div class="col-8"><p>'.$message.'.</p>
          <strong> posted at</strong>  '.$date.' &nbsp&nbsp&nbsp
          <form  method="POST" action="comment.php">
<input type="text" name="wall_id" value="'.$wall_id.'" hidden>
<button type="submit" class="btn btn-link">Comment '.$row_count.'</button>
          </form>
          <a href="">Like</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <a href="">Share</a>
    </div>
    
    </div>
    <hr/>
';
// echo $row_['message'];
    }
}
            ?>

           
            </div>
        </div>
        
        <!-- <div class="col-1"></div> -->
        <div class="col-3" style="text-align:center;float:right;">
        <button onclick="myFunction()">Add Award</button>
        <br>
        <br>
        <div id="myDIV" style="border: 1px solid black;" >   

        <!-- <form method="POST" action="award.php" enctype="multipart/form-data">

        <br>
        <input type="text" name="title" placeholder="enter award title">
<br>
<br>
<input type="text" name="from" placeholder="award From">
<br>
<br>
      <strong> award photo:</strong> <input type="file" name="award"><br>
<br>
        <input type="submit" value="submit" name="submit">
        </form > -->
        </div>
        <?php
$award_user_id=$_SESSION['user_id'];
$award_="select * from award WHERE user_id='$award_user_id'";   
if($award_result = mysqli_query($dbC,$award_)){

    while($row_ = mysqli_fetch_array($award_result)){
    $award_photo = "images/award/".$row_['award_picture'];
$name = $row_['name_of_award'];
$from = $row_['award_from'];
// echo $row_['message'];
// echo $row_['date'];

echo '
<img src='.$award_photo.' alt="award"><br>
'.$name.'<br>
'.$from.'
<hr style="border-width: 15px;padding-left:30px;padding-right:30px;background-color:black;width:50%;">
    
';
// echo $row_['message'];
    }
}
            ?>

           

        <!-- <img src="images/award.png" alt="user""><br>
        2nd Runers up best entreprenuer enterprize
        <hr style="border-width: 15px;padding-left:30px;padding-right:30px;background-color:black;width:50%;">
        <img src="images/award.png" alt="user""><br>
        2nd Runers up best entreprenuer enterprize
        <hr style="border-width: 15px;padding-left:30px;padding-right:30px;background-color:black;width:50%;"> -->

        </div>
    </div>
</div>
</body>   
   
</html>   
