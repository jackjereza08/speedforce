<?php
    session_start();

    if(!isset($_SESSION['login_speedster'])){
        mysqli_close($con);
        header("location:/speedforce");
    }
    date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SpeedForce</title>
    <link rel="stylesheet" href="/speedforce/css/bootstrap.css">
    <link rel="stylesheet" href="/speedforce/css/index.css">
</head>
<body>
<?php include "../app/navbar.php";?>
    <div class="container-fluid" id="top"> 
        <!-- <img src="/speedforce/image/fadingloadr.gif" alt="" class="img img-responsive" width="34" height="34"> -->
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
            <div class="searchedsp">
                <?php include "search.php";?>
            </div>
                <div class="new_speedsters">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>The new Speedsters (as of <?php echo date("M d, Y",time())?>)</h3>
                        </div>
                        <div class="panel-body">
                            <center><?php include "listsofspeedsters.php";?></center>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>
<footer class="text-right" style="padding-right:16px;"><strong>&copy; <?php echo date('Y');?> SpeedForce | made by Team Flash <span class="glyphicon glyphicon-flash"></span></strong></footer>
<script src="/speedforce/js/jquery-3.2.1.min.js"></script>
<script src="/speedforce/js/bootstrap.js"></script>
<script src="/speedforce/js/index.js"></script>
</html>