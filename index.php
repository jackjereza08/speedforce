<?php
  include "php/login.php";

  if(isset($_SESSION['login_speedster'])){
    header("location:/speedforce/timeline");
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SpeedForce | Be a Speedster!</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">

  
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <h1 class="visible-xs">SpeedForce</h1>
    </div>
    <div class="col-sm-6">
      <div class="form">
        
        <ul class="tab-group">
        <div id="error"><?php echo $error;?></div>
          <li class="tab active"><a href="#signup">Sign Up</a></li>
          <li class="tab"><a href="#login">Log In</a></li>
        </ul>
        
        <div class="tab-content">
         <!--start of sign-up-->
          <div id="signup">   
            <h1>Sign Up for Free</h1>
            <form action="" method="post">
            <div class="field-wrap">
                <label>
                  Username<span class="req">*</span>
                </label>
                <input type="text" id="uname" name="username" required autocomplete="off" />
            </div>

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  First Name<span class="req">*</span>
                </label>
                <input type="text" id="fname" name="firstname" required autocomplete="off" />
              </div>
          
              <div class="field-wrap">
                <label>
                  Last Name<span class="req">*</span>
                </label>
                <input type="text" id="lname" name="lastname" required autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" id="email" name="email " required autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
              <label>
                Set A Password<span class="req">*</span>
              </label>
              <input type="password" id="pwd" name="password" required autocomplete="off"/>
            </div>
             <span id="msg"></span>
             
            <input type="button" onclick="signup()" name="submit" class="button button-block" value="Get Started">
            
            </form>
            <footer><strong>&copy; <?php echo date('Y');?> SpeedForce | made by Team Flash <span class="glyphicon glyphicon-flash"></span></strong></footer>
          </div>
          <!-- Login Section -->
          <div id="login">   
            <h1>Welcome Speedster!</h1>
            <form action="" method="post">
              <div class="field-wrap">
              <label>
                Username<span class="req">*</span>
              </label>
              <input type="text" id="uname" name="username" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" id="pword" name="password" required autocomplete="off"/>
            </div>
            <p class="forgot"><a href="#">Forgot Password?</a></p>
            <input type="submit" name="login" class="button button-block" value="Log In">
            </form>
            <footer><strong>&copy; <?php echo date('Y');?> SpeedForce | made by Team Flash <span class="glyphicon glyphicon-flash"></span></strong></footer>
          </div>
          <!-- End of login section -->
        </div><!-- tab-content -->
        
    </div> <!-- /form -->
    
  </div>
  </div>
  </div>  <!-- /div.container -->
  
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript"  src="js/index.js"></script>

</body>

</html>
