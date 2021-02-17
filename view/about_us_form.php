
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

    <title>About Us update</title>   
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
                <div class="card-header">About Us Form</div>

                <div class="card-body">
                    <form method="POST" action="about_us_backend.php"">
                  

                       <div class="form-group row">
                            <label for="classification" class="col-md-3 col-form-label text-md-right">classification</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control " name="classification" required autocomplete="classification" autofocus>

                             
                                  
                            </div>
                            <label for="type" class="col-md-3 col-form-label text-md-right">Type</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="type" required autocomplete="district" autofocus>

                             
                                  
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="name" required autocomplete="name" autofocus>

                             
                                  
                            </div>
                            <label for="abb_name" class="col-md-3 col-form-label text-md-right">Abbreviation Name</label>

<div class="col-md-3">
    <input id="password" type="text" class="form-control " name="abb_name" required autocomplete="abb_name">

  
        
   
</div>
                            
                        </div>

                        <!-- <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Gender:</label>

                            <input class="check-form-input" type="radio" name="gender" value="male">
                            <label for="male" class="form-check-lebel">male</label>
                            <input class="check-form-input" type="radio" name="gender" value="female">
                            <label for="male" class="form-check-lebel">female</label>


                        </div>

                        <div class="form-check">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Current Status:</label>

                            <input class="check-form-input" type="radio" name="status" value="self employed">
                            <label for="male" class="form-check-lebel">Self Employed</label>
                            <input class="check-form-input" type="radio" name="status" value="Employed">
                            <label for="male" class="form-check-lebel">Employed</label>


                        </div>   -->
                        
                       <!-- <div class="form-check"> -->
                        <!-- <label for="email" class="col-md-3 col-form-label text-md-right">Current Status:</label>

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
                            <label for="date" class="col-md-3 col-form-label text-md-right">Date Formed</label>

                            <div class="col-md-3  reveal-if-active"" >
                                <input  type="date" class="form-control" name="date" required autocomplete="date" autofocus>

                             
                                  
                            </div>
                            <label for="mission" class="col-md-3 col-form-label text-md-right">Mission</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="mission" required autocomplete="mission" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="area" class="col-md-3 col-form-label text-md-right">Area Served</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="area" required autocomplete="area" autofocus>

                             
                                  
                            </div>
                            <label for="area" class="col-md-3 col-form-label text-md-right">Area Served(Continent) </label>

<div class="col-md-3">
    <input  type="text" class="form-control" name="area_continent" required autocomplete="area_continent" autofocus>

 
      
</div>
                           
                            
                        </div>
                        <div class="form-group row">
                            <label for="area" class="col-md-3 col-form-label text-md-right">Area Served(Country)</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="area_country" required autocomplete="area_country" autofocus>

                             
                                  
                            </div>
                            <label for="revenue_year" class="col-md-3 col-form-label text-md-right">Revenue Year</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="revenue_year" required autocomplete="revenue_year" autofocus>

                             
                                  
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="currency" class="col-md-3 col-form-label text-md-right">Revenue Currency</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="currency" required autocomplete="currency" autofocus>

                             
                                  
                            </div>
                            <label for="rev_amount" class="col-md-3 col-form-label text-md-right">Revenue Amount</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="rev_amount" required autocomplete="rev_amount" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <label for="key_name" class="col-md-3 col-form-label text-md-right">Key Person Name</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="key_name" required autocomplete="key_name" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="key_title" class="col-md-3 col-form-label text-md-right">Key Person Title</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="key_title" required autocomplete="key_title" autofocus>

                             
                                  
                            </div>
                            <label for="key_contact" class="col-md-3 col-form-label text-md-right">Key Person Official Contact</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="key_contact" required autocomplete="key_contact" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-3 col-form-label text-md-right">Number of Locations 
                            served</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="location" required autocomplete="location" autofocus>

                             
                                  
                            </div>
                            <label for="head" class="col-md-3 col-form-label text-md-right">HeadQuarters</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="head" required autocomplete="head" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            
                           
                        </div>



                        <div class="form-group row mb-0">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>

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