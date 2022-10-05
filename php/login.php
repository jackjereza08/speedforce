<?php
    include "connect.php";
    session_start();
    
    $error = "";
    if(isset($_POST['login'])){
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);

        $query = "SELECT * FROM tblaccount WHERE username = '".$username."' AND password = '".md5($password)."'";
        $count = mysqli_num_rows(mysqli_query($con,$query));
        $row = mysqli_fetch_assoc(mysqli_query($con,$query));
        if($count!=0){
            $_SESSION['login_speedster'] = $username;
            $_SESSION['speedster_id'] = $row['userid'];
            header("location:/speedforce/timeline");
        }else{
            $error = '<div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Invalid Username or Password. Please log in again.</strong>
            </div>';
        }
        mysqli_close($con);
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>