
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

    <title>Documents</title>   
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
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Documents</div>

                <div class="card-body">
                    
                   <?php
                   
                   $doc ="select * from documents where reciever_id='$user_id'";
                   $query=mysqli_query($dbC,$doc);
                   if(mysqli_num_rows($query)!=0){
                   while($results=mysqli_fetch_array($query)){
                       $doc_id = $results['document_id'];
                       $document =$results['document'];
                       echo'
                      <a href="../images/docs/'.$document.'">'.$document.'</a><br>
                      
                    <br>
                       ';
                   }
                }else{
                    echo'No shared document with you
                    <br>
                    <br>
                    <a href="doc_share.php">Share Document</a>
                    
                    <br>
                    ';

                }
                   ?>
    
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
 