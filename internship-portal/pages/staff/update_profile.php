<?php
require '../../components/faculty-profile/connect.php';

// Check if $_POST data is available before calling update_data function
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['mobile']) && isset($_POST['address'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

   if (update_existing_data($con, $fullName, $email, $age, $mobile, $address)) {
    echo "Data updated successfully.";
    header("Location:./index.php");
    //echo "<a onclick=\"goToHomeScreen()\" style=\"cursor: pointer; color: blue;\">Go back to Home Screen</a>";
    } else {
    echo "Failed to update data.";
    echo "<a onclick=\"goToHomeScreen()\" style=\"cursor: pointer; color: blue;\">Go back to Home Screen</a>";

    }

    echo "<script>
    function goToHomeScreen() {
        window.location.href = 'http://localhost/internship-portal-final/internship-portal/pages/staff'; // Replace with your home screen URL
    }
    </script>";

}
?>
