
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

    <title>Privacy</title>   
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
        &nbsp&nbsp&nbsp
        <a href="account.php">Back to Account</a>
            <div class="card">
                <div class="card-header"><h4>Account Settings</h4></div>

                <div class="card-body">
                

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shared Posts by you</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <?php
     $share = "select * from share WHERE shared_from_id='$user_id'";
     $share_query = mysqli_query($dbC,$share);
     if(mysqli_num_rows($share_query)!=0){

    //  $share_results = mysqli_fetch_array($share_query);
     while($share_results = mysqli_fetch_array($share_query)){
         $content_id = $share_results['content_id'];
         $shared_to_id = $share_results['shared_to_id'];
        //  $content_id = $share_results['content_id'];
        $shared_content = "select message from wall WHERE wall_id='$content_id'";
        $share_query_content = mysqli_query($dbC,$shared_content);
        // $share_results_content = mysqli_fetch_array($share_query_content);
        while($share_results_content = mysqli_fetch_array($share_query_content)){
$message =$share_results_content['message'];
$query_user = "select first_name,last_name from user WHERE user_id='$shared_to_id'";
$send_to = mysqli_query($dbC,$query_user);
if($send_to){
// $share_results_content = mysqli_fetch_array($send_to);
while($share_results_send_to = mysqli_fetch_array($send_to)){
$fnm=$share_results_send_to['first_name'];
$lnm=$share_results_send_to['last_name'];
echo '
<a href="">You shared</a> '.$message.' to <a href="">'.$fnm.'  '.$lnm.'</a><br>
';
        }
      }else{

        echo "ERROR: Could not able to execute $query_user. " . mysqli_error($dbC);
      }
      }

     }
    }else{echo "You haven't any Post";}

     ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Veiw What you shared 
</button><br><br>
        <!-- <button type="button" class="btn btn-primary">Account </button><br><br> -->
       
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  View what others shared with you
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Shared Posts by others</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
     $share = "select * from share WHERE shared_to_id='$user_id'";
     $share_query = mysqli_query($dbC,$share);
        if(mysqli_num_rows($share_query)!=0){

    //  $share_results = mysqli_fetch_array($share_query);
     while($share_results = mysqli_fetch_array($share_query)){
         $content_id = $share_results['content_id'];
         $shared_from_id = $share_results['shared_from_id'];
        //  $content_id = $share_results['content_id'];
        $shared_content = "select message from wall WHERE wall_id='$content_id'";
        $share_query_content = mysqli_query($dbC,$shared_content);
        // $share_results_content = mysqli_fetch_array($share_query_content);
        while($share_results_content = mysqli_fetch_array($share_query_content)){
$message =$share_results_content['message'];
$query_user = "select first_name,last_name from user WHERE user_id='$shared_from_id'";
$send_to = mysqli_query($dbC,$query_user);
if($send_to){
// $share_results_content = mysqli_fetch_array($send_to);
while($share_results_send_to = mysqli_fetch_array($send_to)){
$fnm=$share_results_send_to['first_name'];
$lnm=$share_results_send_to['last_name'];
echo '
<a href="">'.$fnm.'  '.$lnm.'</a> shared '.$message.' <br>
';
        }
      }else{

        echo "ERROR: Could not able to execute $query_user. " . mysqli_error($dbC);
      }
      }


     }
    }else{echo "Nothing shared from others";}

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
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 