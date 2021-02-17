<?php
session_start();//session starts here   
   
include("../config/config.php");//make connection here   
$user_id=$_SESSION['user_id'];

 if(isset(
     $_POST['pobox'],$_POST['district'],$_POST['place'],$_POST['plot'],$_POST['street'],$_POST['building'],
     $_POST['city'],$_POST['state'],$_POST['postal_code'],$_POST['tel'],$_POST['fax'],$_POST['mobile'],
     $_POST['email'],$_POST['postal_address'],$_POST['physical_address']
     
     )
 
 ){
   $pobox= $_POST['pobox'];
   $district=$_POST['district'];
   $place=$_POST['place'];
   $plot=$_POST['plot'];
   $street=$_POST['street'];
   $building=$_POST['building'];
    $city =$_POST['city'];
    $state=$_POST['state'];
    $code =$_POST['postal_code'];
    $tel=$_POST['tel'];
    $fax=$_POST['fax'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $postal_address=$_POST['postal_address'];
    $physical_address=$_POST['physical_address'];
    $goods= $_POST['goods'];
    $web= $_POST['web'];

            
            $sql1 = "INSERT INTO contact_us (p_o_box,district_city,place_of_business,business_plot_number,business_street_name,business_building_name,city,state_province,zip_postal_code,tel,fax,mobile,email_address,
            website,postal_address,physical_address,goods_services,user_id)
            VALUES ('$pobox','$district','$place','$plot','$street','$building','$city','$state','$code'
            ,'$tel','$fax','$mobile','$email','$web','$postal_address','$physical_address','$goods','$user_id')";
            if(mysqli_query($dbC,$sql1)){
                 
                 
                      echo "<script>window.open('contact_us.php','_self')</script>";   
                  
                 
            
            }else{ echo "ERROR: Could not able to execute $sql1. " . mysqli_error($dbC);}
}

 

 
 ?>