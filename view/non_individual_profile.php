
<?php 
include_once('../config/config.php');

session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('../app/auth/login.php','_self')</script>";  
    
}
if($_SESSION['user_type'] != 'non_individual'){
    echo "<script>window.open('../view/individual_profile.php','_self')</script>";  

}
$current_user_id = $_SESSION['user_id'];
$current_user_type = $_SESSION['user_type'];
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Profile</title>   
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
<body class="home" >   

     
<div class="container" style="margin-top:30px">

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Regards</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
$regard="select * from regards WHERE user_id='$current_user_id' AND status=0 ";   
// if(
    $result_regard = mysqli_query($dbC,$regard);
// ){
    $row_count_regards = mysqli_num_rows($result_regard); 
    if($row_count_regards){
    while($row_regard = mysqli_fetch_array($result_regard)){
$sender_id = $row_regard['sender_id'];
$regard_id = $row_regard['regard_id'];
$sender="select first_name,last_name from user WHERE user_id='$sender_id'";   
$result_sender = mysqli_query($dbC,$sender);
$row_sender = mysqli_fetch_assoc($result_sender);
$sender_fn= $row_sender['first_name'];
$sender_ln= $row_sender['last_name'];

// echo ''.$sender_fn.'  '.$sender_ln.'';
echo'

<a href="">'.$sender_fn.'  '.$sender_ln.'</a> sent you regards upon your anniversary <a href="regards_update.php?link='.$regard_id.'">Mark as Read</a>
<br><br>
';

    }

}
// } else{echo "ERROR: Could not able to execute $regard. " . mysqli_error($dbC);}
?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<?php
if($row_count_regards){
    echo'
    <div style="float:right;">
    &nbsp&nbsp&nbsp
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Regards <span class="badge badge-light">'.$row_count_regards.'</span>
  <span class="sr-only">unread messages</span>
</button>
    
    </div>
    ';
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connection Requests</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
$regard="select * from connection_requests WHERE reciever_id='$current_user_id' AND status=0 ";   
// if(
    $result_request = mysqli_query($dbC,$regard);
// ){
    $row_count_requests = mysqli_num_rows($result_request); 
    if($row_count_requests){
    while($row_requests = mysqli_fetch_array($result_request)){
$sender_id = $row_requests['sender_id'];
$request_id = $row_requests['connection_id'];
$sender="select first_name,last_name from user WHERE user_id='$sender_id'";   
$result_sender = mysqli_query($dbC,$sender);
$row_sender = mysqli_fetch_assoc($result_sender);
$sender_fn= $row_sender['first_name'];
$sender_ln= $row_sender['last_name'];

// echo ''.$sender_fn.'  '.$sender_ln.'';
echo'

<a href="">'.$sender_fn.'  '.$sender_ln.'</a> sent you Connection Request <a href="requests_update.php?link='.$request_id.'">Accept Request</a>
<br><br>
';

    }

}
// } else{echo "ERROR: Could not able to execute $regard. " . mysqli_error($dbC);}
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
if($row_count_requests){
    echo'
    
    <div style="float:right;">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
Connection Requests <span class="badge badge-light">'.$row_count_requests.'</span>
<span class="sr-only">unread messages</span>
</button>
    
</button>
    
    </div>
    ';
}
?>

     <br><br><br>
<div class="row">
<div class="col-3"></div>
<div class="col-6"></div>
<div class="col-3" style="margin-right:0%;">
<a href="../index.php"><span style="color:black;">Home</span ></a>  <a href="non_individual_profile.php"><span  style="color:black;"> Profile</span></a>  <a href="account.php"><span style="color:black;"> Account</span></a>
<br>
<div style="margin-top:10px;margin-bottom:10px; color:white; background-color:black;">
BOSINIA $ HE.. <?php echo date('h:i A F jS ');?>
</div>
</div>
</div>
    <div class="row">
    <div class="col-3">
    <?php
    
    include("../config/config.php");   
       
    // if($_SESSION['email'])   
    // {   
        $user_email = $_SESSION['email'];
        $uid = $_SESSION['user_id'];
         
        $check_user="select * from profile_non_individual WHERE user_id='$uid'";   
       
        $run=mysqli_query($dbC,$check_user);   
        $row = mysqli_fetch_assoc($run);
        $image = $row['photo'];
        $name = $row['name'];
        $license = $row['license_no'];
        $mission = $row['mission'];
        $division = $row['division'];
        $tin = $row['tin'];
        $img_path = "../images/dp/".$image;
        // $first_name = $row['first_name'];
        // $last_name = $row['last_name'];
        $user_id = $row['user_id'];
        $_SESSION['profile_id'] = $row['profile_non_individual_id'];
        // $past_job_position = $row['employement_past_position'];
        // $past_job_name = $row['employement_past_name'];
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
        ?>
        <!-- <div style="margin-top: 40px;">
        About Me<br>
        Documents & Reports 23<br>
        Work Applications<br>
        Subscription
        </div> -->

        <br<br><br><br>
        <div style="text-align: center;background-color:black; color:white;margin-bottom:5px;color:white;"> <a href="about_us.php" style="color: white;"><h5>About Us</h5></a></div>
        <div style="text-align: center;background-color:black; color:white;margin-bottom:5px;color:white;"> <a href="" style="color: white;"><h5>The Team</h5></a></div>
        <div style="text-align: center;background-color:black; color:white;margin-bottom:5px;color:white;"> <a href="" style="color: white;"><h5>Reports</h5></a></div>
        <div style="text-align: center;background-color:black; color:white;margin-bottom:5px;color:white;"> <a href="connections.php" style="color: white;"><h5>Potential Connections</h5></a></div>
       <div style="background-color: black; color:white; text-align:center;margin-top:50px;">
<h5>Relationship Partners</h5>
       </div>
       <div>
       <a href="add_partner.php">add Partners</a><br><br>
       <div class="row">

       <?php
          $uid = $_SESSION['user_id'];
         
          $check_partner="select * from relatioship_partners WHERE add_by='$uid'";   
         

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
        <img src='.$display_photo.' alt="award" height="60px" width="70"><br>
       
       <a href ="">'.$partner_name.'</a><br>
      
        
       </div>
           
        ';
        // echo $row_['message'];
            }
        } 
  
       ?>
       
       </div>
       
       </div>

       <div style="background-color: black; color:white; text-align:center;margin-top:50px;">
