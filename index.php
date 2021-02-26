
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('app/auth/login.php','_self')</script>";  
}
$_SESSION['index'] = 'index';
$user_type =$_SESSION['user_type'];
$who_posted = '';
$current_user_id = $_SESSION['user_id'];
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="css\layout.css"> 
    <link type="text/css" rel="stylesheet" href="css\modal.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  width: 890px;
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
         <div class="row"  style="padding-left: 20px;margin-right: 20px;margin-top: 20px;">
         <div class="col-9">
         <div id="map">
<script type="text/javascript" src="scripts/index.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCP5mkhNYD-bOxcNX1wOTCCKVh0CUBbdkc&sensor=false"></script>

<!-- <script async defer
    src="http://maps.googleapis.com/maps/api/js?sensor=false">
</script> -->
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
 
 <span style=" border-right: 1px solid black;"><a href=""> Projects  </a></span> &nbsp
 <span style=" border-right: 1px solid black;"><a href="view/relationship_partners.php"> Relationship Partners  </a></span>&nbsp
 <span style=" border-right: 1px solid black;"><a href=""> Reports  </a></span>&nbsp
<div style="margin-left:60px ;margin-right:60px;margin-top:30px;" >
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
        $now_position = $row_ind['employement_position'];
        
// $_SESSION[$user_id];
// echo $_SESSION['user_id'];
        echo '<img src='.$img_path.' style="border-radius: 50%;" height="200" width=""200>';
    
        echo "
        <div >
        <strong> $first_name $last_name</strong> <br>
     
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
        // $date = $row_non['date'];
        // // $orgDate = "2019-02-26";  
        // $newDate = date("m-d-Y", strtotime($date)); 
        // $str = $newDate;
        // $new_date = str_replace("-", "/", $str);
// echo $new_date;
        // echo "New date format is: ".$newDate. " (MM-DD-YYYY)"; 
        $img_path = "images/dp/".$image;
        // $first_name = $row_non['first_name'];
        // $last_name = $row_non['last_name'];
        $user_id = $row_non['user_id'];
        $_SESSION['profile_id'] = $row_non['profile_non_individual_id'];
        
        echo '<img src='.$img_path.' style="border-radius: 50%; height="200" width=""200>';
    
   

    echo'<div style="text-align:center"> '.$name.' <br>
    
    </div>
    ';
  
        
    }
        
       
    // }
        ?>
        <div style="margin-top: 40px; border-style: ridge;">
        <?php $user_type = $_SESSION['user_type'];
        if($user_type === 'individual'){
echo'

<button type="button" class="btn btn-link">
<a href="view/individual_profile.php">My Profile</a>
</button><br>
';
        }else{
            echo'
            <button type="button" class="btn btn-link">
            <a href="view/non_individual_profile.php">My Profile</a>
</button><br>
            ';
        }
        ?>
        <?php 
        if($user_type === 'individual'){
echo'
<button type="button" class="btn btn-link">
<a href="view/about_me.php">About Me</a>
</button><br>
';
        }else{
            echo'
            <button type="button" class="btn btn-link">
            <a href="view/about_us.php">About Us</a>
</button><br>
            ';
        }
        ?>
        <?php 
        if($user_type === 'individual'){
echo'
<button type="button" class="btn btn-link">
<a href="app/auth/edit_individual_profile.php">Edit Profile</a>
</button><br>
';
        }else{
            echo'
            <button type="button" class="btn btn-link">
            <a href="app/auth/edit_non_individual_profile.php">Edit Profile</a>
</button><br>
            ';

        }
        ?>
        <button type="button" class="btn btn-link">
            <a href="view/account.php">Account</a>
</button><br>
        <?php
  $messages="select * from message WHERE reciever_id='$current_user_id' AND status=0";   
  $run_message=mysqli_query($dbC,$messages);
  $count_messages=mysqli_num_rows($run_message);
   

?>
       <button type="button" class="btn btn-link" >
       <a href="view/chat.php">Message
       <span class="badge badge-light"><?php echo $count_messages?></span>
  <span class="sr-only">unread messages</span> </a>
</button><br>

<?php
$evenets="select * from event WHERE privacy='public' OR sender_id='$current_user_id'";   
      
$run_events=mysqli_query($dbC,$evenets);  
$count_events=mysqli_num_rows($run_events);
?>
<button type="button" class="btn btn-link" >
       <a href="view/events.php">Events
       <span class="badge badge-light"></span>
  <span class="sr-only">unread messages</span> </a>
</button><br>
<?php
         
         $doc ="select * from documents where reciever_id='$current_user_id'";
         $query=mysqli_query($dbC,$doc);
         $count=mysqli_num_rows($query);
        ?>
         <button type="button" class="btn btn-link" >
       <a href="view/documents.php">Documents
       <span class="badge badge-light"><?php echo $count?></span>
  <span class="sr-only">unread messages</span> </a>
</button><br>
<button type="button" class="btn btn-link" >
       <a href="view/add_project_report.php">Report
       <span class="badge badge-light"></span>
  <span class="sr-only">unread messages</span> </a>
</button><br>
        
<?php
  $connection_requests="select * from connection_requests WHERE reciever_id='$current_user_id' AND status=0";   
  $run_requests=mysqli_query($dbC,$connection_requests);
  $count_requests=mysqli_num_rows($run_requests);
   

?>
<button type="button" class="btn btn-link" >
       <a href="view/connection_requests_reply.php">Connection Requests
       <span class="badge badge-light"><?php echo $count_requests?></span>
  <span class="sr-only">unread messages</span> </a>
</button><br>
        
        <button type="button" class="btn btn-link" data-toggle="modal" data-target=".bd-example-modal-lg">
       NewsFeed
</button><br>
        

        <!-- <a href ="view/news_feeds.php">NewsFeed</a> <br> -->
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
        
        Associated Projects List
