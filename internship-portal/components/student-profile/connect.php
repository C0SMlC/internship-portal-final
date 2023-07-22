<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "internship_portal";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Failed to connect");
}

function get_student_data($con, $studentId = 15) {
  $query = "SELECT * FROM student WHERE s_id = $studentId";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    return $row;
  }

  return null;
}

function update_existing_data($con, $fullName, $email, $age, $mobile, $address, $studentId = 15) {
  $query = "UPDATE student SET s_name = '$fullName', s_email = '$email', s_age = '$age', s_mobile = '$mobile', s_address = '$address' WHERE s_id = $studentId";
  $result = mysqli_query($con, $query);

  if ($result) {
    return true; // Return true if the update was successful
  } else {
    return false; // Return false if the update failed
  }
}
?>
