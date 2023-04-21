<?php
include './connect.php';

// if(!empty($_POST['pr']) && !empty($_POST['co'])){
$id = $_GET['id'];
$pr = $_POST['pr'];
$co = $_POST['co'];

$updateq = "UPDATE `pr_and_co` SET `prompts`='".$pr."',`completions`='".$co."' WHERE id='".$id."'";
if (mysqli_query($conn, $updateq)) {
    echo '<script>
    alert("Rcord Updated Successfully");
    window.location.href="../profile.php";
    </script>';
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
// }
?>