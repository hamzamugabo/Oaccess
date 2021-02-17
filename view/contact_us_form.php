
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

    <title>Contact update</title>   
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
                <div class="card-header">Contact Us Form</div>

                <div class="card-body">
                    <form method="POST" action="contact_us_backend.php"">
                  

                       <div class="form-group row">
                            <label for="pobox" class="col-md-3 col-form-label text-md-right">P O BOX</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control " name="pobox" required autocomplete="pobox" autofocus>

                             
                                  
                            </div>
                            <label for="district" class="col-md-3 col-form-label text-md-right">District</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="district" required autocomplete="district" autofocus>

                             
                                  
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-3 col-form-label text-md-right">Place of Business</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="place" required autocomplete="place" autofocus>

                             
                                  
                            </div>
                            <label for="plot" class="col-md-3 col-form-label text-md-right">Plot Number</label>

<div class="col-md-3">
    <input id="password" type="text" class="form-control " name="plot" required autocomplete="plot">

  
        
   
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
                            <label for="street" class="col-md-3 col-form-label text-md-right">Street Name</label>

                            <div class="col-md-3  reveal-if-active"" >
                                <input  type="text" class="form-control" name="street" required autocomplete="street" autofocus>

                             
                                  
                            </div>
                            <label for="building" class="col-md-3 col-form-label text-md-right">Building Name</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="building" required autocomplete="building" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-3 col-form-label text-md-right">City</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="city" required autocomplete="city" autofocus>

                             
                                  
                            </div>
                            <label for="state" class="col-md-3 col-form-label text-md-right">State Province</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="state" required autocomplete="state" autofocus>

                             
                                  
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="postal_code" class="col-md-3 col-form-label text-md-right">Zip Postal Code</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="postal_code" required autocomplete="postal_code" autofocus>

                             
                                  
                            </div>
                            <label for="tel" class="col-md-3 col-form-label text-md-right">Tell</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="tel" required autocomplete="tel" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax" class="col-md-3 col-form-label text-md-right">Fax</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="fax" required autocomplete="fax" autofocus>

                             
                                  
                            </div>
                            <label for="mobile" class="col-md-3 col-form-label text-md-right">Mobile</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="mobile" required autocomplete="mobile" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-3">
                                <input  type="email" class="form-control" name="email" required autocomplete="email" autofocus>

                             
                                  
                            </div>
                            <label for="web" class="col-md-3 col-form-label text-md-right">Website</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="web" required autocomplete="web" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_address" class="col-md-3 col-form-label text-md-right">Postal Address</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="postal_address" required autocomplete="postal_address" autofocus>

                             
                                  
                            </div>
                            <label for="physical_address" class="col-md-3 col-form-label text-md-right">Physical Address</label>

                            <div class="col-md-3">
                            <input  type="text" class="form-control" name="physical_address" required autocomplete="physical_address" autofocus>


                             
                                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goods" class="col-md-3 col-form-label text-md-right">Gooods/Services</label>

                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="goods" required autocomplete="goods" autofocus>

                             
                                  
                            </div>
                           
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