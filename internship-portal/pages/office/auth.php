<?php 
require '../../connect/connect.php';

if (!isset($_SESSION['office_auth_id'])) {
    $location = "../login/index.php";
    header('Location: ' . $location);
    exit;
}
?>