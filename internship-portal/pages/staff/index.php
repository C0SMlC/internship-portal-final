<?php
//session_start();
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
//Check if the user is logged in
// if (!isset($_SESSION['fac_id'])) {
//     // Redirect to the login page if the user is not logged in
//    header("Location:./login.php");
//    // exit();
// }
//session_start();

$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
include "../../connect/connect.php";

$fac_id = $_SESSION['id'];
$fac_name = $_SESSION['username'];

//$fac_id = 16;
// $sql = "select * from faculty_panel where fac_id = $fac_id";
// $result = mysqli_query($db_connection, $sql);

// if ($result) {
//     // Fetch the data as an associative array
//     $row = mysqli_fetch_assoc($result);

//     // Access the 'fac_name' field from the fetched row
//     $fac_name = $row['fac_name'];
// } else {
//     // Handle the case where the query failed
//     // For example, display an error message or log the error
//     $fac_name = " ";
// }
?>
<!-- Auth -->

<body>
    <div class="ghv">
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Welcome , <?php echo $fac_name; ?></p>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                <a href="./new.php" class="btn btn-primary btn-lg col-md-12 p-sm-4" role="button">New
                    Announcement</a>
            </div>
            <div class="col my-3">
                <a href="./previous.php" class="btn btn-warning btn-lg col-md-12 p-sm-4" role="button">Previous
                    Announcements</a>
            </div>
        </div>
    </div>



    <?php
    include_once("../../components/announcement/index1.php");
    ?>

    <?php
    include_once("../../components/faculty-profile/index.php");
    ?>

</div>
<div class="row justify-content-center">

    <a href="./logout.php" class="btn btn-primary" style="width:50%;">Log Out</a>
</div>
</body>

</html>