</button>
        <br>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Associated Projects</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php

        $relation_partner = "select * from relatioship_partners WHERE user_id ='$current_user_id'";
        if($query_patners=mysqli_query($dbC,$relation_partner)){
        
            while($data = mysqli_fetch_array($query_patners)){
                
            $user = $data['user_id']; 
            $project = $data['project_id']; 
            $project_query = "select * from projects WHERE project_id ='$project'";
            if($query_projects=mysqli_query($dbC,$project_query)){
            
                while($project_data = mysqli_fetch_array($query_projects)){
                    
                $name = $project_data['name']; 
                $timeline = $project_data['timeline']; 
                $purpose = $project_data['purpose']; 
                $status = $project_data['status']; 
                $location = $project_data['location']; 
                $project_id = $project_data['project_id']; 
                $_SESSION['project_id']=  $project_id;
    
                echo '
                <div class="row">
                <div class="col">
                <form  method="POST" action="view/project.php">
        <input type= "text" hidden name="id" value="'.$project_id.'">
        <button type="submit" class="btn btn-link">'.$project_id.'  '.$name.'</button><br>
        </form>
                Project timeline: '.$timeline.'<br>
                Project purpose: '.$purpose.'<br>
                Project status: <strong>'.$status.'</strong><br>
                Project location: '.$location.'<br><br>
                </div>
                </div>
                ';
                }
                     
                       }
            
            }
                 
                   }

        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        </div>
       
        </div>
        <div class="col-9">
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
            <br>
            <br>
            <br>
        
        <br>
        <br>
        <h5 style="color: green; text-align:center;">RECENT ACTIVITY</h5>

        <div style="padding-left:50px;">
        

        <?php
     $id=$_SESSION['user_id'];
     // $wall="select * from wall ";   
     $check_user_conn="select sender_id,reciever_id from connection_requests WHERE (sender_id ='$current_user_id' OR reciever_id ='$current_user_id') AND status = 1";   
     //   if($check_user)  {}  
      $run_conn=mysqli_query($dbC,$check_user_conn);
      $num=mysqli_num_rows($run_conn);
     $arry=[];
     
      if($num != 0){
         //  echo 'connection';
      while($row_conn = mysqli_fetch_array($run_conn)){ 
        
          $senderid =$row_conn['sender_id'];
          $recieverid =$row_conn['reciever_id'];
          
         // if($recieverid === $current_user_id)
         // $id1=$senderid;
         // else
         // $id2=$recieverid;
     
         $arry[] =$senderid;
         $arry[] =$recieverid;
         // $arry[] =$current_user_id;
     
     $json1=json_encode($arry, JSON_FORCE_OBJECT);
      }
      $wallid=[];
      $privacy="select * from privacy where user_id='$current_user_id' ";
      $query_privacy = mysqli_query($dbC,$privacy);
      while($row_privacy=mysqli_fetch_array($query_privacy)){
     $privacy_user_ids=$row_privacy['user_id'];
     $privacy_wall_ids=$row_privacy['wall_id'];
     $wallid[]= $privacy_wall_ids;
    //  if($wallid)
     $wall_ids_to_json =json_encode($wallid, JSON_FORCE_OBJECT);
    //  else
    //  $wall_ids_to_json =json_encode(0, JSON_FORCE_OBJECT);

      }
     //  echo $wall_ids_to_json;
     if(!empty($wall_ids_to_json))
     {
     $wallidss =$wall_ids_to_json;

      $wallids = json_decode($wallidss, TRUE );
      $new_wallids =array_unique($wallids);
      // echo '$wall_ids_to_json';
     //  echo '<br>';
     //  echo $current_user_id;
      $data=$json1;
     $array = json_decode( $data, TRUE );
     $new_array=array_unique($array);
     // echo $json1 ;
     
     //      $json = [$senderid, $recieverid];
     // if($current_user_id === $recieverid)
     // $wall="select * from wall WHERE user_id IN ($current_user_id,$senderid) AND status=0";   
     // elseif($current_user_id === $senderid)
 
  
     foreach($new_wallids as $wall){
     
     foreach($new_array as $val){
     
     $wall="select * from wall WHERE (user_id = $val OR wall_id!=$wall) AND status=0";   
     // else
     // $wall="select * from wall WHERE user_id='$recieverid' OR  user_id='$senderid' ";   
     
     $result = mysqli_query($dbC,$wall);
     if($result){
     
       while($row_ = mysqli_fetch_array($result)){
           $photo_name = $row_['photo'];
       $news_photo = "images/wall/".$row_['photo'];
     $date = $row_['date'];
     $message = $row_['message'];
     $poster = $row_['user_id'];
     $wall_id = $row_['wall_id'];
     $wall_user = $row_['user_id'];
     
     
     
     
     
     
     // like section
     $count_likes = "SELECT wall_id FROM likes WHERE wall_id = $wall_id"; 
         
       // Execute the query and store the result set 
       $count_result_like = mysqli_query($dbC, $count_likes); 
         
        
           $row_count_like = mysqli_num_rows($count_result_like); 
     
     
             
       //    comment section
       $count_comments = "SELECT wall_id FROM comment WHERE wall_id = $wall_id"; 
         
       // Execute the query and store the result set 
       $count_result = mysqli_query($dbC, $count_comments); 
         
        
           $row_count = mysqli_num_rows($count_result); 
       
     
     
     
     $all="select * from user WHERE user_id='$poster' ";   
     $all_result = mysqli_query($dbC,$all);
     $all_row_ = mysqli_fetch_array($all_result);
     $poster_fname = $all_row_['first_name'];
     $poster_lname = $all_row_['last_name'];
     $user_type = $all_row_['user_type'];
     
     $space = '';
     if($user_type === 'individual'){
       $_="select * from user WHERE user_id='$current_user_id' ";   
     $__result = mysqli_query($dbC,$_);
     $__row_ = mysqli_fetch_array($__result);
     $fnm = $__row_['first_name'];
     $lnm = $__row_['last_name'];
     // echo $fnm;
       if($fnm == $poster_fname && $lnm == $poster_lname){
           echo '
           <a href=""> You </a>Posted on your wall <br>
           <div class="row" style="margin-top:10px;">
           <div class="col-2">';
       }else{
           echo '
           <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
           <div class="row" style="margin-top:10px;">
           <div class="col-2">';
       }
       
      
     }else{
     $_="select * from user WHERE user_id='$current_user_id' ";   
     $__result = mysqli_query($dbC,$_);
     $__row_ = mysqli_fetch_array($__result);
     $fnm = $__row_['first_name'];
     $lnm = $__row_['last_name'];
     // echo $fnm;
         if($fnm == $poster_fname && $lnm == $poster_lname){
             echo '
             <a href=""> Your Company </a>Posted on your wall <br>
             <div class="row" style="margin-top:10px;">
             <div class="col-2">';
         }else{
             echo '
             <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
             <div class="row" style="margin-top:10px;">
             <div class="col-2">';
         }
     }
     // get comments
     $commented_users="select user_id from comment WHERE wall_id='$wall_id'";   
     if($commented_users_result = mysqli_query($dbC,$commented_users)){
     
       while($commented_users_row_ = mysqli_fetch_array($commented_users_result)){
           $commented_users_ids = $commented_users_row_['user_id'];
           // $ids = json_encode($commented_users_ids);
       // echo $ids;
       // echo  ;
     
     $commented_user_names="select first_name,last_name from user WHERE user_id='$commented_users_ids'";   
     if($commented_users_names_result = mysqli_query($dbC,$commented_user_names)){
     
       while($commented_users_names_row_ = mysqli_fetch_array($commented_users_names_result)){
           $commented_users_fname = $commented_users_names_row_['first_name'];
           $commented_users_lname = $commented_users_names_row_['last_name'];
     // echo $commented_users_fname;
     
     // $ids = json_encode($commented_users_fname,$commented_users_lname );
     //     echo $ids;
     
     
     
       }
     }else{
       echo "ERROR: Could not able to execute $commented_user_names. " . mysqli_error($dbC);
     
     }
     }
     
     }else{
      echo "ERROR: Could not able to execute $commented_users. " . mysqli_error($dbC);
     
     }
     
     echo'
               </div>
               
               <div>'.$message.'.<br>';
               if($photo_name !=''){
                 echo'        
               <img src='.$news_photo.'>';
               }else{
                 // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
                 echo'     ';
               }
     
     echo'
            <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
             <form  method="POST" action="view/comment.php" style="float:left;">
     <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
     <button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
             </form>
             <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
             
             <form  method="POST" action="view/like.php" style="float:left;">
             <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
             <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
                       </form>
             <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>
     ';
             if($current_user_id === $wall_user){
               // echo $current_user_id;
               // echo $user_id;
               
              echo '
                                <form  method="POST" action="view/share.php" style="float:left;">
                                <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                                          </form >
                                          
                                          <form  method="POST" action="view/wall_privacy.php" style="float:left;">
                                          <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                          <button type="submit" class="btn btn-link"><span style="color:blue;">Privacy</span></button>
                                                    </form >
     
                                                    <form  method="POST" action="view/share.php" style="float:left;">
                                                    <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                                    <button type="submit" class="btn btn-link"><span style="color:blue;">Approve</span></button>
                                                              </form >
                                                    
                                          
                                          '
                                          ;}else{echo '';}
                                          echo'
                </div>
                
                </div>
                <hr/>
              ';
     // echo $row_['message'];
       }
     }
     
     else{
     error_reporting(E_ALL & ~E_NOTICE);
     
       // echo "ERROR: Could not able to execute $wall. " . mysqli_error($dbC);
       }
     }
     }
    }else{
      $data=$json1;
     $array = json_decode( $data, TRUE );
     $new_array=array_unique($array);
      foreach($new_array as $val){
     
        $wall="select * from wall WHERE user_id = $val AND status=0";   
        // else
        // $wall="select * from wall WHERE user_id='$recieverid' OR  user_id='$senderid' ";   
        
        $result = mysqli_query($dbC,$wall);
        if($result){
        
          while($row_ = mysqli_fetch_array($result)){
              $photo_name = $row_['photo'];
          $news_photo = "images/wall/".$row_['photo'];
        $date = $row_['date'];
        $message = $row_['message'];
        $poster = $row_['user_id'];
        $wall_id = $row_['wall_id'];
        $wall_user = $row_['user_id'];
        
        
        
        
        
        
        // like section
        $count_likes = "SELECT wall_id FROM likes WHERE wall_id = $wall_id"; 
            
          // Execute the query and store the result set 
          $count_result_like = mysqli_query($dbC, $count_likes); 
            
           
              $row_count_like = mysqli_num_rows($count_result_like); 
        
        
                
          //    comment section
          $count_comments = "SELECT wall_id FROM comment WHERE wall_id = $wall_id"; 
            
          // Execute the query and store the result set 
          $count_result = mysqli_query($dbC, $count_comments); 
            
           
              $row_count = mysqli_num_rows($count_result); 
          
        
        
        
        $all="select * from user WHERE user_id='$poster' ";   
        $all_result = mysqli_query($dbC,$all);
        $all_row_ = mysqli_fetch_array($all_result);
        $poster_fname = $all_row_['first_name'];
        $poster_lname = $all_row_['last_name'];
        $user_type = $all_row_['user_type'];
        
        $space = '';
        if($user_type === 'individual'){
          $_="select * from user WHERE user_id='$current_user_id' ";   
        $__result = mysqli_query($dbC,$_);
        $__row_ = mysqli_fetch_array($__result);
        $fnm = $__row_['first_name'];
        $lnm = $__row_['last_name'];
        // echo $fnm;
          if($fnm == $poster_fname && $lnm == $poster_lname){
              echo '
              <a href=""> You </a>Posted on your wall <br>
              <div class="row" style="margin-top:10px;">
              <div class="col-2">';
          }else{
              echo '
              <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
              <div class="row" style="margin-top:10px;">
              <div class="col-2">';
          }
          
         
        }else{
        $_="select * from user WHERE user_id='$current_user_id' ";   
        $__result = mysqli_query($dbC,$_);
        $__row_ = mysqli_fetch_array($__result);
        $fnm = $__row_['first_name'];
        $lnm = $__row_['last_name'];
        // echo $fnm;
            if($fnm == $poster_fname && $lnm == $poster_lname){
                echo '
                <a href=""> Your Company </a>Posted on your wall <br>
                <div class="row" style="margin-top:10px;">
                <div class="col-2">';
            }else{
                echo '
                <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
                <div class="row" style="margin-top:10px;">
                <div class="col-2">';
            }
        }
        // get comments
        $commented_users="select user_id from comment WHERE wall_id='$wall_id'";   
        if($commented_users_result = mysqli_query($dbC,$commented_users)){
        
          while($commented_users_row_ = mysqli_fetch_array($commented_users_result)){
              $commented_users_ids = $commented_users_row_['user_id'];
              // $ids = json_encode($commented_users_ids);
          // echo $ids;
          // echo  ;
        
        $commented_user_names="select first_name,last_name from user WHERE user_id='$commented_users_ids'";   
        if($commented_users_names_result = mysqli_query($dbC,$commented_user_names)){
        
          while($commented_users_names_row_ = mysqli_fetch_array($commented_users_names_result)){
              $commented_users_fname = $commented_users_names_row_['first_name'];
              $commented_users_lname = $commented_users_names_row_['last_name'];
        // echo $commented_users_fname;
        
        // $ids = json_encode($commented_users_fname,$commented_users_lname );
        //     echo $ids;
        
        
        
          }
        }else{
          echo "ERROR: Could not able to execute $commented_user_names. " . mysqli_error($dbC);
        
        }
        }
        
        }else{
         echo "ERROR: Could not able to execute $commented_users. " . mysqli_error($dbC);
        
        }
        
        echo'
                  </div>
                  
                  <div>'.$message.'.<br>';
                  if($photo_name !=''){
                    echo'        
                  <img src='.$news_photo.'>';
                  }else{
                    // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
                    echo'     ';
                  }
        
        echo'
               <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
                <form  method="POST" action="view/comment.php" style="float:left;">
        <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
        <button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
                </form>
                <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
                
                <form  method="POST" action="view/like.php" style="float:left;">
                <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
                          </form>
                <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>
        ';
                if($current_user_id === $wall_user){
                  // echo $current_user_id;
                  // echo $user_id;
                  
                 echo '
                                   <form  method="POST" action="view/share.php" style="float:left;">
                                   <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                   <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                                             </form >
                                             
                                             <form  method="POST" action="view/wall_privacy.php" style="float:left;">
                                             <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                             <button type="submit" class="btn btn-link"><span style="color:blue;">Privacy</span></button>
                                                       </form >
        
                                                       <form  method="POST" action="view/share.php" style="float:left;">
                                                       <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                                       <button type="submit" class="btn btn-link"><span style="color:blue;">Approve</span></button>
                                                                 </form >
                                                       
                                             
                                             '
                                             ;}else{echo '';}
                                             echo'
                   </div>
                   
                   </div>
                   <hr/>
                 ';
        // echo $row_['message'];
          }
        }
        
        else{
        error_reporting(E_ALL & ~E_NOTICE);
        
          // echo "ERROR: Could not able to execute $wall. " . mysqli_error($dbC);
          }
        }
    }
     //  }
     
      }
      
