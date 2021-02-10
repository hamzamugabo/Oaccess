
<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 

    <title>Comment</title>   
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
                <div class="card-header">
                comment
                <div class="row">
                <?php
                include("../config/config.php");   

                if($_POST['wall_id']){
                    $_SESSION['wall_id'] = $_POST['wall_id'];
                    // echo $_GET['link'];
                    $wall_id =$_POST['wall_id'];
                    $all="select * from wall WHERE wall_id='$wall_id' ";   
                    $all_result = mysqli_query($dbC,$all);
                    $all_row_ = mysqli_fetch_array($all_result);
                    $photo_name = $all_row_['photo'];
                    $news_photo = "../images/wall/".$all_row_['photo'];
                    $date = $all_row_['date'];
                    $message = $all_row_['message'];

                    echo '
                        <div class="row" style="margin-top:10px;">
                        <div class="col-2">';
                        if($photo_name !=''){
                            echo'        
                        <img src='.$news_photo.' width=80 height=80>';
                        }else{
                            // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
                            echo'     ';
                        }
                        echo'
                                    </div>
                                    <div class="col-8"><p>'.$message.'.</p>
                                <strong> posted at</strong>  '.$date.' &nbsp&nbsp&nbsp
                                
                            </div>
                            
                            </div>
                            <hr/>
                        ';

                    
                }else{
                    //  = $_POST['wall_id'];
                    // echo $_GET['link'];
                    $wall_id =$_SESSION['wall_id'];
                    $all="select * from wall WHERE wall_id='$wall_id' ";   
                    $all_result = mysqli_query($dbC,$all);
                    $all_row_ = mysqli_fetch_array($all_result);
                    $photo_name = $all_row_['photo'];
                    $news_photo = "../images/wall/".$all_row_['photo'];
                    $date = $all_row_['date'];
                    $message = $all_row_['message'];

                    echo '
                        <div class="row" style="margin-top:10px;">
                        <div class="col-2">';
                        if($photo_name !=''){
                            echo'        
                        <img src='.$news_photo.' width=80 height=80>';
                        }else{
                            // echo '<a href="pass.php?link=' . $a . '>Link 1</a>';
                            echo'     ';
                        }
                        echo'
                                    </div>
                                    <div class="col-8"><p>'.$message.'.</p>
                                <strong> </strong>  '.$date.' &nbsp&nbsp&nbsp
                                
                            </div>
                            
                            </div>
                            <hr/>
                        ';

                }

                ?>
                </div>
                </div>

                <div class="card-body">
                <?php
                if($_POST['wall_id']){
                    // echo $_GET['link'];
                    $wall_id =$_POST['wall_id'];
                    $all="select * from comment WHERE wall_id='$wall_id' ";   
                    $all_result = mysqli_query($dbC,$all);
                    while( $all_row_ = mysqli_fetch_array($all_result)){
                    // $all_row_ = mysqli_fetch_array($all_result);
                    // $photo_name = $all_row_['photo'];
                    // $news_photo = "../images/wall/".$all_row_['photo'];
                    $date = $all_row_['date'];
                    $message = $all_row_['comment'];

                    echo '
                        <div class="row" style="margin-top:10px;">
                        <div class="col-2">';
                        
                        echo'
                                    </div>
                                    <div class="col-8"><p>'.$message.'.</p>
                                <strong> posted at</strong>  '.$date.' &nbsp&nbsp&nbsp
                                
                            </div>
                            
                            </div>
                            <hr/>
                        ';

                    
                }
            }else
            {

                $wall_id =$_SESSION['wall_id'];
                $all="select * from comment WHERE wall_id='$wall_id' ";   
                $all_result = mysqli_query($dbC,$all);
                while( $all_row_ = mysqli_fetch_array($all_result)){
                // $all_row_ = mysqli_fetch_array($all_result);
                // $photo_name = $all_row_['photo'];
                // $news_photo = "../images/wall/".$all_row_['photo'];
                $date = $all_row_['date'];
                $message = $all_row_['comment'];

                echo '
                    <div class="row" style="margin-top:10px;">
                    <div class="col-2">';
                    
                    echo'
                                </div>
                                <div class="col-8"><p>'.$message.'.</p>
                            <strong> posted at</strong>  '.$date.' &nbsp&nbsp&nbsp
                            
                        </div>
                        
                        </div>
                        <hr/>
                    ';
                }
            }
                ?>

                <div style="bottom: 0px;">


                    <form method="POST" action="comment_backend.php" >
                  
                        
                       
                        <div class="form-group row">
                        <label for="exampleFormControlTextarea1">Write Comment</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" required> </textarea>
                            
                        </div>
                       

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Comment
                                </button>
                                <?php

                                $user_type = $_SESSION['user_type'];

                                    if($user_type === 'individual')
                                    echo ' <a href="individual_profile.php">back to profile</a>';
                                    else  
                                    echo ' <a href="non_individual_profile.php">back to profile</a>';
                                ?>
                                 
                              
                               
                                  
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
