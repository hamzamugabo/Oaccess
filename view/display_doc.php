<?php 
include_once('../config/config.php');
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
$current_user_id = $_SESSION['user_id'];
$current_user_type = $_SESSION['user_type'];
if($_GET['link']){
    $doc_id = $_GET['link'];
$doc ="select * from documents where document_id='$doc_id'";
$query=mysqli_query($dbC,$doc);
$results=mysqli_fetch_assoc($query);
    $sender_id = $results['sender_id'];
    $document ="../images/docs/".$results['document'];
    
    header("content-type: applicaction/pdf");
    header("content-Length: ". filesize($document));
    readfile($document);

}else{
    echo "<script>window.history.go(-1)</script>";  
}


?>