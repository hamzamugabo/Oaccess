<?php
session_start();//session starts here   
   
include("../config/config.php");//make connection here   
$user_id=$_SESSION['user_id'];

 if(isset(
     $_POST['classification'],$_POST['type'],$_POST['name'],$_POST['abb_name'],$_POST['date'],$_POST['mission'],
     $_POST['area'],$_POST['area_continent'],$_POST['area_country'],$_POST['revenue_year'],$_POST['currency'],
     $_POST['rev_amount'],$_POST['key_name'],$_POST['key_title'],$_POST['key_contact'],$_POST['location']
     ,$_POST['head']
     )
 
 ){
   $class= $_POST['classification'];
   $type=$_POST['type'];
   $name=$_POST['name'];
   $abb_name=$_POST['abb_name'];
   $date=$_POST['date'];
   $mission=$_POST['mission'];
    $area =$_POST['area'];
    $area_continent=$_POST['area_continent'];
    $area_country =$_POST['area_country'];
    $revenue_year=$_POST['revenue_year'];
    $currency=$_POST['currency'];
    $rev_amount=$_POST['rev_amount'];
    $key_name=$_POST['key_name'];
    $key_title=$_POST['key_title'];
    $key_contact= $_POST['key_contact'];
    $location= $_POST['location'];
    $head= $_POST['head'];

            
            $sql1 = "INSERT INTO about_us (classification,type,name,abbrevation_name,date,statement_of_business_mission,
            area_served,area_served_continent,area_served_country,revenue_year,revenue_currency,revenue_amount,key_people_name,
            key_people_title,
            key_people_official_contact,headquarters,user_id,number_of_locations)
            VALUES ('$class','$type','$name','$abb_name','$date','$mission','$area','$area_continent','$area_country'
            ,'$revenue_year','$currency','$rev_amount','$key_name','$key_title','$key_contact','$head','$user_id','$location')";
            if(mysqli_query($dbC,$sql1)){
                 
                 
                      echo "<script>window.open('about_us.php','_self')</script>";   
                  
                 
            
            }else{ echo "ERROR: Could not able to execute $sql1. " . mysqli_error($dbC);}
}

 

 
 ?>