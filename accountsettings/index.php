<?php
  session_start();

    if(!isset($_SESSION['login_speedster'])){
      mysqli_close($con);
      header("location:/speedforce");
  }
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title><?php echo $_SESSION['login_speedster'];?> - Account Settings | SpeedForce</title>
  
  <link rel="stylesheet" href="/speedforce/css/bootstrap.css">
  <link rel="stylesheet" href="/speedforce/css/accountsettings.css">
  <link rel="stylesheet" href="/speedforce/css/index.css">
  
</head>

<body>  
<?php include "../app/navbar.php";?>

<div class="container" id="top">
<div class="row"><div class="col-md-12">
<div class="form">
  <h1>Account Settings</h1>
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Profile</a></li>
        <li class="tab"><a href="#login">Password</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   

          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
             Home Address<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/>
          </div>

          <div class="field">
            <div class="radio">
              <input class="radio-inline" type="radio" name="gender">
            </div>
            <div class="radio">
              <input class="radio-inline" type="radio" name="gender">
            </div>
            <!-- <input type="text"required autocomplete="off"/> -->
          </div>
          
          <button  type="submit" class="button button-block"/>Save Changes</button>
          
          </form>

        </div>
        
        <div id="login">   
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Current Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              New Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <button class="button button-block"/>Save Changes</button>
          
</form>
        </div>
        
      </div><!-- tab-content -->
      </div> <!-- col-md-12  -->
</div> <!-- /form -->
</div>
</div>
<script src="/speedforce/js/jquery-3.2.1.min.js"></script>
<script src="/speedforce/js/bootstrap.js"></script>
<script  src="/speedforce/js/index.js"></script>

</body>
</html>
