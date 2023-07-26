<?php
// ...
include "../../connect/connect.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    // Handle case when no ID is provided
    header("Location: registrations.php");
    exit;
}

// Retrieve the file data from the database
$sql = "SELECT cv_file, resume FROM applications WHERE id = ?";
$stmt = $db_connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Handle case when no data is found
    header("Location: registrations.php");
    exit;
}

$row = $result->fetch_assoc();
$filename = $row['cv_file'];
$fileData = $row['resume'];


$stmt->close();

// Set the appropriate headers for PDF output
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '.pdf"');

header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

// Output the binary data directly using readfile()
readfile($fileData);
exit;
?>
