<?php
// Db connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upload";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving company name 
$companyName = isset($_GET["company"]) ? $_GET["company"] : '';

//inner join
$sql = "SELECT students.StudentName, students.Major
        FROM students
        INNER JOIN companies ON students.IDs = companies.IDs
        WHERE companies.CompanyName = '$companyName'";

$result = $conn->query($sql);


if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

//csv
$filename = $companyName.'_students.csv';
$file = fopen($filename, 'w');


fputcsv($file, array('Student Name','Major'));


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
