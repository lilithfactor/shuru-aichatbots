<?php
session_start();
$session_id = session_id();
include './connect.php';

if(isset($_POST['loginBtn'])){
        $lusername=$_POST['lusername'];
        $lpassword=$_POST['lpassword'];
        $login="SELECT * FROM `users` WHERE  `username`='$lusername' and `password`='$lpassword'";
        $result = mysqli_query($conn, $login);
        if (mysqli_num_rows($result) > 0) {
            session_regenerate_id();
            while($row = mysqli_fetch_assoc($result)){
                $uid = $row['id'];
                $_SESSION['sessionid'] = $session_id;
                $_SESSION['username'] = $lusername;
                $_SESSION['uid'] = $uid;
                echo "success";
            }
        }else{
            echo "error";
        }
}
if(isset($_POST['signupBtn'])){
        $susername=$_POST['susername'];
        $spassword=$_POST['spassword'];

        $checksign = "SELECT * FROM `users` WHERE  `username`='$susername' and `password`='$spassword'";
        $res = mysqli_query($conn, $checksign);

        if (mysqli_num_rows($res) == 1) {
            echo "exist";
        }else{
            $signup="INSERT INTO `users`(`username`, `password`) VALUES ('$susername','$spassword')";
            if(mysqli_query($conn, $signup)){
                echo "success";
            } else{
                echo "ERROR: $signup. "
                    . mysqli_error($conn);
            }
        }
}
?>