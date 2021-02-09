
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('../app/auth/login.php','_self')</script>";  
    
}
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
        About Me<br>
        Documents & Reports 23<br>
        Work Applications<br>
        Subscription
        </div>
       <div style="background-color: black; color:white; text-align:center;margin-top:50px;">
<h5>Relationship Partners</h5>
       </div>
       <div>
       <?php
        //   $user_id = $_SESSION['user_id'];
         
          $check_partner="select * from relatioship_partners WHERE user_id='$user_id'";   
         
          $run1=mysqli_query($dbC,$check_partner);   
          $row1 = mysqli_fetch_assoc($run1);
          $names = $row1['name'];

          
          $photos = $row1['image'];
          $photo_array =explode(',',$photos);
          $name_array =explode(',',$names);
    $photo1 = "../images/relationship_partners/".$photo_array[0];
    $photo2 = "../images/relationship_partners/".$photo_array[1];
    $photo3 = "../images/relationship_partners/".$photo_array[2];
    $photo4 = "../images/relationship_partners/".$photo_array[3];
    $photo5 = "../images/relationship_partners/".$photo_array[4];

        //   echo $row1['image'];
  
       ?>
       <div class="row" style="margin-bottom:10px;margin-top:20px;">
       <div class="col-md-4"><?php 
        echo "<img src=".$photo1." height=50>";
       
       ?>
        <a href="">
        <?php echo $name_array[0]; ?>
        </a>
       </div>
       <div class="col-md-4"><?php 
        echo "<img src=".$photo2." height=50>";
       
       ?>
       <a href="">
        <?php echo $name_array[1]; ?>
        </a>
       </div>
       <div class="col-md-4"><?php
        echo "<img src=".$photo3." height=50>";
        ?>
        <a href="">
        <?php echo $name_array[2]; ?>
        </a>
        </div>
        
       </div>

       <div class="row" style="margin-bottom:10px;margin-top:20px;">
       <div class="col-md-4"><?php 
        echo "<img src=".$photo4." height=50>";
       
       ?>
       <a href="">
        <?php echo $name_array[3]; ?>
        </a>
       </div>
       <div class="col-md-4"><?php 
        echo "<img src=".$photo5." height=50>";
       
       ?>
       <a href="">
        <?php echo $name_array[4]; ?>
        </a>
       </div>
       <div class="col-md-4">
       <?php
        // echo "<img src=".$photo3.">";
        ?>
        </div>
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
$wall="select * from wall WHERE user_id='$id'";   
if($result = mysqli_query($dbC,$wall)){

    while($row_ = mysqli_fetch_array($result)){
    $news_photo = "../images/wall/".$row_['photo'];
$date = $row_['date'];
$message = $row_['message'];
// echo $row_['message'];
// echo $row_['date'];

echo '
<div class="row">
<div class="col-2">

            
<img src='.$news_photo.' width=80 height=80>


            </div>
            <div class="col-8"><p>'.$message.'.</p>
          <strong> posted at</strong>  '.$date.'
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
 
 