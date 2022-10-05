<?php
    include "../php/connect.php";

    session_start();
    $userid = $_POST['userid'];
    $query = "DELETE FROM tblfollowing WHERE followingid =".$userid." AND userid =".$_SESSION['speedster_id'];
    mysqli_query($con,$query);
    $query = "DELETE FROM tblfollower WHERE followerid =".$_SESSION['speedster_id']." AND userid =".$userid;
    mysqli_query($con,$query);
    echo "Unfollowed";
?>