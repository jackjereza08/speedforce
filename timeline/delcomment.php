<?php
    include "../php/connect.php";

    $query = "DELETE FROM tblcomment WHERE commentid =".$_POST['commentid'];
    mysqli_query($con,$query);
?>