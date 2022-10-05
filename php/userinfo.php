<?php include "connect.php";

    $username = $_SESSION['login_speedster'];
    $query = "SELECT * FROM tblaccount WHERE username = '".$username."'";
    $result = mysqli_query($con,$query);
?>