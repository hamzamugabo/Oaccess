<?php
   
  $dbC = mysqli_connect("localhost", "root", "", "business_access");
 
// Check connection
if($dbC === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>