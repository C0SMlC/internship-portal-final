<?php
// Db connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship_portal";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving company name 
$companyName = isset($_GET["announcement_title"]) ? $_GET["announcement_title"] : '';

//inner join
$sql = "SELECT student_name, admission_no , contact_no
        FROM applications
        
        WHERE announcement_title = '$companyName' and action = 'Approved' ";

$result = $conn->query($sql);


if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

//csv
$filename = $companyName.'_students.csv';
$file = fopen($filename, 'w');


fputcsv($file, array('Student Name','Admission No', 'Contact No'));


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }
}


fclose($file);


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=' . $filename);
header('Pragma: no-cache');
header('Expires: 0');


readfile($filename);


unlink($filename);


$conn->close();
?>