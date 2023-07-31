<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
//include "../../connect/connect.php";

//session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "internship_portal";

if (!$db_connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Failed to connect");
}

if(isset($_SESSION['id'
]) && isset($_SESSION['username'])){
    $fac_id = $_SESSION['id'];
    $fac_name = $_SESSION['username'];
}else{
    header("Location:./login.php");
}

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