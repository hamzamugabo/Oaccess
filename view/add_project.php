
<?php 
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

    <title>Add Project</title>   
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
                <div class="card-header">Add Project</div>

                <div class="card-body">
                    <form method="POST" action="add_project_backend.php" enctype="multipart/form-data">
                  
                        
                       
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Project Name</label>

                            <div class="col-md-3  reveal-if-active"" >
                                <input  type="text" class="form-control" name="project_name" required autocomplete="project_name" autofocus>

                             
                                  
                            </div>
                            <label for="timeline" class="col-md-3 col-form-label text-md-right">project Timeline</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="timeline" required autocomplete="timeline" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="purpose" class="col-md-3 col-form-label text-md-right">Project Purpose</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="purpose" required autocomplete="purpose" autofocus>

                             
                                  
                            </div>
                            <label for="status" class="col-md-3 col-form-label text-md-right">Status</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="status" required autocomplete="status" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="award" class="col-md-3 col-form-label text-md-right">Project Award</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="award"  autocomplete="award" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Project award photo</label>

                            <div class="col-md-3">
                                <input  type="file" class="form-control" name="award" >

                             
                                  
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                           
                            <label for="email" class="col-md-3 col-form-label text-md-right">Project photos</label>

                            <div class="col-md-3">
                                <input  type="file" class="form-control" name="files[]" multiple >

                             
                                  
                            </div>
                        </div> -->

                         Team Members:
                        <div class="form-group row">
                            <label for="member_name" class="col-md-3 col-form-label text-md-right">Member name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="member1" required autocomplete="member1" autofocus>

                             
                                  
                            </div>
                            <label for="title" class="col-md-3 col-form-label text-md-right">title</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="title1" required autocomplete="title1" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="memeber2" class="col-md-3 col-form-label text-md-right">Member name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="member2" required autocomplete="member2" autofocus>

                             
                                  
                            </div>
                            <label for="title" class="col-md-3 col-form-label text-md-right">title</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="title2" required autocomplete="title2" autofocus>
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="memeber3" class="col-md-3 col-form-label text-md-right">Member name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="member3" required autocomplete="member3" autofocus>

                             
                                  
                            </div>
                            <label for="title" class="col-md-3 col-form-label text-md-right">title</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="title3" required autocomplete="title3" autofocus>
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="memeber" class="col-md-3 col-form-label text-md-right">Member name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="member4" required autocomplete="member4" autofocus>

                             
                                  
                            </div>
                            <label for="title" class="col-md-3 col-form-label text-md-right">title</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="title4" required autocomplete="title4" autofocus>
                            </div>  
                        </div>


                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Add
                                </button>
                                
                                  <a href="non_individual_profile.php">back to profile</a>
                              
                               
                                  
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
 
 <script>
$(document).on('click','.test',function(event){
	var selectedOption = $(this).val()
  console.log(selectedOption)
});
 </script>