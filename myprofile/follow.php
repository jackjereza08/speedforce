<!-- Modal For Following -->
<?php
    include "../php/connect.php";

    $speedster_id = $_SESSION['speedster_id'];
    $query = "SELECT * FROM tblfollowing WHERE userid =".$speedster_id;
    $result = mysqli_query($con,$query);

    ?>
    <!-- Modal Following -->
        <div id="following" class="modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3 class="text-center">Following</h3>
                    </div>
                    <div class="modal-body">
                        <?php
                            if(mysqli_num_rows($result)==0){
                                ?>
                                    <p>You need to follow some of your speedster friends. <span><a href="/speedforce/findspeedsters" class="link btn btn-danger">Start Following</a></span></p>
                                <?php
                            }else{
                                while($row = mysqli_fetch_assoc($result)){
                                    $query1 = "SELECT * FROM tblaccount WHERE userid =".$row['followingid'];
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    ?>
                                        <div class="panel panel-default" id=<?php echo "panel".$row1['userid'];?>>
                                            <div class="panel-heading">
                                                <span>
                                                    <?php
                                                        if($row1['profilepic'] == ""){
                                                            ?>
                                                            <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="36" height="36">
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <img style="left:0;" src=<?php echo "/speedforce//".$row1['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row1['username'];?> width="36" height="36">
                                                            <?php
                                                        }
                                                    ?>
                                                    <a href=<?php echo "/speedforce/profile/profile.php?id=".$row1['userid'];?> class="link">
                                                        <?php echo $row1['firstname']." ".$row1['lastname']." (".$row1['username'].")";?>
                                                    </a>
                                                    <!-- <br><br> -->
                                                    <button id=<?php echo "btn".$row1['userid'];?> name=<?php echo "btn".$row1['userid'];?> class="btn btn-danger" onclick=<?php echo "unfollow(".$row1['userid'].")";?>>Unfollow</button>
                                                </span> 
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal Following -->
    <?php
?>
<script>
    function unfollow(uidtounfollow){
        $.post("unfollow.php",{userid:uidtounfollow},function(data){
            $("#panel"+uidtounfollow).hide()
        })
    }
</script>
<!-- End of Modal For Following -->

<!-- Modal For Follower -->
<?php
    include "../php/connect.php";

    $speedster_id = $_SESSION['speedster_id'];
    $query = "SELECT * FROM tblfollower WHERE userid =".$speedster_id;
    $result = mysqli_query($con,$query);

    ?>
    <!-- Modal Follower -->
        <div id="follower" class="modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3 class="text-center">Followers</h3>
                    </div>
                    <div class="modal-body">
                        <?php
                            if(mysqli_num_rows($result)==0){
                                ?>
                                    <p>You need to follow some of your speedster friends to follow you back. <span><a href="/speedforce/findspeedsters" class="link btn btn-danger">Start Following</a></span></p>
                                <?php
                            }else{
                                while($row = mysqli_fetch_assoc($result)){
                                    $query1 = "SELECT * FROM tblaccount WHERE userid =".$row['followerid'];
                                    $result1 = mysqli_query($con,$query1);
                                    
                                    while($row1 = mysqli_fetch_assoc($result1)){
                                        $query2 = "SELECT * FROM tblfollowing WHERE followingid =".$row1['userid']." AND userid = ".$_SESSION['speedster_id'];
                                        $result2 = mysqli_query($con,$query2);
                                        $row2 = mysqli_fetch_assoc($result2);

                                        if($row2 > 0){
                                            ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <span>
                                                            <?php
                                                                if($row1['profilepic'] == ""){
                                                                    ?>
                                                                    <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="36" height="36">
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                        <img style="left:0;" src=<?php echo "/speedforce//".$row1['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row1['username'];?> width="36" height="36">
                                                                    <?php
                                                                }
                                                            ?>
                                                            <a href=<?php echo "/speedforce/profile/profile.php?id=".$row1['userid'];?> class="link">
                                                                <?php echo $row1['firstname']." ".$row1['lastname']." (".$row1['username'].")";?>
                                                            </a>
                                                            <br><br>
                                                            <strong><span>Following</span></strong>
                                                        </span> 
                                                    </div>
                                                </div>
                                            <?php
                                        }else{
                                            ?>
                                                <div class="panel panel-default" id=<?php echo "panel".$row1['userid'];?>>
                                                    <div class="panel-heading">
                                                        <span>
                                                            <?php
                                                                if($row1['profilepic'] == ""){
                                                                    ?>
                                                                    <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="36" height="36">
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                        <img style="left:0;" src=<?php echo "/speedforce//".$row1['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row1['username'];?> width="36" height="36">
                                                                    <?php
                                                                }
                                                            ?>
                                                            <a href=<?php echo "/speedforce/profile/profile.php?id=".$row1['userid'];?> class="link">
                                                                <?php echo $row1['firstname']." ".$row1['lastname']." (".$row1['username'].")";?>
                                                            </a>
                                                            <br><br>
                                                            <button id=<?php echo "btn".$row1['userid'];?> name=<?php echo "btn".$row1['userid'];?> class="btn btn-danger" onclick=<?php echo "follow(".$row1['userid'].",".$speedster_id.")";?>>Follow</button>
                                                            <strong><span id=<?php echo "following".$row1['userid'];?>></span></strong>
                                                        </span> 
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                    
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal Follower -->
    <?php
?>
<script>
    function follow(uidtofollow,session_id){
        $.post("/speedforce/findspeedsters/following.php",{userid:uidtofollow,speedster_id:session_id},function(data){
            $("#btn"+uidtofollow).hide()
            $("#following"+uidtofollow).html(data)
        })
    }
</script>
<!-- End of Modal For Follower -->