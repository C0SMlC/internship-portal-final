<?php
//  Load the database configuration file 
include "../../connect/connect.php";

// // Filter the excel data 
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// // Excel file name for download 
$fileName = "applicant-data_" . date('Y-m-d') . ".xls";

// // Column names 
$fields = array('ID', 'Applicant Name', 'Resume_link','Applied_at');

// // Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";



// // Fetch records from database 
$data_search = "SELECT ID,Firstname,Lastname,Resume_Link,CreatedAt FROM `applicant_data`";
$query = mysqli_query($db_connection, $data_search);
if ($query->num_rows > 0) {
    // Output each row of the data 
    while ($row = mysqli_fetch_array($query)) {
        $applicant_name = $row['Firstname'] . " " . $row['Lastname'];
        $lineData = array($row['ID'], $applicant_name, $row['Resume_Link'],$row['CreatedAt']);
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'No records found...' . "\n";
}

// // Headers for download 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

// // Render excel data 
echo $excelData;
?>