<h5>Projects</h5>
       </div>
       <div>
       <a href="add_project.php">Add Projects</a>
       <div class="row" style="margin-bottom:10px;margin-top:20px;">

       <?php
        //   $user_id = $_SESSION['user_id'];
      
          $project="select * from projects WHERE user_id='$user_id'";   



          if($project_data = mysqli_query($dbC,$project)){

            while($row_project = mysqli_fetch_array($project_data)){
            $project_photo = "../images/award/".$row_project['project_award'];
        $project_name = $row_project['name'];
        $project_id = $row_project['project_id'];
        $_SESSION['project_id']=$project_id;
        $award = $row_project['award'];
        // $from = $row_project['award_from'];
        // echo $row_['message'];
        // echo $row_['date'];
        
        echo '
        <div class="col-6">
        <img src='.$project_photo.' alt="award"  height=50><br>
        <form  method="POST" action="project.php">
        <input type= "text" hidden name="id" value="'.$project_id.'">
        <button type="submit" class="btn btn-link">'.$project_name.'</button><br>
        </form>
        
       </div>
           
        ';
        // echo $row_['message'];
            }
        } 
         
         
       ?>
       </div> 
       
       </div>
<!-- applications -->
<div style="background-color: black; color:white; text-align:center;margin-top:50px;">
<h5>Applications</h5>
       </div>
       <div>
       <a href="add_application.php">Add Application</a>
       <div class="row" style="margin-bottom:10px;margin-top:20px;">

       <?php
        //   $user_id = $_SESSION['user_id'];
      
          $app="select * from application WHERE user_id='$user_id'";   



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
        <img src='.$app_photo.' alt="award"  height=50><br>
        <form  method="POST" action="">
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


       <!-- images -->

       <div style="background-color: black; color:white; text-align:center;margin-top:50px;">
