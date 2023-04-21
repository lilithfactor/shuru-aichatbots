<?php
    session_start();
    include './db/connect.php';
    // $sid=$_SESSION['sessionid'];
    // $login="SELECT * FROM `pr_and_co` WHERE  `session_id`='$sid'";
    $tid = $_GET['tid'];
    $data="SELECT * FROM `pr_and_co` WHERE `charid` ='$tid'";
    $result = mysqli_query($conn, $data);
    $pc = '';
    while($row = mysqli_fetch_assoc($result)){

        $prompts = $row['prompts'];
        $completions = $row['completions'];
        $pc=$pc."/".$prompts.",".$completions;
    }

    $cmd="python train.py ".escapeshellarg($pc);
    // reads print statement
    $ret=shell_exec($cmd);
    // echo $pc;
    if ($ret==null)
        echo "nothin";
    else 
        echo "some string".$ret;
    // echo $ret;
    echo $pc;
?>