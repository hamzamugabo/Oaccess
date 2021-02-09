
<?php  
session_start();
if(!$_SESSION['photo_id']){
     echo "<script>window.open('non_individual_profile.php','_self')</script>";   

}
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>photo</title>   
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

     
<div class="container">
    <?php
    include("../config/config.php");   
   
if(isset($_POST['photo']))
{
     $photo_id=$_POST['photo'];

     
    //  echo $_POST['id'];
     // $user_pass=$_POST['password'];  
       $project_sql="select * from gallery WHERE id='$photo_id'";   
      
       $query=mysqli_query($dbC,$project_sql);   
       $results = mysqli_fetch_assoc($query);
      
       $image =$results['photo'];
       $project_photo = "../images/gallery/".$image;

       echo '
       <br><br>
       <img src='.$project_photo.' >
       <br><br>
       <a href= "non_individual_profile.php">
<strong>Back to profile page</strong>
       </a>
       <br><br>
       ';

}

    ?>

</div>
   
</body>   
   
</html>   
 