//  if theres no connection
 else{
  
$wall="select * from wall WHERE user_id ='$current_user_id'  AND status=0";   
$result = mysqli_query($dbC,$wall);
if($result){

while($row_ = mysqli_fetch_array($result)){
   $photo_name = $row_['photo'];
$news_photo = "images/wall/".$row_['photo'];
$date = $row_['date'];
$message = $row_['message'];
$poster = $row_['user_id'];
$wall_id = $row_['wall_id'];
$wall_user = $row_['user_id'];





// like section
$count_likes = "SELECT wall_id FROM likes WHERE wall_id = $wall_id"; 
 
// Execute the query and store the result set 
$count_result_like = mysqli_query($dbC, $count_likes); 
 

   $row_count_like = mysqli_num_rows($count_result_like); 


     
//    comment section
$count_comments = "SELECT wall_id FROM comment WHERE wall_id = $wall_id"; 
 
// Execute the query and store the result set 
$count_result = mysqli_query($dbC, $count_comments); 
 

   $row_count = mysqli_num_rows($count_result); 




$all="select * from user WHERE user_id='$poster' ";   
$all_result = mysqli_query($dbC,$all);
$all_row_ = mysqli_fetch_array($all_result);
$poster_fname = $all_row_['first_name'];
$poster_lname = $all_row_['last_name'];
$user_type = $all_row_['user_type'];

$space = '';
if($user_type === 'individual'){
$_="select * from user WHERE user_id='$current_user_id' ";   
$__result = mysqli_query($dbC,$_);
$__row_ = mysqli_fetch_array($__result);
$fnm = $__row_['first_name'];
$lnm = $__row_['last_name'];
// echo $fnm;
if($fnm == $poster_fname && $lnm == $poster_lname){
   echo '
   <a href=""> You </a>Posted on your wall <br>
   <div class="row" style="margin-top:10px;">
   <div class="col-2">';
}else{
   echo '
   <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
   <div class="row" style="margin-top:10px;">
   <div class="col-2">';
}


}else{
$_="select * from user WHERE user_id='$current_user_id' ";   
$__result = mysqli_query($dbC,$_);
$__row_ = mysqli_fetch_array($__result);
$fnm = $__row_['first_name'];
$lnm = $__row_['last_name'];
// echo $fnm;
 if($fnm == $poster_fname && $lnm == $poster_lname){
     echo '
     <a href=""> Your Company </a>Posted on your wall <br>
     <div class="row" style="margin-top:10px;">
     <div class="col-2">';
 }else{
     echo '
     <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
     <div class="row" style="margin-top:10px;">
     <div class="col-2">';
 }
}
// get comments
$commented_users="select user_id from comment WHERE wall_id='$wall_id'";   
if($commented_users_result = mysqli_query($dbC,$commented_users)){

while($commented_users_row_ = mysqli_fetch_array($commented_users_result)){
   $commented_users_ids = $commented_users_row_['user_id'];
   // $ids = json_encode($commented_users_ids);
// echo $ids;
// echo  ;

$commented_user_names="select first_name,last_name from user WHERE user_id='$commented_users_ids'";   
if($commented_users_names_result = mysqli_query($dbC,$commented_user_names)){

while($commented_users_names_row_ = mysqli_fetch_array($commented_users_names_result)){
   $commented_users_fname = $commented_users_names_row_['first_name'];
   $commented_users_lname = $commented_users_names_row_['last_name'];
// echo $commented_users_fname;

// $ids = json_encode($commented_users_fname,$commented_users_lname );
//     echo $ids;



}
}else{
echo "ERROR: Could not able to execute $commented_user_names. " . mysqli_error($dbC);

}
}

}else{
echo "ERROR: Could not able to execute $commented_users. " . mysqli_error($dbC);

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
       
       <div>'.$message.'.<br>';
       if($photo_name !=''){
         echo'        
       <img src='.$news_photo.'>';
       }else{
         // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
         echo'     ';
       }

echo'
    <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
     <form  method="POST" action="view/comment.php" style="float:left;">
<input type="text" name="wall_id" value="'.$wall_id.'" hidden>
<button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
     </form>
     <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
     
     <form  method="POST" action="view/like.php" style="float:left;">
     <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
     <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
               </form>
     <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>

     ';
     if($current_user_id === $wall_user){
       // echo $current_user_id;
       // echo $user_id;
       
      echo '
                        
      <form  method="POST" action="view/share.php" style="float:left;">
      <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
      <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                </form >
                
                <form  method="POST" action="view/wall_privacy.php" style="float:left;">
                                     <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                     <button type="submit" class="btn btn-link"><span style="color:blue;">Privacy</span></button>
                                               </form >
                                               <form  method="POST" action="view/share.php" style="float:left;">
                                               <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                               <button type="submit" class="btn btn-link"><span style="color:blue;">Approve</span></button>
                                                         </form >
                ';}else{echo '';}
                                  echo'
        </div>
        
        </div>
        <hr/>
      ';
// echo $row_['message'];
}
}
// }else{ echo "No Recent Activity From you and Your connections";}
// }

 }
            ?>

           
            </div>
        </div>
        
        <!-- <div class="col-1"></div> -->
        <!-- <div class="col-3" style="text-align:center;float:right;">
       
         
        </div> -->
    </div>
</div>
 </div>
 <div class="col-3">
<?php
if($user_type === 'individual'){
echo'
<span style="float: right;"><a href="view/profile_individual.php" style="color: black;">Profile</a></span>
<span style="float: right;">&nbsp&nbsp&nbsp</span>

    <span style="float: right;"><a href="" style="color: black;">Home</a></span>
';
}else{
echo'
<span style="float: right;"><a href="view/profile_non_individual.php" style="color: black;">Profile</a></span>
<span style="float: right;">&nbsp&nbsp&nbsp</span>

    <span style="float: right;"><a href="" style="color: black;">Home</a></span>
'

;
}
?>
   
    <br>
<div style="background-color:black;color:white;">
<?php
$date = new DateTime();
echo date('h:i A l F jS ');
// echo $date->format('m/d/Y, H:i:s');

// print_r(localtime(time(),true));
// echo '<br />';
// print_r(localtime());

?>
</div>
<div>
<?php
 echo'<h4 style="color:blue;">Annversaries Today</h4 >';

    
    // echo $new_date;
//        $birthDate = "12/17/2020";
       //explode the date to get month, day and year
       

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
    $anniversary_id = $all_row_anniversary['user_id'];

            echo'
            <div class="row">
            <div class ="col-3">
            <img src='.$photo_url.' style=" border-radius: 40%;" height="20" width=""20>
   
            </div>
            <div class= "col-9">
             <span style="color:blue;">'.$name.',</span> Occasion: <span  style="color:blue;">'.$years.' year(s) in existance.</span>
             </div>
             <a href="view/regards.php?link='.$anniversary_id.'">Send Regards</a>
             </div>
             ';

         }else{
             $not = "No Anniversary Today";
           $empty = json_encode($not);
        }


    }
