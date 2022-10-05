<?php
    include "../php/connect.php";
    session_start();
    $postid = $_POST['postid'];
    $comment = $_POST['comment'];
    $sp_id = $_POST['sp_id'];

    if(trim($comment) == ""){
        return;
    }else{
        $query = "INSERT INTO tblcomment set postid='".$postid."',comment='".mysqli_real_escape_string($con,$_POST['comment'])."',userid='".$sp_id."'";
        mysqli_query($con,$query);
        $query = "SELECT * FROM tblaccount WHERE userid =".$_POST['sp_id'];
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);
        

        if($row['userid'] == $_SESSION['speedster_id']){
            echo '
            <a href="/speedforce/myprofile">'.$row['username'].'</a> &bull; '.$comment.'
            <span class="text-right"><button class="btn btn-white btn-xs glyphicon glyphicon-trash text-btn"></button>&nbsp; &nbsp; </span>
            ';
        }else{
            echo '
            <a href="/speedforce/profile/profile.php?id=">'.$row['username'].'</a> &bull; '.$comment.'
            ';
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  
?>