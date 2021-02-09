<?php  
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
   <link type="text/css" rel="stylesheet" href="../css\bootstrap.css">   
   

</head>
<body >
<div style="margin-bottom: 10px;margin-top:10px;">
profile of ministry of East African Community Affairs>>Projects
<span style="float: right;"><a href="">Profile</a> </span>
<span style="float: right;">&nbsp</span>

<span style="float: right;"><a href="">Home </a> </span>
</div>
<div style="background-color: black; margin-bottom:15px;color:white;">
<div style="text-align:right;">  
THE REPUBLIC OF KENYA(
    <?php
    
    echo date('h:i A l F jS ');
        ?>
)
</div>
<div style="text-align:center;margin-top: 0px;">  
<form>
    <input type="text">
</form>
</div>
<!-- <span style="float: right; ">Profile</span> -->

</div>


<div class="cont" style="margin-bottom:20px;">
<span style="border-right: 1px solid black;">Enlarge>></span>
<span style="border-right: 1px solid black;">Print Preview>></span>
<span style="border-right: 1px solid black;">Save>></span>
<span style="border-right: 1px solid black;">Send>></span>
Projects
<!-- <span style="border-right: 1px solid black;">Projects</span> -->

 </div>

 <!-- project map -->
 <div class="row" style="margin-bottom: 30px;">
     <div class="col-md-8">
     <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="325" id="gmap_canvas" src="https://maps.google.com/maps?q=kireka&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://soap2day-to.com">soap2day</a><br><style>.mapouter{position:relative;text-align:right;height:325px;width:1080px;}</style><a href="https://www.embedgooglemap.net">google maps insert</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:325px;width:1080px;}</style></div></div>

     </div>
     <div class="col-md-4">
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
     </div>
 </div>
<!-- project section -->
     <div class="row">

     <div class="col-1">
<h4 style="color:blue;">PROJECT ID 
<?php
    include("../config/config.php");   
    // $_SESSION['project_id'] = $_POST['id'];

if(isset($_POST['id']))
{
     $project_id=$_POST['id'];

     $_SESSION['project_id'] = $project_id;

     echo $_POST['id'];
     // $user_pass=$_POST['password'];  
       $project_sql="select * from projects WHERE project_id='$project_id'";   
      
       $query=mysqli_query($dbC,$project_sql);   
       $results = mysqli_fetch_assoc($query);
       $purpose =$results['purpose'];
       $team =$results['team_members'];
       $status =$results['status'];
       $award =$results['project_award'];
       $pro_award =$results['award'];
       $name =$results['name'];
       $project_photo = "../images/award/".$award;

}
?>

</h4>
<br>
<?php echo $pro_award; ?>
     </div>

     <div class="col-2">
     <h4 style="color:blue;">PURPOSE</h4>
         <br>
         <?php
         echo $purpose;
         ?>
<!-- Tables allow you to aggregate a huge amount of data and present it in a clear and orderly way. 
MDB tables provide additional benefits like responsiveness and 
the possibility of manipulating the table styles. -->
     

     </div>

     <div class="col-2">
     <h4 style="color:blue;">TEAM MEMBERS</h4>
         <br>
         <?php
         echo $team;
         ?>
<!-- Tables allow you to aggregate a huge amount of data and present it in a clear and orderly way. 
MDB tables provide additional benefits like responsiveness and 
the possibility of manipulating the table styles. -->
    

     </div>

     <div class="col-1">
     <h4 style="color:blue;">STATUS OF PROJECT</h4>
         <br>

         <?php
         echo $status;
         ?>
<!-- Tables allow you to aggregate a huge amount of data and present it in a clear and orderly way. 
MDB tables provide additional benefits like responsiveness and 
the possibility of manipulating the table styles. -->
  

     </div>

     <div class="col-2">
     <?php
         echo '
         <h4>'.$pro_award.'</h4>
         <img src='.$project_photo.' alt="award" height="200px" width="220px">
         
         ';
         ?>
       </div>

     <div class="col-4">
     <h4 style="color:blue;">PROJECT PHOTOS</h4>
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