echo $empty;
    echo '
    
<hr style="border-width: 5px;padding-left:30px;padding-right:30px;background-color:black;color:black;width:80%;">

    ';
    
    ?>
</div>
 <h4 style="color:blue;">Relationship Partners Notification</a></h4 >
        <br>
        <br>
        
        <?php




$award_user_id=$_SESSION['user_id'];
$confirm_status =0;
$award_="select * from relatioship_partners WHERE user_id='$award_user_id' AND confirm_status=$confirm_status";   
if($award_result = mysqli_query($dbC,$award_)){
    if(mysqli_num_rows($award_result) != 0){

    while($row_ = mysqli_fetch_array($award_result)){

        $who_added_you = $row_['add_by'];
        $parnership_id = $row_['relationship_id'];
        $parnership_project = $row_['project_id'];

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
//  $count_result_like = mysqli_query($dbC, $count_likes); 

 $row_count_requests = mysqli_num_rows($project_results); 

 $project_name = $project_row_['name'];



        // echo $adder_fname;
        // echo $adder_lname;
        // echo $adder_user_type;
if($adder_user_type === 'individual'){
    $adder_profile="select photo from profile_individual WHERE user_id='$who_added_you'";   
    $adder_profile_results = mysqli_query($dbC,$adder_profile);
    $adder_profile_row_ = mysqli_fetch_array($adder_profile_results);
$adder_photo = "images/dp/".$adder_profile_row_['photo'];
}else{
    $adder_profile="select photo from profile_non_individual WHERE user_id='$who_added_you'";   
    $adder_profile_results = mysqli_query($dbC,$adder_profile);
    $adder_profile_row_ = mysqli_fetch_array($adder_profile_results);
$adder_photo = "images/dp/".$adder_profile_row_['photo'];
}
      



//     $award_photo = "images/dp/".$row_['award_picture'];
// $name = $row_['name_of_award'];
// $from = $row_['award_from'];
// echo $row_['message'];
// echo $row_['date'];

echo '
<div class ="row">
<div class = col-3>
<img src='.$adder_photo.' style=" border-radius: 50%;" alt="profile photo" height="70" width="80"><br>

</div>
<div class = col-9>
<a href="">'.$adder_fname.'  '.$adder_lname.'</a><br>
included you on project <a href ="">'.$project_name.'</a>
<form  method="POST" action="view/confirm_partner.php" style="float:left;">
<input type="text" name="parnership_id" value="'.$parnership_id.'" hidden>
<button type="submit" class="btn btn-link"><span style="color:blue;">Confirm Relationship</span></button>
          </form>
</div>

</div>

<hr style="border-width: 5px;padding-left:30px;padding-right:30px;background-color:black;color:black;width:80%;">
    
 ';
// echo $row_['message'];
    }

}else{echo "No Relationship Request";}
}
else{
    echo "ERROR: Could not able to execute $award_. " . mysqli_error($dbC);

}
// $requests = json_encode($row_count_requests);

            ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">NewsFeeds</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-8">
      <?php
   $id=$_SESSION['user_id'];
   // $wall="select * from wall ";   
   $check_user_conn="select sender_id,reciever_id from connection_requests WHERE (sender_id ='$current_user_id' OR reciever_id ='$current_user_id') AND status = 1";   
   //   if($check_user)  {}  
    $run_conn=mysqli_query($dbC,$check_user_conn);
    $num=mysqli_num_rows($run_conn);
   $arry=[];
   
    if($num != 0){
       //  echo 'connection';
    while($row_conn = mysqli_fetch_array($run_conn)){ 
      
        $senderid =$row_conn['sender_id'];
        $recieverid =$row_conn['reciever_id'];
        
       // if($recieverid === $current_user_id)
       // $id1=$senderid;
       // else
       // $id2=$recieverid;
   
       $arry[] =$senderid;
       $arry[] =$recieverid;
       // $arry[] =$current_user_id;
   
   $json1=json_encode($arry, JSON_FORCE_OBJECT);
    }
    $wallid=[];
    $privacy="select * from privacy where user_id='$current_user_id' ";
    $query_privacy = mysqli_query($dbC,$privacy);
    while($row_privacy=mysqli_fetch_array($query_privacy)){
   $privacy_user_ids=$row_privacy['user_id'];
   $privacy_wall_ids=$row_privacy['wall_id'];
   $wallid[]= $privacy_wall_ids;
  //  if($wallid)
   $wall_ids_to_json =json_encode($wallid, JSON_FORCE_OBJECT);
  //  else
  //  $wall_ids_to_json =json_encode(0, JSON_FORCE_OBJECT);

    }
   //  echo $wall_ids_to_json;
   if(!empty($wall_ids_to_json))
   {
   $wallidss =$wall_ids_to_json;

    $wallids = json_decode($wallidss, TRUE );
    $new_wallids =array_unique($wallids);
    // echo '$wall_ids_to_json';
   //  echo '<br>';
   //  echo $current_user_id;
    $data=$json1;
   $array = json_decode( $data, TRUE );
   $new_array=array_unique($array);
   // echo $json1 ;
   
   //      $json = [$senderid, $recieverid];
   // if($current_user_id === $recieverid)
   // $wall="select * from wall WHERE user_id IN ($current_user_id,$senderid) AND status=0";   
   // elseif($current_user_id === $senderid)


   foreach($new_wallids as $wall){
   
   foreach($new_array as $val){
   
   $wall="select * from wall WHERE (user_id = $val OR wall_id!=$wall) AND status=0";   
   // else
   // $wall="select * from wall WHERE user_id='$recieverid' OR  user_id='$senderid' ";   
   
   $result = mysqli_query($dbC,$wall);
   if($result){
   
     while($row_ = mysqli_fetch_array($result)){
         $photo_name = $row_['photo'];
     $news_photo = "images/wall/".$row_['photo'];
   $date = $row_['date'];
   $message = $row_['message'];
   $poster = $row_['user_id'];
   $wall_id = $row_['wall_id'];
   $wall_user = $row_['user_id'];
   
   
   
   
   
   
   // like section
   $count_likes = "SELECT wall_id FROM likes WHERE wall_id = $wall_id"; 
       
     // Execute the query and store the result set 
     $count_result_like = mysqli_query($dbC, $count_likes); 
       
      
         $row_count_like = mysqli_num_rows($count_result_like); 
   
   
           
     //    comment section
     $count_comments = "SELECT wall_id FROM comment WHERE wall_id = $wall_id"; 
       
     // Execute the query and store the result set 
     $count_result = mysqli_query($dbC, $count_comments); 
       
      
         $row_count = mysqli_num_rows($count_result); 
     
   
   
   
   $all="select * from user WHERE user_id='$poster' ";   
   $all_result = mysqli_query($dbC,$all);
   $all_row_ = mysqli_fetch_array($all_result);
   $poster_fname = $all_row_['first_name'];
   $poster_lname = $all_row_['last_name'];
   $user_type = $all_row_['user_type'];
   
   $space = '';
   if($user_type === 'individual'){
     $_="select * from user WHERE user_id='$current_user_id' ";   
   $__result = mysqli_query($dbC,$_);
   $__row_ = mysqli_fetch_array($__result);
   $fnm = $__row_['first_name'];
   $lnm = $__row_['last_name'];
   // echo $fnm;
     if($fnm == $poster_fname && $lnm == $poster_lname){
         echo '
         <a href=""> You </a>Posted on your wall <br>
         <div class="row" style="margin-top:10px;">
         <div class="col-2">';
     }else{
         echo '
         <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
         <div class="row" style="margin-top:10px;">
         <div class="col-2">';
     }
     
    
   }else{
   $_="select * from user WHERE user_id='$current_user_id' ";   
   $__result = mysqli_query($dbC,$_);
   $__row_ = mysqli_fetch_array($__result);
   $fnm = $__row_['first_name'];
   $lnm = $__row_['last_name'];
   // echo $fnm;
       if($fnm == $poster_fname && $lnm == $poster_lname){
           echo '
           <a href=""> Your Company </a>Posted on your wall <br>
           <div class="row" style="margin-top:10px;">
           <div class="col-2">';
       }else{
           echo '
           <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
           <div class="row" style="margin-top:10px;">
           <div class="col-2">';
       }
   }
   // get comments
   $commented_users="select user_id from comment WHERE wall_id='$wall_id'";   
   if($commented_users_result = mysqli_query($dbC,$commented_users)){
   
     while($commented_users_row_ = mysqli_fetch_array($commented_users_result)){
         $commented_users_ids = $commented_users_row_['user_id'];
         // $ids = json_encode($commented_users_ids);
     // echo $ids;
     // echo  ;
   
   $commented_user_names="select first_name,last_name from user WHERE user_id='$commented_users_ids'";   
   if($commented_users_names_result = mysqli_query($dbC,$commented_user_names)){
   
     while($commented_users_names_row_ = mysqli_fetch_array($commented_users_names_result)){
         $commented_users_fname = $commented_users_names_row_['first_name'];
         $commented_users_lname = $commented_users_names_row_['last_name'];
   // echo $commented_users_fname;
   
   // $ids = json_encode($commented_users_fname,$commented_users_lname );
   //     echo $ids;
   
   
   
     }
   }else{
     echo "ERROR: Could not able to execute $commented_user_names. " . mysqli_error($dbC);
   
   }
   }
   
   }else{
    echo "ERROR: Could not able to execute $commented_users. " . mysqli_error($dbC);
   
   }
   
   echo'
             </div>
             
             <div>'.$message.'.<br>';
             if($photo_name !=''){
               echo'        
             <img src='.$news_photo.'>';
             }else{
               // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
               echo'     ';
             }
   
   echo'
          <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
           <form  method="POST" action="view/comment.php" style="float:left;">
   <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
   <button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
           </form>
           <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
           
           <form  method="POST" action="view/like.php" style="float:left;">
           <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
           <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
                     </form>
           <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>
   ';
           if($current_user_id === $wall_user){
             // echo $current_user_id;
             // echo $user_id;
             
            echo '
                              <form  method="POST" action="view/share.php" style="float:left;">
                              <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                              <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                                        </form >
                                        
                                        <form  method="POST" action="view/wall_privacy.php" style="float:left;">
                                        <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                        <button type="submit" class="btn btn-link"><span style="color:blue;">Privacy</span></button>
                                                  </form >
   
                                                  <form  method="POST" action="view/share.php" style="float:left;">
                                                  <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                                  <button type="submit" class="btn btn-link"><span style="color:blue;">Approve</span></button>
                                                            </form >
                                                  
                                        
                                        '
                                        ;}else{echo '';}
                                        echo'
              </div>
              
              </div>
              <hr/>
            ';
   // echo $row_['message'];
     }
   }
   
   else{
   error_reporting(E_ALL & ~E_NOTICE);
   
     // echo "ERROR: Could not able to execute $wall. " . mysqli_error($dbC);
     }
   }
   }
  }else{
    $data=$json1;
   $array = json_decode( $data, TRUE );
   $new_array=array_unique($array);
    foreach($new_array as $val){
   
      $wall="select * from wall WHERE user_id = $val AND status=0";   
      // else
      // $wall="select * from wall WHERE user_id='$recieverid' OR  user_id='$senderid' ";   
      
      $result = mysqli_query($dbC,$wall);
      if($result){
      
        while($row_ = mysqli_fetch_array($result)){
            $photo_name = $row_['photo'];
        $news_photo = "images/wall/".$row_['photo'];
      $date = $row_['date'];
      $message = $row_['message'];
      $poster = $row_['user_id'];
      $wall_id = $row_['wall_id'];
      $wall_user = $row_['user_id'];
      
      
      
      
      
      
      // like section
      $count_likes = "SELECT wall_id FROM likes WHERE wall_id = $wall_id"; 
          
        // Execute the query and store the result set 
        $count_result_like = mysqli_query($dbC, $count_likes); 
          
         
            $row_count_like = mysqli_num_rows($count_result_like); 
      
      
              
        //    comment section
        $count_comments = "SELECT wall_id FROM comment WHERE wall_id = $wall_id"; 
          
        // Execute the query and store the result set 
        $count_result = mysqli_query($dbC, $count_comments); 
          
         
            $row_count = mysqli_num_rows($count_result); 
        
      
      
      
      $all="select * from user WHERE user_id='$poster' ";   
      $all_result = mysqli_query($dbC,$all);
      $all_row_ = mysqli_fetch_array($all_result);
      $poster_fname = $all_row_['first_name'];
      $poster_lname = $all_row_['last_name'];
      $user_type = $all_row_['user_type'];
      
      $space = '';
      if($user_type === 'individual'){
        $_="select * from user WHERE user_id='$current_user_id' ";   
      $__result = mysqli_query($dbC,$_);
      $__row_ = mysqli_fetch_array($__result);
      $fnm = $__row_['first_name'];
      $lnm = $__row_['last_name'];
      // echo $fnm;
        if($fnm == $poster_fname && $lnm == $poster_lname){
            echo '
            <a href=""> You </a>Posted on your wall <br>
            <div class="row" style="margin-top:10px;">
            <div class="col-2">';
        }else{
            echo '
            <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
            <div class="row" style="margin-top:10px;">
            <div class="col-2">';
        }
        
       
      }else{
      $_="select * from user WHERE user_id='$current_user_id' ";   
      $__result = mysqli_query($dbC,$_);
      $__row_ = mysqli_fetch_array($__result);
      $fnm = $__row_['first_name'];
      $lnm = $__row_['last_name'];
      // echo $fnm;
          if($fnm == $poster_fname && $lnm == $poster_lname){
              echo '
              <a href=""> Your Company </a>Posted on your wall <br>
              <div class="row" style="margin-top:10px;">
              <div class="col-2">';
          }else{
              echo '
              <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
              <div class="row" style="margin-top:10px;">
              <div class="col-2">';
          }
      }
      // get comments
      $commented_users="select user_id from comment WHERE wall_id='$wall_id'";   
      if($commented_users_result = mysqli_query($dbC,$commented_users)){
      
        while($commented_users_row_ = mysqli_fetch_array($commented_users_result)){
            $commented_users_ids = $commented_users_row_['user_id'];
            // $ids = json_encode($commented_users_ids);
        // echo $ids;
        // echo  ;
      
      $commented_user_names="select first_name,last_name from user WHERE user_id='$commented_users_ids'";   
      if($commented_users_names_result = mysqli_query($dbC,$commented_user_names)){
      
        while($commented_users_names_row_ = mysqli_fetch_array($commented_users_names_result)){
            $commented_users_fname = $commented_users_names_row_['first_name'];
            $commented_users_lname = $commented_users_names_row_['last_name'];
      // echo $commented_users_fname;
      
      // $ids = json_encode($commented_users_fname,$commented_users_lname );
      //     echo $ids;
      
      
      
        }
      }else{
        echo "ERROR: Could not able to execute $commented_user_names. " . mysqli_error($dbC);
      
      }
      }
      
      }else{
       echo "ERROR: Could not able to execute $commented_users. " . mysqli_error($dbC);
      
      }
      
      echo'
                </div>
                
                <div>'.$message.'.<br>';
                if($photo_name !=''){
                  echo'        
                <img src='.$news_photo.'>';
                }else{
                  // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
                  echo'     ';
                }
      
      echo'
             <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
              <form  method="POST" action="view/comment.php" style="float:left;">
      <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
      <button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
              </form>
              <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
              
              <form  method="POST" action="view/like.php" style="float:left;">
              <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
              <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
                        </form>
              <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>
      ';
              if($current_user_id === $wall_user){
                // echo $current_user_id;
                // echo $user_id;
                
               echo '
                                 <form  method="POST" action="view/share.php" style="float:left;">
                                 <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                 <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                                           </form >
                                           
                                           <form  method="POST" action="view/wall_privacy.php" style="float:left;">
                                           <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                           <button type="submit" class="btn btn-link"><span style="color:blue;">Privacy</span></button>
                                                     </form >
      
                                                     <form  method="POST" action="view/share.php" style="float:left;">
                                                     <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                                     <button type="submit" class="btn btn-link"><span style="color:blue;">Approve</span></button>
                                                               </form >
                                                     
                                           
                                           '
                                           ;}else{echo '';}
                                           echo'
                 </div>
                 
                 </div>
                 <hr/>
               ';
      // echo $row_['message'];
        }
      }
      
      else{
      error_reporting(E_ALL & ~E_NOTICE);
      
        // echo "ERROR: Could not able to execute $wall. " . mysqli_error($dbC);
        }
      }
  }
   //  }
   
    }
 
 
