<?php
include './connect.php';
session_start();

if(isset($_POST['pr_co_submit'])){
    $prompt=$_POST['prompt'];
    $completion=$_POST['completion']; 

    foreach($prompt as $key => $d){
    $charid = $_POST['charid'];
    // $sid = $_POST['session'];

    // if(!empty($prompt) && !empty($completion)){
        $pc="INSERT INTO `pr_and_co`( `prompts`, `completions`, `charid`) VALUES ('".$prompt[$key]."','".$completion[$key]."','".$charid."');";
        $model="INSERT INTO `models`(`charid`) VALUES ('".$charid."');";
        if(mysqli_query($conn, $model)){
            if(mysqli_query($conn, $pc)){
            // $_SESSION['notification'] = 'Added record.';
            // $_SESSION['notification_type'] = 'success';
            $res = true;
            }
        } else{
            echo "ERROR: $sql. "
                . mysqli_error($conn);
        }
    }
    if($res == true){
        header('location:../profile.php');
    }else{
        echo 'not inserted';
    }
    // }else{
    //     // $_SESSION['notification'] = 'Please Add Fields.';
    //     // $_SESSION['notification_type'] = 'error';
    //     header('location:../pr_and_co.php');
    // }
}
if(isset($_POST['charsubmit'])){
        $name=$_POST['charname'];
        $uid = $_POST['uid'];

        // File upload path
        $targetDir = "../images/character_images/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');

        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

                $checkname = "SELECT * FROM `char_model` WHERE  `char_name`='$name'";
                $res = mysqli_query($conn, $checkname);

                if (mysqli_num_rows($res) == 1) {
                    echo '<script>
                    alert("Character Name Already Exists");
                    window.location.href="../profile.php";
                    </script>';
                }else{
                // Insert image file name into database
                    $insert = $conn->query("INSERT INTO `char_model`(`char_name`, `char_image`, `uid`) VALUES ('".$name."','".$fileName."', '".$uid."')");
                    if($insert){
                        $_SESSION['charname'] = $name;
                        echo '<script>
                        alert("File Uploaded Successfully");
                        window.location.href="../pr_and_co.php";
                        </script>';
                        // $_SESSION['notification'] = 'Model Name Created Successfully';
                        // $_SESSION['notification_type'] = 'success';
                        // header('location:../index.php');
                    }else{
                        echo '<script>alert("Not Uploaded");
                        window.location.href="../profile.php";
                        </script>';
                    } 
                }
            }else{
                echo '<script>alert("Try Later");
                window.location.href="../profile.php";
                </script>';
            }
        }else{
            echo '<script>alert("Empty File");
            window.location.href="../profile.php";
            </script>'; 
        }
}
?>