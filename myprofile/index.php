<?php
    include "../php/connect.php";

    session_start();
    
    if(!isset($_SESSION['login_speedster'])){
        header('location:/speedforce');
    }
    $username = $_SESSION['login_speedster'];
    $query = "SELECT * FROM tblaccount WHERE username = '".$username."'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
?>
<?php include "follow.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['login_speedster']?> &bull; SpeedForce</title>
    <link rel="stylesheet" href="/speedforce/css/bootstrap.css">
    <link rel="stylesheet" href="/speedforce/css/navbarstyle.css">
    <link rel="stylesheet" href="/speedforce/css/index.css">
</head>
<body>
    <?php include "../app/navbar.php"; date_default_timezone_set("Asia/Manila");?>
    <div class="container">
        <div class="row" id="top">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <?php include "changepropic.php";?>
                        <h3><?php echo $row['firstname']." ".$row['lastname'];?></h3>
                        <p>(<?php echo $_SESSION['login_speedster'];?>)</p>
                    </div>
                    <div class="panel-body">
                        <div class="row text-center">
                            <div class="col-sm-4">
                                <strong><a href="#" data-toggle="modal" data-target="#following" class="promenu"><?php include "fame.php";echo $no_following['no_following'];?> Following</a></strong>
                            </div>
                            <div class="col-sm-4">
                                <strong><a href="#posts" id="gotopost" class="promenu"><?php include "fame.php";echo $no_post['no_post'];?> Posts</a></strong>
                            </div>
                            <div class="col-sm-4">
                                <strong><a href="#" data-toggle="modal" data-target="#follower" class="promenu"><?php include "fame.php";echo $no_follower['no_follower'];?> Followers</a></strong>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-sm-6"><strong><a href="/speedforce/accountsettings" class="promenu">Account Settings</a></strong></div>
                            <div class="col-sm-6"><strong><a href="/speedforce/php/logout.php" class="promenu">Log out</a></strong></div>
                        </div>
                    </div>
                </div><br><br>
                
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- Posts -->
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="panel panel-default" id="posts">
                    <div class="panel-heading text-center"><h3>Posts</h3></div>
                    <div class="panel-body">
                        <?php include "posts.php";?>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>
<footer class="text-right" style="padding-right:16px;"><strong>&copy; <?php echo date('Y');?> SpeedForce | made by Team Flash <span class="glyphicon glyphicon-flash"></span></strong></footer>

<script src="/speedforce/js/jquery-3.2.1.min.js"></script>
<script src="/speedforce/js/bootstrap.js"></script>
<script src="/speedforce/js/index.js"></script>
<script>
  // Smooth scroll by W3SCHOOLS
  // For smooth scroll on myprofile_post
  $(document).ready(function(){
    // Add smooth scrolling to all links
    $("#gotopost").on('click', function(event) {
  
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
  
        // Store hash
        var hash = this.hash;
  
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });
</script>
</html>