<?php
        include("../php/connect.php");
        $usernameError = $nameError = $msg = "";
    
            $username = test_input(strtolower($_POST["username"]));
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);
            
            $query = "SELECT * FROM tblaccount WHERE username = '".$username."'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            $count = mysqli_num_rows($result);
    
            if ($count != 0){
                echo '<div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Like your crush,the username you just entered was already taken.
                </div>';
            }elseif (!preg_match("/^[a-zA-Z ]*$/",$fname) && !preg_match("/^[a-zA-Z ]*$/",$lname)) {
                echo '<div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Only letters and whitespace allowed.
                </div>'; 
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Invalid email format.
                </div>';
            }else{
                
                $query = "insert into tblaccount set
                        username = '".$username."',
                        lastname = '".$lname."',
                        firstname = '".$fname."',
                        email = '".$email."',
                        password = '".md5($password)."'";
                mysqli_query($con,$query);
                echo '<div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Welcome to SpeedForce, '.$fname.'! You may now <a href="#" data-toggle="modal" data-target="#login">log in</a>.
                </div>';
                mysqli_close($con);
            }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>