<h5>Images</h5>
       </div>
       <div>
       <a href="add_images.php">Add Image</a>
       <div class="row" style="margin-bottom:10px;margin-top:20px;">

       <?php
        //   $user_id = $_SESSION['user_id'];
      
        $gallery="select * from gallery WHERE user_id='$user_id'";   
        if($result_gallery = mysqli_query($dbC,$gallery)){
        
            while($row_gallery = mysqli_fetch_array($result_gallery)){
        $gallery_photo = $row_gallery['photo'];
     
            $photo_gallery = "../images/gallery/".$gallery_photo;
        $text = $row_gallery['text'];
        $id = $row_gallery['id'];
     
        $_SESSION['photo_id']=$id;
       //  $from = $row_['award_from'];
        // echo $row_['message'];
        // echo $row_['date'];
       //  echo $photo;
        echo '
        <div class="col-6">
        <form method="POST" action="view_gallery.php" >
        <input type="text" name="photo" value="'.$id.'" hidden>
     <button type="submit" class="btn btn-link"> <img src='.$photo_gallery.' height="100" width="150"></button>
     
       
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
        <div class="col-6">
        <div style="text-align: center;">
        <h1> <?php echo $name; ?></h1>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        
        Post on your wall
</button>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Post on your wall</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- <div style="border: 1px solid black;">    -->
        <form method="POST" action="wall.php" enctype="multipart/form-data">

        <br>
        <textarea class="form-control" placeholder="Post on your wall" name="news" id="exampleFormControlTextarea1" rows="3"required></textarea>
        <!-- <input type="text" name="news" placeholder="Post on your wall" required> -->
<br>
<br>
      <input type="file" name="news_photo"><br>
<br>
        <input type="submit" value="submit" name="submit">
        </form > 
            <!-- </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
       
            <br>
            <br>
            <br>
        <div class="row">
            <div class="col">
            <?php
//     if($_SESSION['email'])   
// {
    
 
        ?>
        </a>
            </div>
            <div class="col">
            <?php 
            
        ?>
        </a>
            </div>
            
        </div>
        <h5 style="color: green;">RECENT ACTIVITY</h5>

        <div style="padding-left:50px;">
        <?php
       $id=$_SESSION['user_id'];
       // $wall="select * from wall ";   
       $check_user_conn="select sender_id,reciever_id from connection_requests WHERE (sender_id ='$current_user_id' OR reciever_id ='$current_user_id') AND status = 1";   
       //   if($check_user)  {}  
        $run_conn=mysqli_query($dbC,$check_user_conn);
        $num=mysqli_num_rows($run_conn);
        if($num != 0){
           //  echo 'connection';
        while($row_conn = mysqli_fetch_array($run_conn)){ 
          
            $senderid =$row_conn['sender_id'];
            $recieverid =$row_conn['reciever_id'];
       
            $json = [$senderid, $recieverid];
       if($current_user_id === $recieverid)
       $wall="select * from wall WHERE user_id IN ($current_user_id,$senderid)  AND status=0";   
       elseif($current_user_id === $senderid)
       $wall="select * from wall WHERE user_id IN ($recieverid)  AND status=0";   
       // else
       // $wall="select * from wall WHERE user_id='$recieverid' OR  user_id='$senderid' ";   
       
       $result = mysqli_query($dbC,$wall);
       if($result){
       
         while($row_ = mysqli_fetch_array($result)){
             $photo_name = $row_['photo'];
         $news_photo = "../images/wall/".$row_['photo'];
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
                 
                 <div class="col-8">'.$message.'.<br>
              <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
               <form  method="POST" action="comment.php" style="float:left;">
       <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
       <button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
               </form>
               <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
               
               <form  method="POST" action="like.php" style="float:left;">
               <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
               <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
                         </form>
               <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>
       ';
       if($current_user_id === $wall_user){
        // echo $current_user_id;
        // echo $user_id;
        
       echo '
                        
       <form  method="POST" action="share.php" style="float:left;">
       <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
       <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                 </form >';}else{echo '';}
                                   echo'
         </div>
         
         </div>
         <hr/>
       ';
       // echo $row_['message'];
         }
       }
       else{
         echo "ERROR: Could not able to execute $wall. " . mysqli_error($dbC);
         }
        }
       
        }
        
       //  if theres no connection
        else{
         
       $wall="select * from wall WHERE user_id ='$current_user_id'  AND status=0";   
       $result = mysqli_query($dbC,$wall);
       if($result){
       
       while($row_ = mysqli_fetch_array($result)){
          $photo_name = $row_['photo'];
       $news_photo = "../images/wall/".$row_['photo'];
       $date = $row_['date'];
       $message = $row_['message'];
       $poster = $row_['user_id'];
       $wall_id = $row_['wall_id'];
       
       
       
       
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
              
              <div class="col-8">'.$message.'.<br>
           <span style="font-size:12px"> <strong> posted at</strong>  '.$date.' </span>&nbsp&nbsp&nbsp<br>
            <form  method="POST" action="comment.php" style="float:left;">
       <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
       <button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
            </form>
            <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
            
            <form  method="POST" action="like.php" style="float:left;">
            <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
            <button type="submit" class="btn btn-link"><span style="color:blue;">Like</span></button>
                      </form>
            <button type="submit" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count_like.'</span></button>
       ';
            if($current_user_id === $wall_user){
        
              echo '
                              
                           <form  method="POST" action="share.php" style="float:left;">
                           <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                           <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                                     </form >';}else{echo '';}
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
        <div class="col-3" style="text-align:center;float:right;">
        <br>
        <br>
        
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary"">
 <a href="add_award.php" style="color:white;">Add Award</a>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Award</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="award.php" enctype="multipart/form-data">

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
</form >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <br>
        <br>
        <div style="text-align: center;background-color:black; color:white;margin-bottom:5px;color:white;"> <a href="contact_us.php" style="color: white;"><h5>Contact Us</h5></a></div>

        <?php
$award_user_id=$_SESSION['user_id'];
$award_="select * from award WHERE user_id='$award_user_id'";   
if($award_result = mysqli_query($dbC,$award_)){

    while($row_ = mysqli_fetch_array($award_result)){
    $award_photo = "../images/award/".$row_['award_picture'];
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
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
//   x.style.display = "none";

  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>   
   
</html>   
 
 