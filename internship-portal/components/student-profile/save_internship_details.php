<?php
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$con = mysqli_connect('localhost', 'root', '', 'internship_portal');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $announcementTitle = $_POST["announcement_title"];
  $position = $_POST["position"];

  // Perform the database update here
  // Example:
  $queryUpdatePosition = "UPDATE internship_info SET position_column_name = '$position' WHERE announcement_title_column_name = '$announcementTitle'";
  mysqli_query($con, $queryUpdatePosition);

  // Return a response to the frontend
  echo "success";
}
?>