//  if theres no connection
 else{
  
$wall="select * from wall WHERE user_id ='$current_user_id'  AND status=0";   
$result = mysqli_query($dbC,$wall);
if($result){

while($row_ = mysqli_fetch_array($result)){
   $photo_name = $row_['photo'];
$news_photo = "images/wall/".$row_['photo'];
$date = $row_['date'];
$message = $row_['message'];
$poster = $row_['user_id'];
$wall_id = $row_['wall_id'];
$wall_user = $row_['user_id'];





// like section
$count_likes = "SELECT wall_id FROM likes WHERE wall_id = $wall_id"; 
 
// Execute the query and store the result set 
$count_result_like = mysqli_query($dbC, $count_likes); 
 

   $row_count_like = mysqli_num_rows($count_result_like); 


     
//    comment section
$count_comments = "SELECT wall_id FROM comment WHERE wall_id = $wall_id"; 
 
// Execute the query and store the result set 
$count_result = mysqli_query($dbC, $count_comments); 
 

   $row_count = mysqli_num_rows($count_result); 




$all="select * from user WHERE user_id='$poster' ";   
$all_result = mysqli_query($dbC,$all);
$all_row_ = mysqli_fetch_array($all_result);
$poster_fname = $all_row_['first_name'];
$poster_lname = $all_row_['last_name'];
$user_type = $all_row_['user_type'];

$space = '';
if($user_type === 'individual'){
$_="select * from user WHERE user_id='$current_user_id' ";   
$__result = mysqli_query($dbC,$_);
$__row_ = mysqli_fetch_array($__result);
$fnm = $__row_['first_name'];
$lnm = $__row_['last_name'];
// echo $fnm;
if($fnm == $poster_fname && $lnm == $poster_lname){
   echo '
   <a href=""> You </a>Posted on your wall <br>
   <div class="row" style="margin-top:10px;">
   <div class="col-2">';
}else{
   echo '
   <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
   <div class="row" style="margin-top:10px;">
   <div class="col-2">';
}


}else{
$_="select * from user WHERE user_id='$current_user_id' ";   
$__result = mysqli_query($dbC,$_);
$__row_ = mysqli_fetch_array($__result);
$fnm = $__row_['first_name'];
$lnm = $__row_['last_name'];
// echo $fnm;
 if($fnm == $poster_fname && $lnm == $poster_lname){
     echo '
     <a href=""> Your Company </a>Posted on your wall <br>
     <div class="row" style="margin-top:10px;">
     <div class="col-2">';
 }else{
     echo '
     <a href=""> '.$poster_fname.'  '.$poster_lname.' </a>Posted on his wall <br>
     <div class="row" style="margin-top:10px;">
     <div class="col-2">';
 }
}
// get comments
$commented_users="select user_id from comment WHERE wall_id='$wall_id'";   
if($commented_users_result = mysqli_query($dbC,$commented_users)){

while($commented_users_row_ = mysqli_fetch_array($commented_users_result)){
   $commented_users_ids = $commented_users_row_['user_id'];
   // $ids = json_encode($commented_users_ids);
// echo $ids;
// echo  ;

$commented_user_names="select first_name,last_name from user WHERE user_id='$commented_users_ids'";   
if($commented_users_names_result = mysqli_query($dbC,$commented_user_names)){

while($commented_users_names_row_ = mysqli_fetch_array($commented_users_names_result)){
   $commented_users_fname = $commented_users_names_row_['first_name'];
   $commented_users_lname = $commented_users_names_row_['last_name'];
// echo $commented_users_fname;

// $ids = json_encode($commented_users_fname,$commented_users_lname );
//     echo $ids;



}
}else{
echo "ERROR: Could not able to execute $commented_user_names. " . mysqli_error($dbC);

}
}

}else{
echo "ERROR: Could not able to execute $commented_users. " . mysqli_error($dbC);

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
       
       < <div>'.$message.'.<br>';
       if($photo_name !=''){
         echo'        
       <img src='.$news_photo.'>';
       }else{
         // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
         echo'     ';
       }

echo'
    <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
     <form  method="POST" action="view/comment.php" style="float:left;">
<input type="text" name="wall_id" value="'.$wall_id.'" hidden>
<button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
     </form>
     <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
     
     <form  method="POST" action="view/like.php" style="float:left;">
     <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
     <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
               </form>
     <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>

     ';
     if($current_user_id === $wall_user){
       // echo $current_user_id;
       // echo $user_id;
       
      echo '
                       
      <form  method="POST" action="view/share.php" style="float:left;">
      <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
      <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                </form >
                
                <form  method="POST" action="view/wall_privacy.php" style="float:left;">
                <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                <button type="submit" class="btn btn-link"><span style="color:blue;">Privacy</span></button>
                          </form >

                          <form  method="POST" action="view/share.php" style="float:left;">
                          <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                          <button type="submit" class="btn btn-link"><span style="color:blue;">Approve</span></button>
                                    </form >
                          
                ';}else{echo '';}
                                  echo'
        </div>
        
        </div>
        <hr/>
      ';
// echo $row_['message'];
}
}
// }else{ echo "No Recent Activity From you and Your connections";}
// }

 }

        ?>
      </div>
      <div class="col-4">

      
      <strong> Relationship Partners Requests</strong> <br><br><?php
       
       $award_user_id=$_SESSION['user_id'];
       $confirm_status =0;
       $award_="select * from relatioship_partners WHERE user_id='$award_user_id' AND confirm_status=$confirm_status";   
       if($award_result = mysqli_query($dbC,$award_)){
           if(mysqli_num_rows($award_result) != 0){
       
           while($row_ = mysqli_fetch_array($award_result)){
       
               $who_added_you = $row_['add_by'];
               $parnership_id = $row_['relationship_id'];
               $parnership_project = $row_['project_id'];
       
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
       //  $count_result_like = mysqli_query($dbC, $count_likes); 
       
        $row_count_requests = mysqli_num_rows($project_results); 
       
        $project_name = $project_row_['name'];
       
       
       
               // echo $adder_fname;
               // echo $adder_lname;
               // echo $adder_user_type;
       if($adder_user_type === 'individual'){
           $adder_profile="select photo from profile_individual WHERE user_id='$who_added_you'";   
           $adder_profile_results = mysqli_query($dbC,$adder_profile);
           $adder_profile_row_ = mysqli_fetch_array($adder_profile_results);
       $adder_photo = "images/dp/".$adder_profile_row_['photo'];
       }else{
           $adder_profile="select photo from profile_non_individual WHERE user_id='$who_added_you'";   
           $adder_profile_results = mysqli_query($dbC,$adder_profile);
           $adder_profile_row_ = mysqli_fetch_array($adder_profile_results);
       $adder_photo = "images/dp/".$adder_profile_row_['photo'];
       }
             
       
       
       
       //     $award_photo = "images/dp/".$row_['award_picture'];
       // $name = $row_['name_of_award'];
       // $from = $row_['award_from'];
       // echo $row_['message'];
       // echo $row_['date'];
       
       echo '
       <div class ="row">
       
       <div class = col-8>
       <a href="">'.$adder_fname.'  '.$adder_lname.'</a><br>
       included you on project <a href ="">'.$project_name.'</a>
       <form  method="POST" action="view/confirm_partner.php" style="float:left;">
       <input type="text" name="parnership_id" value="'.$parnership_id.'" hidden>
       <button type="submit" class="btn btn-link"><span style="color:blue;">Confirm Relationship</span></button>
                 </form>
       </div>
       
       </div>
       
       <hr style="border-width: 15px;padding-left:30px;padding-right:30px;background-color:black;width:80%;">
           
        ';
       // echo $row_['message'];
           }
        }else{
            echo'You have no connection Requests';
        }
       }
       
       else{
           echo "ERROR: Could not able to execute $award_. " . mysqli_error($dbC);
       
       }
      ?>
      </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 </div>
 </div>


</body>   
   
</html>   
