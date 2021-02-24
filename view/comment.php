
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


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    $iids = $all_row_['user_id'];
                    $comment_id = $all_row_['comment_id'];

                    $user_bio = "select first_name,last_name from user WHERE user_id='$iids' ";
                    $all_result_user_bio = mysqli_query($dbC,$user_bio);
                    $all_row_user_bio = mysqli_fetch_array($all_result_user_bio);

                    $user_fname =  $all_row_user_bio['first_name'];
                    $user_lname =  $all_row_user_bio['last_name'];

                    $count_comments = "SELECT comment_id FROM comment_comment WHERE comment_id = $comment_id"; 
      
                    // Execute the query and store the result set 
                    $count_result = mysqli_query($dbC, $count_comments); 
                      
                     
                        $row_count = mysqli_num_rows($count_result); 

                    echo '
                        <div class="row" style="margin-top:10px;">
                        <div class="col-2"> '.$user_fname.'  '.$user_lname.'
                        
                        
                        ';
                        
                        echo'
                                    </div>
                                    <div class="col-8"><p>'.$message.'.</p>
                                <strong> commented at</strong>  '.$date.' &nbsp&nbsp&nbsp
                                <br>
                               
                                <form  method="POST" action="comment_comment.php" style="float:left;">
<input type="text" name="comment_id" value="'.$comment_id.'" hidden>
<button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>
          </form>
          <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-link" style="float:left;"><span style="color:blue;">'.$row_count.'</span></button>
          
          <br>

                                
                            </div>
                            
                            </div>
                            <hr/>
                        ';

                    
                }
            $fnames = [];
            $lnames = [];

   
                // $commented_users="select user_id from comment WHERE wall_id='$wall_id'";   
                // // if(
                //     $commented_users_result = mysqli_query($dbC,$commented_users) ;
                // // ){
                
                //     while($commented_users_row_ = mysqli_fetch_array($commented_users_result)){
                //         $commented_users_ids = $commented_users_row_['user_id'];
                //         // $ids = json_encode($commented_users_ids);
                //     // echo $ids;
                //     // echo  ;
                
                // $commented_user_names="select first_name,last_name from user WHERE user_id='$commented_users_ids'";   
                // if($commented_users_names_result = mysqli_query($dbC,$commented_user_names)){
                
                //     while($commented_users_names_row_ = mysqli_fetch_array($commented_users_names_result)){
                //         $commented_users_fname = $commented_users_names_row_['first_name'];
                //         $commented_users_lname = $commented_users_names_row_['last_name'];
                
                //         $fnames[]= $commented_users_fname;
                //         $lnames[]= $commented_users_lname;

                //         $json_fname = json_encode($fnames);
                //         $json_lname = json_encode($lnames);


               
                
                // // echo'
               
                // //         <div>
                // //           <p>'.$commented_users_fname.' '.$commented_users_lname.', commented on the post</p>
                // //         </div>
                       
                // // ';
                
                //     }
                // }else{
                //     echo "ERROR: Could not able to execute $commented_user_names. " . mysqli_error($dbC);
                 
                //  }
                // //  echo $json_lname;
                // }
                // $dd = $json_fname;
                // $rmv1 = str_replace("[", "", $dd );
                // $rmv2= str_replace("]", "", $rmv1 );
                // $rmv3= str_replace('"', "", $rmv2 );

                // // echo $rmv3;
                // $fruits_ar = explode(', ', $rmv3);
                // $result = array_unique($fruits_ar);

                // foreach ($result as $value) {
                //     $commented =$value;
                // }
                // // echo $fruits_ar;

                // echo $commented. ' commented';

                


            }
           
            else
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
                $iids = $all_row_['user_id'];
                $comment_id = $all_row_['comment_id'];

                $user_bio = "select first_name,last_name from user WHERE user_id='$iids' ";
                $all_result_user_bio = mysqli_query($dbC,$user_bio);
                $all_row_user_bio = mysqli_fetch_array($all_result_user_bio);

                $user_fname =  $all_row_user_bio['first_name'];
                $user_lname =  $all_row_user_bio['last_name'];



                echo '
                    <div class="row" style="margin-top:10px;">
                    <div class="col-2"> '.$user_fname.'  '.$user_lname.'
                    
                    
                    ';
                    
                    echo'
                                </div>
                                <div class="col-8"><p>'.$message.'.</p>
                            <strong> posted at</strong>  '.$date.' &nbsp&nbsp&nbsp
                            
                            <form  method="POST" action="comment_comment.php" style="float:left;">
<input type="text" name="comment_id" value="'.$comment_id.'" hidden>
<button type="submit" class="btn btn-link"><span style="color:blue;">Comment</span></button>

          </form>
          
                            
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
                                </button>&nbsp&nbsp&nbsp
                                <?php

                                $user_type = $_SESSION['user_type'];

                                    if($user_type === 'individual'){

                                        echo ' <a href="individual_profile.php">profile</a>';
                                        echo '&nbsp&nbsp&nbsp';
                                        echo ' <a href="../index.php">Home</a>';
                                    }
                                    else  {
                                        echo ' <a href="non_individual_profile.php">profile</a>';
                                        echo '&nbsp&nbsp&nbsp';

                                        echo ' <a href="../index.php">Home</a>';

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
</div>
   
</body>   
   
</html>   
