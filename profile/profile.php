<?php
    include "../php/connect.php";
    
    session_start();
    // if(isset($_GET['id'])){
        $sp_id = $_GET['id'];
        
        $query = "SELECT * FROM tblaccount WHERE userid =".$sp_id;
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);
        $proname = $row['username'];
    // }
    
?>
<?php include "follow.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $proname;?> &bull; SpeedForce</title>
    <link rel="stylesheet" href="/speedforce/css/bootstrap.css">
    <link rel="stylesheet" href="/speedforce/css/navbarstyle.css">
    <link rel="stylesheet" href="/speedforce/css/index.css">
</head>
<body>
    <?php include "../app/navbar.php"; date_default_timezone_set("Asia/Manila");?>
    <?php
    include "../php/connect.php";
        $sp_id = $_GET['id'];
        
        $query = "SELECT * FROM tblaccount WHERE userid =".$sp_id;
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <div class="row" id="top">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <center>
                        <div class="panel-heading">
                            <?php
                                if($row['profilepic'] == ""){
                                    ?>
                                    <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="100" height="100">
                                    <?php
                                }else{
                                    ?>
                                        <img style="left:0;" src=<?php echo "/speedforce//".$row['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row['username'];?> width="100" height="100">
                                    <?php
                                }
                            ?>
                            <h3><?php echo $row['firstname']." ".$row['lastname'];?></h3>
                            <p>(<?php echo $row['username'];?>)</p>
                        </div>
                    </center>
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
                        <div class="text-center">
                            <?php
                                $query1 = "SELECT * FROM tblfollowing WHERE followingid =".$row['userid']." AND userid = ".$_SESSION['speedster_id'];
                                $result1 = mysqli_query($con,$query1);
                                $row1 = mysqli_fetch_assoc($result1);
                                if($row1 > 0){
                                    ?>
                                        <strong><span>Following</span></strong>
                                    <?php
                                }else{
                                    ?>
                                        <button id=<?php echo "btn".$row['userid'];?> name=<?php echo "btn".$row['userid'];?> class="btn btn-danger <?php echo "btn".$row['userid'];?>" onclick=<?php echo "follow(".$row['userid'].",".$_SESSION['speedster_id'].")";?>>Follow</button>
                                        <strong><span class=<?php echo "following".$row['userid'];?>></span></strong>    
                                    <?php
                                }
                            ?>
                            
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
    function follow(uidtofollow,session_id){
        $.post("/speedforce/findspeedsters/following.php",{userid:uidtofollow,speedster_id:session_id},function(data){
            $(".btn"+uidtofollow).hide()
            $(".following"+uidtofollow).html(data)
        })
    }
</script>
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