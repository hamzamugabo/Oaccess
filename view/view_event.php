
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
    <title>Event</title>   
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
        <div class="col-md-8">
        <a href="../index.php">Home</a>
        &nbsp&nbsp&nbsp
        <a href="non_individual_profile.php">Profile</a>
            <div class="card">
                <div class="card-header"><h4>
                <?php
                if($_GET['link']){
                  $event_id = $_GET['link'];
              $doc ="select * from event where event_id='$event_id'";
              $query=mysqli_query($dbC,$doc);
              if(mysqli_num_rows($query)!=0){
           //    while(
                  $results=mysqli_fetch_assoc($query);
           //    ){
                  $photo = $results['photo'];
                  $start =$results['start_date'];
                  $end =$results['end_date'];
                  $event_name =$results['event_name'];
                  echo $event_name;
           }}
                ?>
                </h4></div>

                <div class="card-body">
                    
                    <!-- <button type="" class="btn btn-link"><a href="create_event.php"> +Create Event</a></button> -->
                   <?php
                   if($_GET['link']){
                       $event_id = $_GET['link'];
                   $doc ="select * from event where event_id='$event_id'";
                   $query=mysqli_query($dbC,$doc);
                   if(mysqli_num_rows($query)!=0){
                //    while(
                       $results=mysqli_fetch_assoc($query);
                //    ){
                       $photo = $results['photo'];
                       $start =$results['start_date'];
                       $end =$results['end_date'];
                       $event_name =$results['event_name'];
                       $location =$results['location'];
                       $sender_id =$results['sender_id'];
                       $event_id =$results['event_id'];
                       $description =$results['description'];

                       $query_sender ="select user_type,user_id,first_name,last_name from user where user_id='$sender_id'";
                       $query_results=mysqli_query($dbC,$query_sender);
                       $user_res= mysqli_fetch_assoc($query_results);
                       $fnm =$user_res['first_name'];
                       $lnm =$user_res['last_name'];
                       $uid =$user_res['user_id'];
                       $utype =$user_res['user_type'];

                       if($utype === 'individual')
                       $profile ="select photo from profile_individual where user_id='$uid'";
                       else
                       $profile ="select photo from profile_non_individual where user_id='$uid'";

                       $query_profile=mysqli_query($dbC,$profile);
                       $profile_res= mysqli_fetch_assoc($query_profile);
                       $dp_photo ="../images/dp/".$profile_res['photo'];
                      //  echo $dp_photo;

                       echo'
                       <br><br>
                    <img src="../images/events/'.$photo.'" >
                    <span style="color:red;">'.$start.'  -  '.$end.'</span>
                    <h3>'.$event_name.'</h3>
                   '.$location.'

                      
                    <br><br><br>

                    <button type="button" class="btn bnt-default" style="width:150px;background-color:lightgray;">
                    <a href="interested.php?link='.$event_id.'" style="color:black;"><strong>Interested</strong></a>
                    
                    </button>
                        <br><br><br><br>

                        <h4>Details<h/4><br><br>
                        '.$description.'
                   <br><br><br>
                   <h4>Hosted By</4><br><br>
                   <div class="row">
                   <div class="col-1"><img src="'.$dp_photo.'" style=" border-radius: 50%;"></div>
                   <div class="col-6"><b>'.$fnm.'  '.$lnm.'</b></div>
                   </div><br><br>

                   
                       ';?>
                       
                         <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Intereted Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
                       $interested = "select * from interested where event_id='$event_id'";
                       $query_interested =mysqli_query($dbC,$interested);
                       $count=mysqli_num_rows($query_interested);
                       while($interested_row=mysqli_fetch_array($query_interested)){
                           $interested_id= $interested_row['interested_id'];

                           $users ="select user_id, first_name,last_name from user where user_id='$interested_id'";
                           $query_users =mysqli_query($dbC,$users);
                          //  $count=mysqli_num_rows($query_users);
                           while($users_row=mysqli_fetch_array($query_users)){
                               $first_name=$users_row['first_name'];
                               $last_name=$users_row['last_name'];
                               $userid=$users_row['user_id'];

                               echo'
                             <a href="">  '.$first_name.' '.$last_name.' </a><br>
                               ';

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
                       <?php

                       echo'
                       <h4>Responses</h4><br>

                       <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
        
                       <strong>Interested    '.$count.'</strong>
               </button>
                       ';
                //    }
                }
            }else{
    echo "<script>window.history.go(-1)</script>";  

            }
                   ?>
    
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 