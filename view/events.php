
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

    <title>Events</title>   
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
            <div class="card">
                <div class="card-header"><h4>Events</h4></div>

                <div class="card-body">
                    
                    <button type="" class="btn btn-link"><a href="create_event.php"> +Create Event</a></button>
                   <?php
                   
                   $doc ="select * from event where privacy='public' or sender_id='$user_id'";
                   $query=mysqli_query($dbC,$doc);
                   if(mysqli_num_rows($query)!=0){
                   while($results=mysqli_fetch_array($query)){
                       $photo = $results['photo'];
                       $start =$results['start_date'];
                       $end =$results['end_date'];
                       $event_name =$results['event_name'];
                       $location =$results['location'];
                       $sender_id =$results['sender_id'];
                       $event_id =$results['event_id'];

                       $query_sender ="select first_name,last_name from user where user_id='$user_id'";
                       $query_results=mysqli_query($dbC,$query_sender);
                       $user_res= mysqli_fetch_assoc($query_results);
                       $fnm =$user_res['first_name'];
                       $lnm =$user_res['last_name'];

                       echo'
                       <br><br>
                    <img src="../images/events/'.$photo.'">
                    <span style="color:red;">'.$start.'</span>
                    <h3>'.$event_name.'</h3>
                   '.$location.'

                      
                    <br><br>

                    <button type="button" class="btn bnt-default" style="width:150px;background-color:lightgray;">
                    <a href="interested.php?link='.$event_id.'" style="color:black;"><strong>Interested</strong></a>
                    
                    </button>

                    <button type="button" class="btn bnt-default" style="width:150px;background-color:lightgray;">
                    <a href="view_event.php?link='.$event_id.'" style="color:black;"><strong>More</strong></a>
                    
                    </button>
                       ';
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
 