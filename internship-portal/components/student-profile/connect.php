<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "internship_portal";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Failed to connect");
}

function update_data($con) {
  // Retrieve the data from the database
  $query = "SELECT * FROM student WHERE s_id = 15"; // Replace 'student' with the actual table name
  $result = mysqli_query($con, $query);

  // Check if the data exists in the database
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    return $row;
  }

  // If no data exists in the database, return hardcoded values
  return array(
    's_name' => 'John Smith',
    's_email' => 'john@example.com',
    's_age' => 30,
    's_mobile' => '1234567890',
    's_address' => '123 Street, City'
  );
}

function update_existing_data($con, $fullName, $email, $age, $mobile, $address) {
  // Update the data in the database
  $query = "UPDATE student SET s_name = '$fullName', s_email = '$email', s_age = '$age', s_mobile = '$mobile', s_address = '$address' WHERE s_id = 15"; // Replace 'student' with the actual table name and adjust the condition as needed
  $result = mysqli_query($con, $query);

  if ($result) {
    return true; // Return true if the update was successful
  } else {
    return false; // Return false if the update failed
  }
}

// Check if $_POST data is available before calling update_data function
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['fullName']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['mobile']) && !empty($_POST['address'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    update_data($con, $fullName, $email, $age, $mobile, $address);
}

$update = update_data($con);
?>


