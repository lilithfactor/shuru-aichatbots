<?php
// Connect to MySQL database
session_start();
include './db/connect.php';
$ses = $_SESSION['sessionid'];

// Query MySQL table and select particular columns
$sql = "SELECT prompts,completions FROM pr_and_co where session_id = '$ses'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){ 
    $delimiter = ","; 
    $filename = "data.csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('PROMPTS', 'COMPLETITIONS'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = mysqli_fetch_assoc($result)){ 
        // $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['prompts'], $row['completions']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
 
exit; 
 

?>
