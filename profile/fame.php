<?php
    include "../php/connect.php";
    
    // Follower
    $speedster_id = $row['userid'];
    $query = "SELECT COUNT(followerid) AS no_follower from tblfollower WHERE userid = ".$speedster_id;
    $result = mysqli_query($con,$query);
    $no_follower = mysqli_fetch_assoc($result);

    // Post
    $query = "SELECT COUNT(postid) AS no_post from tblpost WHERE userid = ".$speedster_id;
    $result = mysqli_query($con,$query);
    $no_post = mysqli_fetch_assoc($result);

    // Following
    $query = "SELECT COUNT(followingid) AS no_following from tblfollowing WHERE userid = ".$speedster_id;
    $result = mysqli_query($con,$query);
    $no_following = mysqli_fetch_assoc($result);
?>