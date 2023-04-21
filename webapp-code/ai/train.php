<?php
// session_start();
include './db/connect.php';
// $tid = $_GET['tid'];

// $tid = 16;
// $data="SELECT * FROM `pr_and_co` WHERE `charid` ='$tid'";

// $sep_rows = ")++(";
// $sep_pr_co = ")__(";
// $res = mysqli_query($conn, $data);
// $pc = '';
// while($row = mysqli_fetch_assoc($res)){
//     $prompts = $row['prompts'];
//     $completions = $row['completions'];
//     if ($pc == null)
//         $pc=$prompts.$sep_pr_co.$completions;
//     else
//         $pc=$pc.$sep_rows.$prompts.$sep_pr_co.$completions;
    
// }

// $cmd="python ./openai/train.py ".escapeshellarg($pc);
// // reads print statement
// $ret=shell_exec($cmd);
// // echo $pc;
// if ($ret==null)
//     echo "nothin";
// else 
//     echo $ret;

if(isset($_POST['pr_co_submit'])){
    $prompt=$_POST['prompt'];
    $completion=$_POST['completion'];
    $charname=$_POST['charname']; 
    // echo $charname;
    
    foreach($prompt as $key => $d){
        $charid = $_POST['charid'];

        $pc_data="INSERT INTO `pr_and_co`( `prompts`, `completions`, `charid`) VALUES ('".$prompt[$key]."','".$completion[$key]."','".$charid."');";
        
        $data="SELECT * FROM `pr_and_co` WHERE `charid` ='".$charid."'";
        $res = mysqli_query($conn, $data);
        
        $model="INSERT INTO `models`(`charid`) VALUES ('".$charid."');";
        $sep_rows = ")++(";
        $sep_pr_co = ")__(";
        if(mysqli_query($conn, $pc_data)){
            $pc = '';
            while($row = mysqli_fetch_assoc($res)){
                $prompts = $row['prompts'];
                $completions = $row['completions'];
                if ($pc == null)
                    $pc=$prompts.$sep_pr_co.$completions;
                else
                    $pc=$pc.$sep_rows.$prompts.$sep_pr_co.$completions;
            }

            // $cmd="python ./openai/train.py ".escapeshellarg($pc);
            // reads print statement
            // $ret=shell_exec($cmd.")shellarg(".$charname);

            $ret = shell_exec("python ./openai/train.py ".$pc."()()()".$charname);
        }
    }
    // .")shellarg(".$charname
    
    // .escapeshellarg($charname);

    // $page = shell_exec("/tmp/my_script.php '".$my_url."' '".$my_refer."'");

    // echo $pc;
    if ($ret==null)
        echo "nothin";
    else 
        if(mysqli_query($conn, $model)){
            echo "<br/><br/><br/>";
            echo $ret;
        }
}
?>