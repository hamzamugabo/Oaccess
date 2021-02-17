
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('../app/auth/login.php','_self')</script>";  
    
}
if($_SESSION['user_type'] != 'individual'){
    echo "<script>window.open('../../view/non_individual_profile.php','_self')</script>";  

}
$current_user_type =$_SESSION['user_type'];
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

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
     
<div class="container" style="margin-top:30px">
    <div class="row">
    <div class="col-3" style="margin-right:0px;">
    <?php
    
    include("../config/config.php");   
       
    // if($_SESSION['email'])   
    // {   
        $user_email = $_SESSION['email'];
        // $user_id = $_SESSION['user_id'];
         
        $check_user="select * from profile_individual WHERE email='$user_email'";   
       
        $run=mysqli_query($dbC,$check_user);   
        $row = mysqli_fetch_assoc($run);
        $image = $row['photo'];
        $img_path = "../images/dp/".$image;
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $user_id = $row['user_id'];
        $past_job_position = $row['employement_past_position'];
        $past_job_name = $row['employement_past_name'];
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
       
    // }
        ?>
        <div style="margin-top: 40px;">
        <a href="../index.php"> Home</a><br>
        About Me<br>
        Documents & Reports 23<br>
        Work Applications<br>
        Subscription
        </div>
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

        if($current_user_type === 'individual'){
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
        </div>
        <div class="col-6">
        <div style="border: 1px solid black">   
        <form method="POST" action="wall.php" enctype="multipart/form-data">

        <br>
        <input type="text" name="news" placeholder="Communicate">
<br>
<br>
      <strong> upload photo:</strong> <input type="file" name="news_photo"><br>
<br>
        <input type="submit" value="submit" name="submit">
        </form > 
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        <div class="row">
            <div class="col">
            <?php
//     if($_SESSION['email'])   
// {
    
    $image = $row['logo'];
    $image_array =explode(',',$image);
    $image_name1 = $image_array[1];
    // $image1 = $image_array[1];
    $image1 = "../images/logo/".$image_array[1];
        // echo $image1;
        echo "<img src=".$image1." width=90 height=100>
        
        ";

  
        
    // }
    ?>
    <a href="">
    <?php

    echo $image_name1;
    ?>
    </a>
            </div>
            <div class="col">
            <?php 
             $image2 = "../images/logo/".$image_array[2];
    $image_name2 = $image_array[2];

                //  echo $image_name2;
                 echo "<img src=".$image2." width=90 height=100>
                 ";
            ?>
        <!-- <img src="images/bou.jpg" alt="user" width="90" height="100"> -->
        <a href=""> 
        <?php
        echo $image_name2;
        ?>
        </a>
            </div>
            <div class="col">
            <?php 
             $image3 = "../images/logo/".$image_array[3];
    $image_name3 = $image_array[3];

                //  echo $3;
                 echo "<img src=".$image3." width=90 height=100>
                 ";
            ?>
        <!-- <img src="images/igg.png" alt="user" width="90" height="100"> -->
        <a href="">
        <?php
        echo $image_name3;
        ?>
        </a>
            </div>
            
        </div>
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
$space = '';
if($current_user_type === 'individual'){
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

                    <form  method="POST" action="like.php" style="float:left;">
                    <input type="text" name="wall_id" value="'.$wall_id.'" hidden>
                    <button type="submit" class="btn btn-link"><span style="color:blue;">Share</span></button>
                              </form>
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
 
 