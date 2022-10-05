<?php
    include "../php/connect.php";

    // Query for newly added speedsters.
    $query = "SELECT * FROM tblaccount WHERE NOT userid =".$_SESSION['speedster_id']." ORDER BY userid DESC";
    $result = mysqli_query($con,$query);
    
    $x = 1;
    while($x != 6 and $row = mysqli_fetch_assoc($result)){
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
                            <a href="#" class="link">
                                <?php echo $row['firstname']." ".$row['lastname']." (".$row['username'].")";?>
                            </a>
                            <br><br>
                            <strong><span>Following</span></strong>
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
                        <a href="#" class="link">
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
        $x +=1;
    }
?>
<script>
    function follow(uidtofollow,session_id){
        $.post("following.php",{userid:uidtofollow,speedster_id:session_id},function(data){
            $(".btn"+uidtofollow).hide()
            $(".following"+uidtofollow).html(data)
        })
    }
</script>