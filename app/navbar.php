<link rel="stylesheet" href="/speedforce/css/navbarstyle.css">
<?php 
    include "../php/connect.php";
    include "speedtalk.php";

    $username = $_SESSION['login_speedster'];
    $query = "SELECT * FROM tblaccount WHERE username = '".$username."'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
?>
<!-- Search bar for small devices -->
<div class="modal fade" id="searchbar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
            </div> -->
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="/speedforce/findspeedsters/">
                        <div class="input-group">
                            <input class="form-control" type="text" name="search" title="Search speedsters" id="search" placeholder="Search speedsters" required>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>
<!-- Search bar for small devices -->
<!-- Menu for small devices -->
<div id="menu" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-header" style="background:#222222;"></div>
        <div class="modal-content" style="background:#222222;">
            <h3>
            <ul class="dropdown-menu1 text-right">
                <a href="/speedforce/myprofile">My Profile &nbsp;<span class="glyphicon glyphicon-user"></span></a>
                <a href="/speedforce/findspeedsters">Find Speedsters &nbsp;<span class="glyphicon glyphicon-flash"></span></a>
                <a href="/speedforce/accountsettings">Account Settings &nbsp;<span class="glyphicon glyphicon-wrench"></span></a>
                <a href="/speedforce/php/logout.php">Log Out &nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
            </ul>
            </h3>
        </div>
    </div>
</div>
<!-- End of Menu for small devices -->
<nav class="nav nav-navbar navbar-default navbar-fixed-top sfnav">
    <div class="container">
        <div class="navbar-header hidden-xs">
            <a href="" class="navbar-brand">SpeedForce</a>
        </div>
        <!-- MOBILE VIEW  (SMALL)-->
        
        <div class="row visible-xs">
            <a href="" class="navbar-brand">SpeedForce</a>
            <ul class="nav navbar-nav navbar-right">
                <div class="col-xs-1"><li><a href="/speedforce/timeline"><h4 class="glyphicon glyphicon-home"></h4></a></li></div>
                <div class="col-xs-1"><li><a href="" data-toggle="modal" data-target="#yourpost"><h4 class="glyphicon glyphicon-flash"></h4></a></li></div>
                <div class="col-xs-2"><li><div class="dropdown">
                                                <a href="" data-toggle="modal" data-target="#searchbar"><h4 class="glyphicon glyphicon-search"></h4></a>    
                                        </div></li></div>
                <div class="col-xs-1">
                    <li class="dropdown">
                        <?php
                            if(empty($row['profilepic'])){ ?>
                                <a id="propic" href="#" data-toggle="modal" data-target="#menu"><img src="/speedforce/image/propic.jpg" alt="hrwells19" class="img img-circle" width="45" height="45"></a>
                            <?php
                            }else{ ?>
                                <a id="propic" href="#" data-toggle="modal" data-target="#menu"><img src=<?php echo "/speedforce//".$row['profilepic'];?> alt="hrwells19" class="img img-circle" width="45" height="45"></a>
                            <?php
                            } 
                        ?>
                        
                    </li>
                </div>
            </ul>
        </div>
        
        <!-- END MOBILE VIEW  (SMALL)-->
        <!-- TABLET AND DESKTOP VIEW -->
        <div class="row visible-md visible-sm hidden-lg">
            <!-- <a href="" class="navbar-brand">SpeedForce</a> -->
            <ul class="nav navbar-nav link navbar-right">
                <li><a id="nav" href="/speedforce/timeline">Home</a></li>
                <li><a id="nav" href="" data-toggle="modal" data-target="#yourpost">SpeedTalk</a></li>
                <li>
                    <form action="/speedforce/findspeedsters/" class="navbar-form navbar-left">
                        <div class="input-group">
                            <input class="form-control" type="text" name="search" title="Search speedsters" id="search" placeholder="Search speedsters" required>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
                <div class="col-sm-1">
                    <li class="dropdown">
                        <?php
                            if(empty($row['profilepic'])){ ?>
                                <a id="propic" href="#"><img src="/speedforce/image/propic.jpg" alt="hrwells19" class="img img-circle" width="45" height="45"></a>
                            <?php
                            }else{ ?>
                                <a id="propic" href="#"><img src=<?php echo "/speedforce//".$row['profilepic'];?> alt="hrwells19" class="img img-circle" width="45" height="45"></a>
                            <?php
                            } 
                        ?>
                        <ul class="dropdown-menu">
                            <a href="/speedforce/myprofile">My Profile &nbsp;<span class="glyphicon glyphicon-user"></span></a>
                            <a href="/speedforce/findspeedsters">Find Speedsters &nbsp;<span class="glyphicon glyphicon-flash"></span></a>
                            <a href="/speedforce/accountsettings">Account Settings &nbsp;<span class="glyphicon glyphicon-wrench"></span></a>
                            <a href="/speedforce/php/logout.php">Log Out &nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
                        </ul>
                    </li>
                </div>
            </ul>
        </div>
        <!-- END TABLET AND DESKTOP VIEW -->
        <!-- LARGE DESKTOP VIEW -->
        <div class="row visible-lg hidden-md">
            <!-- <a href="" class="navbar-brand">SpeedForce</a> -->
            <ul class="nav navbar-nav link navbar-right">
                <li><a id="nav" href="/speedforce/timeline">Home</a></li>
                <li><a id="nav" href="" data-toggle="modal" data-target="#yourpost">SpeedTalk</a></li>
                <li>
                    <form action="/speedforce/findspeedsters/" class="navbar-form navbar-left">
                        <div class="input-group">
                            <input class="form-control" type="text" name="search" title="Search speedsters" id="search" placeholder="Search speedsters" required>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
                <div class="col-sm-1">
                    <li class="dropdown">
                        <?php
                            if(empty($row['profilepic'])){ ?>
                                <a id="propic" href="#"><img src="/speedforce/image/propic.jpg" alt="hrwells19" class="img img-circle" width="45" height="45"></a>
                            <?php
                            }else{ ?>
                                <a id="propic" href="#"><img src=<?php echo "/speedforce//".$row['profilepic'];?> alt="hrwells19" class="img img-circle" width="45" height="45"></a>
                            <?php
                            } 
                        ?>
                        <ul class="dropdown-menu">
                            <a href="/speedforce/myprofile">My Profile &nbsp;<span class="glyphicon glyphicon-user"></span></a>
                            <a href="/speedforce/findspeedsters">Find Speedsters &nbsp;<span class="glyphicon glyphicon-flash"></span></a>
                            <a href="/speedforce/accountsettings">Account Settings &nbsp;<span class="glyphicon glyphicon-wrench"></span></a>
                            <a href="/speedforce/php/logout.php">Log Out &nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
                        </ul>
                    </li>
                </div>
            </ul>
        </div>
        <!-- END LARGE DESKTOP VIEW -->
    </div>

   
</nav>

<script src="/speedforce/js/jquery-3.2.1.min.js"></script>
<script src="/speedforce/js/bootstrap.js"></script>