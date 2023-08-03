<?php
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
    
    // Check if the file already exists (optional)
    if (file_exists($targetFile)) {
        echo "Error: File already exists.";
        exit;
    }

    // Move the uploaded file to the desired location
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile)) {
        echo "Success: The file has been uploaded.";
        // Additional processing or displaying logic can be done here

        // Update the profile image URL in the database (example code)
        // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
        $con = mysqli_connect('localhost', 'root', '', 'internship_portal');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Get the student ID from the session or any other way you manage sessions/user authentication
        $student_id = 1; // Replace with the actual student ID

        // Update the profile image URL in the database
        $profileImageUrl = "Profile_Images/" . basename($_FILES["imageUpload"]["name"]);
        $updateQuery = "UPDATE students SET profile_image_url = '$profileImageUrl' WHERE student_id = $student_id";
        if (mysqli_query($con, $updateQuery)) {
            echo "Profile image URL updated in the database.";
        } else {
            echo "Error updating profile image URL in the database: " . mysqli_error($con);
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        echo "Error: Unable to upload the file.";
    }
} else {
    echo "Error: No file was uploaded or an error occurred during upload.";
}
?>
