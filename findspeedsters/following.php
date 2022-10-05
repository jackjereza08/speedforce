<?php
    include "../php/connect.php";
    $useridtofollow = $_POST['userid'];
    $speedster_id = $_POST['speedster_id'];

    $query = "INSERT INTO tblfollowing VALUES(".$useridtofollow.",".$speedster_id.")";
    mysqli_query($con,$query);
    $query = "INSERT INTO tblfollower VALUES(".$speedster_id.",".$useridtofollow.")";
    mysqli_query($con,$query);
    echo "Following";
?>