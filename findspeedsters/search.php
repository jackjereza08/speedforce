<?php
    include "../php/connect.php";

    if(isset($_GET['search'])){
        $search_query = test_input($_GET['search']);
        echo "<h3>You searched speedster \"".$search_query."\".</h3>";
        $query = "SELECT * FROM tblaccount WHERE username LIKE '%".$search_query."%' OR firstname LIKE '%".$search_query."%'
                    OR lastname LIKE '%".$search_query."%'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        
        if($count == 0){
            echo "<h3>No speedster \"".$search_query."\" found.<h3>";
        }else{
            while($row = mysqli_fetch_assoc($result)){
                $query1 = "SELECT * FROM tblfollowing WHERE followingid =".$row['userid']." AND userid = ".$_SESSION['speedster_id'];
                $result1 = mysqli_query($con,$query1);
                $row1 = mysqli_fetch_assoc($result1);
                if($row1 > 0){
                    ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>
                                    <?php
                                        if($row['profilepic'] == ""){
                                            ?>
                                            <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="36" height="36">
                                            <?php
                                        }else{
                                            ?>
                                                <img style="left:0;" src=<?php echo "/speedforce//".$row['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row['username'];?> width="36" height="36">
                                            <?php
                                        }
                                    ?>
                                    <a href=<?php echo "/speedforce/profile/profile.php?id=".$row['userid'];?> class="link">
                                        <?php echo $row['firstname']." ".$row['lastname']." (".$row['username'].")";?>
                                    </a>
                                    <br><br>
                                    <strong><span>Following</span></strong>
                                </span> 
                            </div>
                        </div>
                    <?php  
                }else{
                    if($row['username'] == $_SESSION['login_speedster']){
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span>
                                        <?php
                                            if($row['profilepic'] == ""){
                                                ?>
                                                <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="36" height="36">
                                                <?php
                                            }else{
                                                ?>
                                                    <img style="left:0;" src=<?php echo "/speedforce//".$row['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row['username'];?> width="36" height="36">
                                                <?php
                                            }
                                        ?>
                                        <a href="/speedforce/myprofile" class="link">
                                            <?php echo $row['firstname']." ".$row['lastname']." (".$row['username'].")";?>
                                        </a>
                                        <div class="text-right">
                                            <strong><span><a href="/speedforce/myprofile"><h4>View Profile</h4></a></span></strong>
                                        </div>
                                    </span> 
                                </div>
                            </div>
                        <?php
                    }else{
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span>
                                        <?php
                                            if($row['profilepic'] == ""){
                                                ?>
                                                <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="36" height="36">
                                                <?php
                                            }else{
                                                ?>
                                                    <img style="left:0;" src=<?php echo "/speedforce//".$row['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row['username'];?> width="36" height="36">
                                                <?php
                                            }
                                        ?>
                                        <a href=<?php echo "/speedforce/profile/profile.php?id=".$row['userid'];?> class="link">
                                            <?php echo $row['firstname']." ".$row['lastname']." (".$row['username'].")";?>
                                        </a>
                                        <br><br>
                                        <button id=<?php echo "btn".$row['userid'];?> name=<?php echo "btn".$row['userid'];?> class="btn btn-danger <?php echo "btn".$row['userid'];?>" onclick=<?php echo "follow(".$row['userid'].",".$_SESSION['speedster_id'].")";?>>Follow</button>
                                        <strong><span class=<?php echo "following".$row['userid'];?>></span></strong>
                                    </span> 
                                </div>
                            </div>
                        <?php
                    }
                }
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!-- <script>
    function follow(uidtofollow,session_id){
        $.post("following.php",{userid:uidtofollow,speedster_id:session_id},function(data){
            $("#btn"+uidtofollow).hide()
            $("#following"+uidtofollow).html(data)
        })
    }
</script> -->