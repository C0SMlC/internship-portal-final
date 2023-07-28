<?php
//session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "internship_portal";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Failed to connect");
}

// $fac_id = isset($_GET['id']) ? $_GET['id'] : null;
// $_SESSION['fac_id'] = $fac_id;
//$fac_id = $_SESSION['id'];
function update_data($con) {
  $fac_id = $_SESSION['id'];
 
  // Retrieve the data from the database
  $query = "SELECT * FROM faculty_panel WHERE fac_id = $fac_id"; // Replace 'faculty_panel' with the actual table name
  $result = mysqli_query($con, $query);

  // Check if the data exists in the database
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    //$fac_email = $row['fac_email'];
    return $row;
  }

  // If no data exists in the database, return hardcoded values
  return array(
    'fac_name' => 'John Smith',
    'fac_email' => 'john@example.com',
    'fac_age' => 30,
    'fac_mobile' => '1234567890',
    'fac_address' => '123 Street, City'
  );
}

function update_existing_data($con, $fullName, $email, $age, $mobile, $address) {
  $fac_id = $_SESSION['id'];

  // Update the data in the database
  $query = "UPDATE faculty_panel SET fac_name = '$fullName', fac_email = '$email', fac_age = '$age', fac_mobile = '$mobile', fac_address = '$address' WHERE fac_id = $fac_id"; // Replace 'faculty_panel' with the actual table name and adjust the condition as needed
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


