<?php
// save_internship_details.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
    $con = mysqli_connect('localhost', 'root', '', 'internship_portal');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    if (isset($_POST['announcement_title']) && isset($_POST['type']) && isset($_POST['text'])) {
        $announcementTitle = $_POST['announcement_title'];
        $type = $_POST['type'];
        $text = $_POST['text'];

        // Sanitize and validate the data before saving it to the database to prevent SQL injection and other security issues
        $announcementTitle = mysqli_real_escape_string($con, $announcementTitle);
        $type = mysqli_real_escape_string($con, $type);
        $text = mysqli_real_escape_string($con, $text);

        // Assuming you have a table named 'internship_details' to store the data
        $query = "INSERT INTO internship_details (announcement_title, type, text) VALUES ('$announcementTitle', '$type', '$text')
                  ON DUPLICATE KEY UPDATE text = '$text'"; // Use ON DUPLICATE KEY UPDATE to update the text if the announcement_title and type combination already exists

        if (mysqli_query($con, $query)) {
            echo "Text saved successfully!";
        } else {
            echo "Failed to save text. Please try again.";
        }
    } else {
        echo "Invalid request parameters.";
    }

    mysqli_close($con);
} else {
    echo "Invalid request method.";
}
?>
