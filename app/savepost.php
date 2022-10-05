<?php
    include "../php/connect.php";
    session_start();
    if(isset($_POST['submitpost'])){
        $speedster_id = $_SESSION['speedster_id'];
        $status = test_input($_POST['status']);
        date_default_timezone_set("Asia/Manila");
        $query3 = "INSERT INTO tblpost SET post='".$status."',userid='".$speedster_id."',datetime='".date("M d Y h:i:s a",time())."'";
        mysqli_query($con,$query3);
        header("location:/speedforce/timeline");
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>