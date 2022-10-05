<?php
    include "../php/connect.php";

    $query = "SELECT * FROM tbllike WHERE userid = ".$_POST['sp_id']." AND postid =".$_POST['postid'];
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 0){
        $query1 = "INSERT INTO tbllike values(".$_POST['postid'].",".$_POST['sp_id'].")";
        mysqli_query($con,$query1);

        // Who like this?
        $query4 = "SELECT * FROM tbllike WHERE userid = ".$_POST['sp_id']." AND postid =".$_POST['postid'];
        $result4 = mysqli_query($con,$query4);
        $row3 = mysqli_fetch_assoc($result4);

        // How many likes?
        $query3 = "SELECT COUNT(userid) AS num_like FROM tbllike WHERE postid =".$_POST['postid'];
        $result3 = mysqli_query($con,$query3);
        $no_of_like = mysqli_fetch_assoc($result3);

        if($row3['userid'] == $_POST['sp_id'] and $no_of_like['num_like']==1){
            echo "You like this.";
        }elseif($row3['userid'] == $_POST['sp_id'] and $no_of_like['num_like']==2){
            echo "You and ".($no_of_like['num_like'] - 1)." other like this.";
        }elseif($row3['userid'] == $_POST['sp_id'] and $no_of_like['num_like']>0){
            echo "You and ".($no_of_like['num_like'] - 1)." others like this.";
        }elseif($no_of_like['num_like']>0){
            echo $no_of_like['num_like']." like this.";
        }
    }else{
        $query1 = "DELETE FROM tbllike WHERE userid = ".$_POST['sp_id']." AND postid =".$_POST['postid'];
        mysqli_query($con,$query1);

        // Who like this?
        $query4 = "SELECT * FROM tbllike WHERE userid = ".$_POST['sp_id']." AND postid =".$_POST['postid'];
        $result4 = mysqli_query($con,$query4);
        $row3 = mysqli_fetch_assoc($result4);

        // How many likes?
        $query3 = "SELECT COUNT(userid) AS num_like FROM tbllike WHERE postid =".$_POST['postid'];
        $result3 = mysqli_query($con,$query3);
        $no_of_like = mysqli_fetch_assoc($result3);

        if($row3['userid'] == $_POST['sp_id'] and $no_of_like['num_like']==1){
            echo "You like this.";
        }elseif($row3['userid'] == $_POST['sp_id'] and $no_of_like['num_like']==2){
            echo "You and ".($no_of_like['num_like'] - 1)." other like this.";
        }elseif($row3['userid'] == $_POST['sp_id'] and $no_of_like['num_like']>0){
            echo "You and ".($no_of_like['num_like'] - 1)." others like this.";
        }elseif($no_of_like['num_like']>0){
            echo $no_of_like['num_like']." like this.";
        }
    }
?>