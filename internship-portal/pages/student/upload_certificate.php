<?php
// upload_certificate.php

// Database connection settings
$host = "localhost";
$username = "root";
$password = "";
$database = "internship_portal";

// Connect to your database
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection settings
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "internship_portal";

    // Connect to your database
    $connection = mysqli_connect($host, $username, $password, $database);
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST["application_id"]) && isset($_FILES["certificate_file"])) {
        $application_id = $_POST["application_id"];
        $file_name = $_FILES["certificate_file"]["name"];
        $file_tmp = $_FILES["certificate_file"]["tmp_name"];

        // Define the directory path where certificates will be stored
        $certificatesDirectory = "C:/wamp64/www/internship-portal-final/internship-portal/pages/student/certificates/";

        // Move the uploaded file to the certificates directory
        if (move_uploaded_file($file_tmp, $certificatesDirectory . $file_name)) {
            // File moved successfully
            // Update the database with the certificate path
            $certificate_path = $certificatesDirectory . $file_name;
            $update_query = "UPDATE internship_applications SET CertificatePath = '$certificate_path' WHERE ID = '$application_id'";
            $result = mysqli_query($connection, $update_query);
            if ($result) {
                header("Location: previous.php?success=2");
                exit();
            } else {
                die("Database update failed: " . mysqli_error($connection));
            }
        } else {
            die("Failed to move uploaded file.");
        }
    } else {
        die("Invalid request.");
    }

    // Close the database connection
    mysqli_close($connection);

} else {
    die("Invalid request method.");
}
