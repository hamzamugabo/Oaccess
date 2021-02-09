
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
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">   
    <link type="text/css" rel="stylesheet" href="../../css\layout.css"> 

    <title>Non individual Registration</title>   
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
                     <div class="col-md-3 logo"><img src="../../images/official-access-logo.png"/></div>
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
                <div class="card-header">Non Individual profile Registration</div>

                <div class="card-body">
                    <form method="POST" action="non_individual_register_backend.php" enctype="multipart/form-data">
                  

                        <!-- <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">First Name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control " name="fname" required autocomplete="fname" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="lname" required autocomplete="lname" autofocus>

                             
                                  
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-3">
                                <input  type="email" class="form-control" name="email" required autocomplete="email" autofocus>

                             
                                  
                            </div>
                            <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

<div class="col-md-3">
    <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">

  
        
   
</div>
                            
                        </div>

                        <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Gender:</label>

                            <input class="check-form-input" type="radio" name="gender" value="male">
                            <label for="male" class="form-check-lebel">male</label>
                            <input class="check-form-input" type="radio" name="gender" value="female">
                            <label for="male" class="form-check-lebel">female</label>


                        </div>-->
<!-- 
                        <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Current Status:</label>

                            <input class="check-form-input" type="radio" name="status" value="self employed">
                            <label for="male" class="form-check-lebel">Self Employed</label>
                            <input class="check-form-input" type="radio" name="status" value="Employed">
                            <label for="male" class="form-check-lebel">Employed</label>


                        </div>  -->
                        <!-- <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Current Employment:</label>
                            <div class="col-md-3">
                            <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                            </div>

                            
                            <label for="email" class="col-md-3 col-form-label text-md-right">Past Employment:</label>
                            <div class="col-md-3">
                            <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                            </div>
                           
                            
                        </div> -->
                        
                        <!-- <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Current Status:</label>

                            <input class="check-form-input" type="radio" name="status" value="self employed">
                            <label for="male" class="form-check-lebel">Self Employed</label>
                            <input class="check-form-input" type="radio" name="status" value="Employed">
                            <label for="male" class="form-check-lebel">Employed</label>


                        </div>  -->
                        <!-- <div class="form-group row">
                        <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Current Status:</label>

                            <input class="check-form-input" type="radio" name="status" value="self employed"id="choice-animals-dogs"data-require-pair="#choice-animals-dogs">
                            <label for="male" class="form-check-lebel">Self Employed</label>
                            <input class="check-form-input" type="radio" name="status" value="Employed" id="choice-animals-dogs"data-require-pair="#choice-animals-cats">
                            <label for="male" class="form-check-lebel">Employed</label>


                        </div> 
                            <label for="email" class="col-md-3 col-form-label text-md-right">Past Job Postion</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="past_position" required autocomplete="email" autofocus>

                             
                                  
                            </div>
                            
                        </div> -->
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Company/Organistaion</label>

                            <div class="col-md-3  reveal-if-active"" >
                                <input  type="text" class="form-control" name="name" required autocomplete="name" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Location</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="location" required autocomplete="location" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">License Number</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="license" required autocomplete="license" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">TIN</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="tin" required autocomplete="tin" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="mission" class="col-md-3 col-form-label text-md-right">Mission</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="mission" required autocomplete="mission" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">logo</label>

                            <div class="col-md-3">
                                <input  type="file" class="form-control" name="logo" >

                             
                                  
                            </div>
                        </div>


                        <!-- <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Education</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="education" required autocomplete="email" autofocus>

                             
                                  
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">Marital Status</label>

                            <div class="col-md-3">
                            <select class="form-select" aria-label="Default select example" name="marital_status">
                            <option selected>Marital Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="devorced">Devorced</option>
                            </select>

                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Specialities</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="specialisties" required autocomplete="email" autofocus>

                             
                                  
                            </div>

                            <label for="email" class="col-md-3 col-form-label text-md-right">Profile Photo</label>

                            <div class="col-md-3">
                                <input  type="file" class="form-control" name="photo" >

                             
                                  
                            </div>
                           
                            
                        </div> -->

                        <!-- <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                       Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>

                               
                                    <!-- <a class="btn btn-link" href="{{ route('password.request">
                                       Forgot Your Password?
                                    </a> -->
                                <!-- @endif -->
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