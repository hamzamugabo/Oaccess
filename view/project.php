<?php  
    include("../config/config.php");   

session_start();
if(!$_POST['id']){
     echo "<script>window.open('non_individual_profile.php','_self')</script>";   

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Projects</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="../css\style.css">    
 <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css">   
   

</head>
<body >
<body class="home" >   
<div id="login-header">
             <div class="container" >
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

 <!-- project map -->
 <div class="row" style="margin-bottom: 30px;">
     <div class="col-md-8">
     <div class="mapouter">
     
     <div class="gmap_canvas">
     <?php
     if(isset($_POST['id']))
{
  $my_array = [];
  $loti = [];
  $logi = [];
     $project_id=$_POST['id'];

     $_SESSION['project_id'] = $project_id;

     $project_session_id = $_SESSION['project_id'];

    //  echo $_POST['id'];
     // $user_pass=$_POST['password']; 
     if($project_id) 
       $project_sql_loc="select * from projects WHERE project_id = '$project_id'";
       else
       $project_sql_loc="select * from projects WHERE project_id = '$project_session_id'";

      
      if($query_loc=mysqli_query($dbC,$project_sql_loc))  {
      //  $result = mysqli_query($dbC,$wall)  
    //  while(  
       $results_loc = mysqli_fetch_array($query_loc );
      //  ) {
       $lat =$results_loc['lat'];
       $log =$results_loc['log'];
       $loc_name =$results_loc['location'];
       $icon = 'location.png';
    $project_location = "../images/".$icon;

      //  $my_array[] = $results_loc;
      //  $lati[] = $lat;
      //  $logi[] = $log;
      // }
      // $js_array = json_encode($my_array);
      // $js_array_lat = json_encode($lati);
      // $js_array_log = json_encode($logi);
      // echo $js_array_lat;
    }
    else{

        echo "ERROR: Could not able to execute $project_sql_loc. " . mysqli_error($dbC);
      }
       }?>
     <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCP5mkhNYD-bOxcNX1wOTCCKVh0CUBbdkc&sensor=false"></script>
<script>
// // alert(javascript_array_lati);
    var myMap;
    var lat = "<?php echo $lat ?>";
    var log = "<?php echo $log ?>";
//     var cord1 ={
// lati1:0.3475,
// long1:32.64917

//     };
    var cord2 =(0.3475,32.64917);
    var coord ={};
    var myLatlng = new google.maps.LatLng(lat,log);
    function initialize() {
        var mapOptions = {
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.TERRAIN  ,
            scrollwheel: false
        }
        myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: myMap,
            title: '<?php echo $loc_name?>',
            icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
            // icon:'<?php echo $project_location?>'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="map" style="width:100%; height: 300px; ">

</div>
<br>
<div style="float: left;">
<span><a href="../index.php">Home</a></span> &nbsp&nbsp&nbsp<span><a href="../index.php">Account</a></span>
</div>
     
     </div>
     <!-- <div class="col-md-4">
     <table class="table">
  <thead>
    <tr class="bg-info">
     
      <th scope="col" style="color: green;">Timeline</th>
      <th scope="col"  style="color: green;">Projects</th>
    </tr>
  </thead>
  <tbody>
    <tr class="bg-info">
     
      <td  style="color: white;">Otto</td>
      <td  style="color: white;">@mdo</td>
    </tr>
    
  </tbody>
</table>
     </div> -->
 </div></div></div>
<!-- project section -->
     <div class="row">

     <div class="col-1">
<h5 style="color:blue;">PROJECT ID <?php echo $_POST['id'];  ?>
<?php
    // $_SESSION['project_id'] = $_POST['id'];

if(isset($_POST['id']))
{
     $project_id=$_POST['id'];

     $_SESSION['project_id'] = $project_id;

     $project_session_id = $_SESSION['project_id'];

     //  echo $_POST['id'];
      // $user_pass=$_POST['password']; 
      if($project_id) 
        $project_sql="select * from projects WHERE project_id = '$project_id'";
        else
        $project_sql="select * from projects WHERE project_id = '$project_session_id'";
   
      //  $project_sql="select * from projects WHERE project_id='$project_id'";   
      
       $query=mysqli_query($dbC,$project_sql);   
       $results = mysqli_fetch_assoc($query);
       $purpose =$results['purpose'];
      //  $team =$results['team_members'];
       $status =$results['status'];
       $award =$results['project_award'];
       $pro_award =$results['award'];
       $name =$results['name'];
       $project_photo = "../images/award/".$award;

}
?>

</h5>
<br>
<?php echo $pro_award; ?>
     </div>

     <div class="col-2">
     <h5 style="color:blue;">PURPOSE</h5>
         <br>
         <?php
         echo $purpose;
         ?>
<!-- Tables allow you to aggregate a huge amount of data and present it in a clear and orderly way. 
MDB tables provide additional benefits like responsiveness and 
the possibility of manipulating the table styles. -->
     

     </div>

     <div class="col-3">
     <h5 style="color:blue;">TEAM MEMBERS</h5>
         

         <?php
          echo '
          <div >
         
          <a href="add_project_team_members.php">Add Team Members</a><br>
          
         </div>
         <br>
          ';
        //  echo $team;
?>
<div class="row">
<?php
       
        //   $user_id = $_SESSION['user_id'];
        $pro_id =$_SESSION['project_id'];
          $check_partner="select * from project_team  WHERE project_id='$pro_id'";   
         

          if($project_data = mysqli_query($dbC,$check_partner)){

            while($row_partner = mysqli_fetch_array($project_data)){
            // $project_photo = "../images/relationship_partners/".$row_partner['project_award'];
        $member_name = $row_partner['name'];
        $partner_profile_id= $row_partner['user_id'];
        // $user_type= $row_partner['user_type'];
        $user_one_sepa = explode(" ", $member_name);
        $fname = $user_one_sepa[0];
  
        $lname = $user_one_sepa[1];
        $check_user_type="select user_type from user WHERE user_id='$partner_profile_id'";   
         

        if($user_data = mysqli_query($dbC,$check_user_type)){
          $row_user = mysqli_fetch_array($user_data);
          $user_type = $row_user['user_type'];
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
        <img src='.$display_photo.' alt="award height="60px" width="80px"
       
        
        <a href="">'.$member_name.'</a><br>
        
        
       </div>
       
           
        ';
        // echo $row_['message'];
      }
            }
        } 
  
       
         ?>
<!-- Tables allow you to aggregate a huge amount of data and present it in a clear and orderly way. 
MDB tables provide additional benefits like responsiveness and 
the possibility of manipulating the table styles. -->
    

     </div>
     </div>

     <div class="col-1">
     <h5 style="color:blue;">STATUS OF PROJECT</h5>
         <br>

         <?php
         echo $status;
         ?>
<!-- Tables allow you to aggregate a huge amount of data and present it in a clear and orderly way. 
MDB tables provide additional benefits like responsiveness and 
the possibility of manipulating the table styles. -->
  

     </div>

     <div class="col-2">
     <h5 style="color:blue;">Award</h5>
     <?php
         echo '
         <h5>'.$pro_award.'</h5>
         <img src='.$project_photo.' alt="award" height="200px" width="220px">
         
         ';
         ?>
       </div>

     <div class="col-3">
     <h5 style="color:blue;">PROJECT PHOTOS</h5>
     <!-- <div style="border: 1px solid black">    -->
        <form method="POST" action="add_project_photos.php" enctype="multipart/form-data">
        <!-- <input type="text" hidden name="id" value="<?php $project_id ?>"> -->
      <strong> add photos:</strong> <input type="file" name="files[]"><br>
<!-- <br> -->
<button type="submit" class="btn btn-link"><strong>Add</strong></button>
        </form > 
            <!-- </div> -->
         <br>
   <div class="row">
   <?php
// if(isset($_POST['id']))

// echo $project_id;
   $project_images="select * from project_images WHERE project_id='$project_id'";   
   if($result = mysqli_query($dbC,$project_images)){
   
       while($row_ = mysqli_fetch_array($result)){
   $name = $row_['file_name'];

       $photo = "../images/project/".$name;
   $name = $row_['file_name'];
   $id = $row_['id'];

   $_SESSION['photo_id']=$id;
  //  $from = $row_['award_from'];
   // echo $row_['message'];
   // echo $row_['date'];
  //  echo $photo;
   echo '
   <div class="col-6">
   <form method="POST" action="view_photo.php" >
   <input type="text" name="photo" value="'.$id.'" hidden>
<button type="submit" class="btn btn-link"> <img src='.$photo.' height="100" width="150"></button>

  
   </form>
   </div>
   <br>
   <br>
   <br>
   ';
   // echo $row_['message'];
       }
   }
   ?>
  
   </div>

     </div>


     </div>

     <div class="footer">
<div class="row">
    <div class="col-2">PROJECT ID</div>
    <div  class="col-2">RELATIONSHIP</div>
    <div  class="col-2">TEAM MEMBERS</div>
    <div  class="col-4">STATUS OF PROJECT</div>
    <div  class="col-2">PROJECT PICTURES</div>
</div>
     </div>


</body>
</html>
