<?php
    if(isset($_POST["submit"])){

        // $img_name = mysqli_real_escape_string($con,$_FILES["image"]["name"]);
        // $img_data = mysqli_real_escape_string($con,file_get_contents($_FILES["image"]["tmp_name"]));
        // $img_type = mysqli_real_escape_string($con,$_FILES["image"]["type"]);

        if(empty($_FILES['image']['name'])){
            echo "Choose an image.";
        }else{
            $allowed_extn = array('png','jpg','jpeg','gif');

            $img_name = $_FILES["image"]["name"];
            $img_extn = explode('.',strtolower($img_name));
            $img_extn = end($img_extn);
            $img_tmp = $_FILES['image']['tmp_name'];
            
            if(in_array($img_extn,$allowed_extn)){
                change_pp($_SESSION['speedster_id'],$img_tmp,$img_extn);
            }else{
                echo 'Only '.implode(',',$allowed_extn).' are allowed';
            }
        }
    }
    function change_pp($speedster_id,$img_tmp,$img_extn){
        include "../php/connect.php";

        $img_path = 'image/profilepic/'.substr(md5(time()),0,8).'.'.$img_extn;
        move_uploaded_file($img_tmp,'../'.$img_path);
        $query = "UPDATE tblaccount SET profilepic = '".$img_path."' WHERE userid = ".$speedster_id;
        mysqli_query($con,$query);
    }
?>

<center>
<div id="profilepic">
    <?php
        include "../php/connect.php";

        $username = $_SESSION['login_speedster'];
        $query = "SELECT * FROM tblaccount WHERE username = '".$username."'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);
        if(empty($row['profilepic'])){ ?>
            <a href="#" style="cursor:default;">
                <img style="cursor:pointer;" class="img img-responsive img-circle" data-toggle="modal" title="Change Profile Picture" data-placement="bottom" data-target="#changeimg" src="/speedforce/image/propic.jpg" width="100" height="100">
            </a>
        <?php
        }else{  ?>
            <a href="#" style="cursor:default;">
                <img style="cursor:pointer;" class="img img-responsive img-circle" data-toggle="modal" title="Change Profile Picture" data-placement="bottom" data-target="#changeimg" src=<?php echo "/speedforce//".$row['profilepic'];?> width="100" height="100">
                <span data-toggle="tooltip" title="Change Profile Picture"></span>
            </a>
        <?php
        }
    ?>
     
</div>      
<center>

<div id="changeimg" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>Change Profile Picture</h3>
            </div>
            <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="upload-img" id="label-profilepic">
                    <!-- <img class="img img-responsive img-circle" src="/speedforce/image/propic.jpg" width="100" height="100"> -->
                    <div class="card">
                        <h4><span class="glyphicon glyphicon-open"></span>&nbsp;Upload Photo</h4>
                    </div>
                </label>
                <input type="file" id="upload-img" name="image">
                    <div>
                        <input type="submit" name="submit" class="btn btn-danger" value="Save Profile Picture">
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="modal"]').tooltip(); 
});
</script>