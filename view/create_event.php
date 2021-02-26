
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

    <title>Create Event</title>   
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
                <div class="card-header"><h4>Event Details</h4></div>

                <div class="card-body">
                    <form method="POST" action="create_event_back_end.php" enctype="multipart/form-data">
                  

                      
                        
                        
                       
                        <div class="form-group row">
                            <label for="event" class="col-md-3 col-form-label text-md-right">Event Name</label>

                            <div class="col-md-3  reveal-if-active"" >
                                <input  type="text" class="form-control" name="event" required autocomplete="event" autofocus>

                             
                                  
                            </div>
                          
                            
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Start Date and Time</label>

                            <div class="col-md-3">
                                <input  type="date" class="form-control" name="start_date" required autocomplete="start_date" autofocus>

                             
                                  
                            </div>
                            
                            <div class="col-md-3">
                                <input placeholder="start time" type="time" class="form-control" name="start_time" required autocomplete="start_time" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-md-3 col-form-label text-md-right">End Date and Time</label>

                            <div class="col-md-3">
                                <input  type="date" class="form-control" name="end_date" required autocomplete="end_date" autofocus>

                             
                                  
                            </div>
                            
                            <div class="col-md-3">
                                <input placeholder="start time" type="time" class="form-control" name="end_time" required autocomplete="end_time" autofocus>

                             
                                  
                            </div>
                            
                        </div>

                        <div class="form-group row">
                        <label for="privacy" class="col-md-3 col-form-label text-md-right">Privacy</label>

                        <div class="form-check">
                        
                    

                        </div> 
                            
                            <div class="col-md-3">
                            <input class="check-form-input" type="radio" name="privacy" value="public"id="choice-animals-dogs"data-require-pair="#choice-animals-dogs">
                            <label for="male" class="form-check-lebel">Public</label>
                            <input class="check-form-input" type="radio" name="privacy" value="private" id="choice-animals-dogs"data-require-pair="#choice-animals-cats">
                            <label for="male" class="form-check-lebel">Private</label>

                             
                                  
                            </div>
                            
                        </div>


                        <div class="form-group row">
                            <label for="location" class="col-md-3 col-form-label text-md-right">Location</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="location" required autocomplete="location" autofocus>

                             
                                  
                            </div>
                          
                        </div>



                        <div class="form-group row">
                           

                            <label for="email" class="col-md-3 col-form-label text-md-right"> Photo</label>

                            <div class="col-md-3">
                                <input  type="file" class="form-control" name="photo" >

                             
                                  
                            </div>
                           
                            
                        </div>

                        <div class="form-group row">
                        <label for="des" class="col-md-3 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                            <textarea class="form-control" name="description" required rows="3" cols="6"></textarea>
                                <!-- <input  type="text" class="form-control" name="location" required autocomplete="location" autofocus> -->

                            
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Add Event
                                </button>

                               
                                    <!-- <a class="btn btn-link" href="{{ route('password.request">
                                       Forgot Your Password?
                                    </a> -->
                                <!-- @endif -->
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary" >
                                 <a href="events.php" style="color:white;">  Events</a>
                                </button>
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