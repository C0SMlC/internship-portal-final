<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

// Require the PhpSpreadsheet library
require_once 'C:\wamp64\www\internship-portal-final\InternshipPortal\Google-Login\vendor\autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upload";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$per_page_record = 20; // Number of records to display per page
$start = ($page - 1) * $per_page_record;

// Search functionality
$search = isset($_GET["search"]) ? $_GET["search"] : "";
$searchedData = [];

// Fetch data from the database table
if (!empty($search)) {
    $sql = "SELECT * FROM student_info WHERE id LIKE '%$search%' OR company_name LIKE '%$search%' LIMIT $start, $per_page_record";
} else {
    $sql = "SELECT * FROM student_info LIMIT $start, $per_page_record";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $searchedData[] = $row;
    }
}

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set headers
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Company');
$sheet->setCellValue('C1', 'Applied On');
$sheet->setCellValue('D1', 'Start Date');
$sheet->setCellValue('E1', 'End Date');
$sheet->setCellValue('F1', 'Type');
$sheet->setCellValue('G1', 'Class');
$sheet->setCellValue('H1', 'Resume');

// Fill in the data
$row = 2;
foreach ($searchedData as $student) {
    $sheet->setCellValue('A' . $row, $student['id']);
    $sheet->setCellValue('B' . $row, $student['company_name']);
    $sheet->setCellValue('C' . $row, $student['appliedOn']);
    $sheet->setCellValue('D' . $row, $student['startDate']);
    $sheet->setCellValue('E' . $row, $student['endDate']);
    $sheet->setCellValue('F' . $row, $student['type']);
    $sheet->setCellValue('G' . $row, $student['class']);
    $sheet->setCellValue('H' . $row, $student['resume']);
    $row++;
}

// Set the column widths
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(30);

// Create a writer and save the spreadsheet as an Excel file
$writer = new Xlsx();
$writer->save('your_file_path_here.xlsx');
?>