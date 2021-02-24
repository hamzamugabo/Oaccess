
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

    <title>Posts</title>   
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
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                
               
                <?php
                if($user_type ==='individual')
                $profile ="select photo from profile_individual WHERE user_id='$user_id'";
                else
                $profile ="select photo from profile_non_individual WHERE user_id='$user_id'";

                $profile_query =mysqli_query($dbC,$profile);
                $profile_results=mysqli_fetch_assoc($profile_query);
                $photo = "../images/dp/".$profile_results['photo'];

                $user_name ="select first_name,last_name from user WHERE user_id='$user_id'";

                $user_query =mysqli_query($dbC,$user_name);
                $user_results=mysqli_fetch_assoc($user_query);
                $first_name = $user_results['first_name'];
                $last_name = $user_results['last_name'];
                // echo $photo;
                echo'
                <div class="row">
                <div class="col-1">
       <img src='.$photo.' >
                
                </div>
                <div class="col-2">
                '.$first_name.'   '.$last_name.'
                </div>

                </div>
                ';
                ?>
                
                </div>

                <div class="card-body">
                <?php 
                $wall="select * from wall WHERE user_id = '$user_id' AND status=0";   
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
         $_="select * from user WHERE user_id='$user_id' ";   
       $__result = mysqli_query($dbC,$_);
       $__row_ = mysqli_fetch_array($__result);
       $fnm = $__row_['first_name'];
       $lnm = $__row_['last_name'];
       // echo $fnm;
         if($fnm == $poster_fname && $lnm == $poster_lname){
             echo '
             
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
       if($user_id === $wall_user){
        // echo $current_user_id;
        // echo $user_id;
        
       echo '
                        
       <form  method="POST" action="share.php" style="float:left;">
       <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
       <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                 </form >';}else{echo '';}
                                   echo'
                                   <form  method="POST" action="delete_post.php" style="float:left;">
                                   <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                                   <button type="submit" class="btn btn-link"><span style="color:blue;">Delete</span></button>
                                             </form>
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
                   


                    
                    
                    
           

 if($user_type === 'individual'){
 echo'
 <br><br>
<div style="text-align:center;">
 <a href="individual_profile.php" style="text-align:center">Profile</a>
 <a href="../index.php" style="text-align:center">Home</a>
 <a href="account.php" style="text-align:center">Account</a>
 </div>
 ';}
 else{
    echo'
    <br><br>
<div style="text-align:center;">

    <a href="non_individual_profile.php" style="text-align:center">Profile</a>
    <a href="../index.php" style="text-align:center">Home</a>
    <a href="account.php" style="text-align:center">Account</a>


    </div>
    ';}  
    
 
                    ?>
                     <!-- <br><br>
<div style="text-align:center;">

    <a href="../index.php" style="text-align:center">Home</a>
    </div>

    <br><br>
<div style="text-align:center;">

    <a href="account.php" style="text-align:center">Account</a>
    </div> -->
    
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 