
<?php 
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
$current_user_id = $_SESSION['user_id'];
$current_user_type = $_SESSION['user_type'];
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>Add partner</title>   
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
        <form method="POST" action="logout.php" style="float:right">
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
                <div class="card-header">Add Relatonship Partner</div>

                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                  
                        
                       
                        
                        
                         
                        <div class="form-group row">
                            <label for="member_name" class="col-md-3 col-form-label text-md-right">Select Partner</label>

                            <div class="col-md-3">
                            <select multiple name="partner[]"  class="form-control" id="exampleFormControlSelect2" required>
                            <?php
    include("../config/config.php");   

 $app="select * from user WHERE user_id !=$current_user_id ";   



 if($app_data = mysqli_query($dbC,$app)){

   while($row_app = mysqli_fetch_array($app_data)){
//    $app_photo = "../images/applications/".$row_app['app_logo'];
$app_name = $row_app['first_name'];
$lname = $row_app['last_name'];
$user_id = $row_app['user_id'];
echo
'
<option>
   '.$app_name.' '.$lname.'    
      
</option>
';
} 
}

?>
     
    </select>
                             
                                  
                            </div>
                            <label for="member_name" class="col-md-3 col-form-label text-md-right">Select Project</label>

<div class="col-md-3">
<select  name="project"  class="form-control" id="exampleFormControlSelect2" required>
<?php
// include("../config/config.php");   
$user = $_SESSION['user_id'];
$partner="select * from projects WHERE user_id='.$user.'";   



if($partner_data = mysqli_query($dbC,$partner)){

while($row_partner = mysqli_fetch_array($partner_data)){
//    $partner_photo = "../images/partnerlications/".$row_partner['partner_logo'];
$partner_name = $row_partner['name'];
$projectid = $row_partner['project_id'];
// $user_id = $row_partner['user_id'];
echo
'
<option>
'.$partner_name.' id '.$projectid.' 

</option>
';
} 
}

?>

</select>
 
      
</div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-3 col-form-label text-md-right">Date</label>

                            <div class="col-md-3">
                                <input  type="date" class="form-control" name="date"   autofocus>

                             
                                  
                            </div>
                            
                        </div>
                       

                       

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Add
                                </button>
                                <?php
                                if($current_user_type === 'individual')
                                {
                                    echo '
                                    <a href="individual_profile.php">back to profile</a>
                                      
                                      ';
                                }
                                else{
                                    echo '
                                  <a href="non_individual_profile.php">back to profile</a>
                                    
                                    ';

                                }
                                ?>
                                
                              
                               
                                  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>  
 <?php
 if(isset($_POST['project'],$_POST['date'])){
$date =$_POST['date'];
$project_name = $_POST['project'];
    foreach ($_POST['partner'] as $icon) 
      {
       ///your insert code//
      //  echo  $icon.',';
      $pizza  = $icon.',';
$pieces = explode(",", $pizza);
      
      // echo $pieces[0];
      // echo "</br>";  
      // echo $pieces[1];

      $user_one = $pieces[0];
$user_one_sepa = explode(" ", $user_one);
// echo $user_one_sepa[0];
$fname = $user_one_sepa[0];

// echo "</br>";  
// echo $user_one_sepa[1];
// echo "</br>";  
$lname = $user_one_sepa[1];
$last_portion = strstr($project_name, 'id ');
$pro_id = str_replace("id ", "", "$last_portion");
// echo $pro_id;
// echo "</br>";  

// echo $last_portion;
// echo "</br>";  

$trim_pro_name =substr($project_name, 0, strpos($project_name, "id"));
$real_pro_name =  $trim_pro_name;
// echo $trim_pro_name;
// echo "</br>";  

$check_user="select * from user WHERE first_name='$fname'AND last_name='$lname'";   
      
$run=mysqli_query($dbC,$check_user);   
if($run){
      $row = mysqli_fetch_assoc($run);

      $userid = $row['user_id'];
      $user_type = $row['user_type'];
      // $user_photo = $row['user_id'];
      $check_partner="select * from relatioship_partners WHERE project_id='$pro_id' AND user_id='$userid'";   
      
$run_partner=mysqli_query($dbC,$check_partner);  
$exists = mysqli_num_rows($run_partner); 
if($exists=0){
     
            
            $sql1 = "INSERT INTO relatioship_partners (name,project_id,date,user_id,user_type,add_by)
            VALUES ('$icon','$pro_id','$date','$userid','$user_type','$current_user_id')";
            if(mysqli_query($dbC,$sql1)){
                 
                if($current_user_type === 'non_individual')
                {
                    echo "<script>window.open('non_individual_profile.php','_self')</script>";   

                }else{
                    echo "<script>window.open('individual_profile.php','_self')</script>";   

                }
                 
                  
                 
            
            }else{ echo "ERROR: Could not able to execute $sql1. " . mysqli_error($dbC);}
        }
        // }
        else{echo'<span style="text-align:center;color:red;"><h4>Partner Already Exists on the same project</h4></span>';}
     
}else{
      echo "ERROR: Could not able to execute $check_user. " . mysqli_error($dbC);

}

        
}

 }
 ?>