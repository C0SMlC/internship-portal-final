<?php
// Start the session if it is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$con = mysqli_connect('localhost', 'root', '', 'internship_portal');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_FILES["imageUpload"]) && $_FILES["imageUpload"]["error"] === UPLOAD_ERR_OK) {
    $targetDir = "Profile_Images/";
    $targetFile = $targetDir . basename($_FILES["imageUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Validate file type (optional)
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }

    // Move the uploaded file to the desired location
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile)) {
        // The file has been uploaded successfully.
        // Now update the student table with the profile image URL.
        if (isset($_SESSION['student_id'])) {
            $student_id = $_SESSION['student_id']; // Assuming you have the student_id in the session.

            // Escape the file path to prevent SQL injection
            $profileImageUrl = mysqli_real_escape_string($con, $targetFile);

            // Update the student table with the profile image URL
            $queryUpdateImage = "UPDATE student SET profile_image = '$profileImageUrl' WHERE student_id = '$student_id'";
            if (mysqli_query($con, $queryUpdateImage)) {
                echo "Success: The file has been uploaded and profile image updated.";
                // Additional processing or displaying logic can be done here
            } else {
                echo "Error: Unable to update the profile image in the database.";
            }
        } else {
            echo "Error: Student ID not found in the session.";
        }
    } else {
        echo "Error: Unable to upload the file.";
    }
} else {
    echo "Error: No file was uploaded or an error occurred during upload.";
}
?>
