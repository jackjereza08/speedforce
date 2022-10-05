<?php
    include "../php/connect.php";
    $speedster_id = $_SESSION['speedster_id'];
    $query = "SELECT * FROM tblpost WHERE userid =".$speedster_id." ORDER BY postid DESC";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);

    if($count == 0){
        echo "No posts to show.";
    }else{
        while($row = mysqli_fetch_assoc($result)){
            $query2 = "SELECT * FROM tblaccount WHERE userid =".$speedster_id;
            $result2 = mysqli_query($con,$query2);
            $row2 = mysqli_fetch_assoc($result2);

            // How many likes?
            $query3 = "SELECT COUNT(userid) AS num_like FROM tbllike WHERE postid =".$row['postid'];
            $result3 = mysqli_query($con,$query3);
            $no_of_like = mysqli_fetch_assoc($result3);
            // Who like this?
            $query4 = "SELECT * FROM tbllike WHERE userid = ".$speedster_id." AND postid =".$row['postid'];
            $result4 = mysqli_query($con,$query4);
            $row3 = mysqli_fetch_assoc($result4);

            ?>
                <div class="panel panel-default">
                    <div class="panel-heading panel-timeline">
                        <?php
                            if($row2['profilepic'] == ""){
                                ?>
                                <img style="left:0;" class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="36" height="36">
                                <?php
                            }else{
                                ?>
                                    <img style="left:0;" src=<?php echo "/speedforce//".$row2['profilepic'];?> class="img img-responsive img-circle" alt=<?php echo $row2['username'];?> width="36" height="36">
                                <?php
                            }
                        ?>
                        <a href="#" class="link">
                            <?php echo $row2['username'];?>
                        </a>
                        &bull; <?php echo sf_time_ago($row['datetime']);?>
                        </span><br><br>
                        <div style="padding:5px;border: 1px solid #e0e0e0;border-radius:4px; background: #ffffff;">
                            <?php echo nl2br($row['post']);?>
                        </div>
                        <br>
                        <span id=<?php echo "youlike".$row['postid'];?>>
                            <?php
                                $youlike = false;
                                if($row3['userid'] == $speedster_id and $no_of_like['num_like']==1){
                                    echo "You like this.";
                                    $youlike = true;
                                }elseif($row3['userid'] == $speedster_id and $no_of_like['num_like']==2){
                                    echo "You and ".($no_of_like['num_like'] - 1)." other like this.";
                                    $youlike = true;
                                }elseif($row3['userid'] == $speedster_id and $no_of_like['num_like']>0){
                                    echo "You and ".($no_of_like['num_like'] - 1)." others like this.";
                                    $youlike = true;
                                }elseif($no_of_like['num_like']>0){
                                    echo $no_of_like['num_like']." like this.";
                                }
                            ?>
                        </span>
                        <div class="row">
                            <div class="col-sm-1">
                                <?php
                                    if($youlike == true){
                                        ?>
                                            <button style="background:#9F2626;color:#ffe900;" class="btn glyphicon glyphicon-flash" title="Unlike" id=<?php echo "like".$row['postid'];?> name=<?php echo "like".$row['postid'];?> onclick=<?php echo "like(".$row['postid'].",".$speedster_id.")";?>></button>
                                        <?php
                                    }else{
                                        ?>
                                            <button class="btn glyphicon glyphicon-flash" title="Like" id=<?php echo "like".$row['postid'];?> name=<?php echo "like".$row['postid'];?> onclick=<?php echo "like(".$row['postid'].",".$speedster_id.")";?>></button>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="overflow:hidden;resize:none;" rows="1" type="text" name=<?php echo "comment".$row['postid'];?> id=<?php echo "comment".$row['postid'];?> placeholder="Comment" title="Type your comment." required></textarea>  
                            </div>
                            <div class="col-sm-1">
                                <span><input type="button" name=<?php echo "comment".$row['postid'];?> onclick=<?php echo "comment(".$row['postid'].",".$speedster_id.")";?> class="btn btn-danger" value="Comment"></span>
                            </div>
                        </div
                        <br>  
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="text-center">Comments</div>
                                    <div style="padding:5px;border: 1px solid #e0e0e0;border-radius:4px; background: #ffffff;">
                                        
                                        <?php
                                            include "../php/connect.php";

                                            $query5 = "SELECT * FROM tblcomment WHERE postid =".$row['postid'];
                                            $result5 = mysqli_query($con,$query5);

                                            while($row4 = mysqli_fetch_assoc($result5)){
                                                $query6 = "SELECT * FROM tblaccount WHERE userid =".$row4['userid'];
                                                $result6 = mysqli_query($con,$query6);
                                                $row5 = mysqli_fetch_assoc($result6);
                                            ?>
                                               <div id=<?php echo "comment".$row4['commentid'];?>>
                                                <?php 
                                                    if($row5['userid'] == $_SESSION['speedster_id']){
                                                        ?>
                                                            <div class="modal" id=<?php echo "delmsg".$row4['commentid'];?> role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Delete your comment</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Your comment will be delete.
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <input onclick=<?php echo "delcomment(".$row4['commentid'].")";?> data-dismiss="modal" type="button" class="btn btn-sm btn-danger" value="Delete">
                                                                            <input type="button" class="btn btn-sm" data-dismiss="modal" value="Cancel">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        echo '
                                                        <a href="/speedforce/myprofile">'.$row5['username'].'</a> &bull; '.$row4['comment'].'&nbsp; &nbsp;
                                                        <button class="btn btn-white btn-xs glyphicon glyphicon-trash text-btn" data-toggle="modal" data-target="#delmsg'.$row4['commentid'].'"></button>
                                                        ';
                                                    }else{
                                                        echo "<a href='/speedforce/profile/profile.php?id=".$row5['userid']."'>".$row5['username']."</a> &bull; ".$row4['comment'];
                                                    }
                                                ?>
                                            </div>
                                            <?php
                                            }
                                        ?>
                                        <div id=<?php echo "youcomment".$row['postid'];?>></div>
                                    </div>
                            </div>
                        </div>     
                    </div>
                </div>
            <?php
        }
    }

    function sf_time_ago($dbtime){
        $t_ago = strtotime($dbtime);
        $current_time = time();

        $time_diff = $current_time - $t_ago;

        $sec = $time_diff;
        $min = round($sec/60);
        $hrs = round($sec/3600);
        $day = round($hrs/24);

        if($sec<=60){
            return "Just now";
        }elseif($min<=60){
            if($min==1){
                return " 1 min ago";
            }else{
                return "$min mins ago";
            }
        }elseif($hrs<=24){
            if($hrs==1){
                return "1 hr ago";
            }else{
                return "$hrs hrs ago";
            }
        }elseif($day<=7){
            if($day==1){
                return "yesterday";
            }else{
                return "$day days ago";
            }
        }else{
            return $dbtime;
        }
    }
?>

<script>
    function like(postid,sp_id){
        $.post("/speedforce/timeline/like.php",{postid:postid,sp_id:sp_id},function(data){
            $("#youlike"+postid).html(data)
        })
    }

    function comment(postid,sp_id){
        $.post("/speedforce/timeline/comment.php",{postid:postid,sp_id:sp_id,comment:$('#comment'+postid).val()},function(data){
            $("#youcomment"+postid).append(data)
        })
    }

    function delcomment(commentid){
        $.post("/speedforce/timeline/delcomment.php",{commentid:commentid},function(data){
            $("#comment"+commentid).hide()
        })
    }
</script>