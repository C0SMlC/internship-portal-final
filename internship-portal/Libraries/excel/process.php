<?php
// Load the database configuration file
include "../../connect/connect.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

// Fetch company name from the database
$companyNameQuery = "SELECT company_name FROM `applications` WHERE announcement_id = $id LIMIT 1";
$companyNameResult = mysqli_query($db_connection, $companyNameQuery);
$companyName = "company-name"; // Default company name if not found in the database

if ($companyNameResult && mysqli_num_rows($companyNameResult) > 0) {
    $companyData = mysqli_fetch_assoc($companyNameResult);
    $companyName = $companyData['company_name'];
}

// Filter the CSV data
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Fetch records from the database
$data_search = "SELECT id, student_name, company_name, admission_no, contact_no, student_location, action, cv_file FROM `applications` WHERE announcement_id = $id";
$query = mysqli_query($db_connection, $data_search);

// Check if the query executed successfully
if ($query) {
    // CSV file name for download
    $fileName = $companyName . "_applicants_" . date('Y-m-d') . ".csv";

    // Column names
    $fields = array('ID', 'Applicant Name', 'Admission No', 'Contact No', 'Location', 'Resume Link', 'Company Name', 'Action');

    // Display column names as the first row
    $csvData = implode(",", array_values($fields)) . "\n";

    if (mysqli_num_rows($query) > 0) {
        // Output each row of the data
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $studentName = $row['student_name'];
            $companyName = $row['company_name'];
            $admissionNo = $row['admission_no'];
            $contactNo = $row['contact_no'];
            $location = isset($row['location']) ? $row['location'] : '';
            $filename = $row['cv_file'];
            $action = $row['action'];

            // Generate the resume link using a placeholder URL
            $resumeLink = "http://localhost/internship-portal-final/internship-portal/pages/student/CV_Uploads/" . $filename; // Update with your local server URL or temporary URL

            // Create a clickable hyperlink for the resume link
            $resumeLinkHtml = '<a href="' . $resumeLink . '" target="_blank">View Resume</a>';

            // Write the data to the CSV file
            $lineData = array(
                $id,
                $studentName,
                $admissionNo,
                $contactNo,
                $location,
                $resumeLinkHtml,
                $companyName,
                $action
            );
            array_walk($lineData, 'filterData');
            $csvData .= implode(",", array_values($lineData)) . "\n";
        }
    } else {
        $csvData .= 'No records found...' . "\n";
    }

    // Headers for download
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    // Render CSV data
    echo $csvData;
} else {
    echo "Query execution failed.";
}
?>
