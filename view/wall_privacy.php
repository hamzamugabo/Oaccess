
<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();//session starts here   
// echo $_SESSION['email']
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.open('login.php','_self')</script>";  
    
}
$user_id = $_SESSION['user_id']
?>
<html>   
<head lang="en">   
    <meta charset="UTF-8">   
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../css\layout.css"> 


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Privacy</title>   
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
                <h4>Select users you dont want to view the above post</h4>

                <form   method="POST" action="wall_privacy_backend.php">
                <!-- <div class="form-group row"> -->
<div class="form-check">
<div style="width: 100%; height: 500px; overflow-y: scroll;">
<input type="text" name="wall_id" value="<?php 
if($_POST['wall_id'])
echo $wall_id 
?>" hidden>
<?php

// echo $user_id;
$sql="select * from connection_requests where (reciever_id='$user_id' OR sender_id='$user_id') AND status=1";
$query = mysqli_query($dbC,$sql);
$arry=[];
$arry2=[];
while($row=mysqli_fetch_array($query)){
    $reciever_id =$row['reciever_id'];
    $sender_id =$row['sender_id'];

    if($reciever_id === $user_id)
    $id1=$sender_id;
    else
    $id2=$reciever_id;

$arry[] =$id1;
$arry[] =$id2;
$arry2[]=$id2;

$json1=json_encode($arry, JSON_FORCE_OBJECT);
$json2=json_encode($arry2);
   
// }else{
//     echo "ERROR: Could not able to execute $users. " . mysqli_error($dbC);

// }
}

$data=$json1;
$array = json_decode( $data, TRUE );
$new_array=array_unique($array);
foreach($new_array as $val){
    $users = "select * from user where user_id='$val'";
    $query_users = mysqli_query($dbC,$users);
    if($query_users){
    while($row_users=mysqli_fetch_array($query_users)){
        $fnm =$row_users['first_name'];
        $lnm =$row_users['last_name'];
        $id =$row_users['user_id'];
    echo ' <input class="form-check-input" type="checkbox" name="users[]" value="'.$id.'"id="flexCheckDefault">
    &nbsp&nbsp&nbsp&nbsp
    <label class="form-check-label" for="flexCheckDefault">
    '.$fnm.' '.$lnm.'
    </label><br>';
    }
}else{
    echo "ERROR: Could not able to execute $users. " . mysqli_error($dbC);  
}

    // echo $val;
    // echo '<br>';
}
// echo $array[0];
// echo '<br>';
// echo $json2;

  ?>
<button type="submit" class="btn btn-primary">submit</button>

</div>
</div>
                <!-- </div> -->
</form>

                </div>
            </div>
        </div>
    </div>
</div>
   
</body>   
   
</html>   
