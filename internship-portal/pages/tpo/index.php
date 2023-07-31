<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
session_start();

$id = isset($_GET["user_id"]) ? $_GET["user_id"] : "";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo "<script>window.location.href='./Login-System-master/login.php'</script>";
    exit;
}

?>

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>


    <div class="container my-2 greet">
        <p>Applications</p>
        <div class="col-md-8">
        </div>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                
                <a href="./active.php?user_id=<?php echo urlencode($id) ?>" class="btn btn-primary btn-lg col-md-12 p-sm-4" role="button">Active Internships</a>
            </div>
            <div class="col my-3">
                <a href="./studentAppli.php?user_id=<?php echo urlencode($id) ?>" class="btn btn-warning btn-lg col-md-12 p-sm-4" role="button">Student
                    Applications</a>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                <a href="./approved.php?user_id=<?php echo urlencode($id) ?>" class="btn btn-success btn-lg col-md-12 p-sm-4" role="button">Approved
                    Applications</a>
            </div>
            <div class="col my-3">
                <a href="./rejected.php?user_id=<?php echo urlencode($id) ?>" class="btn btn-danger btn-lg col-md-12 p-sm-4" role="button">Rejected
                    Applications</a>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-2 greet">
        <p>Annoucements</p>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col-6 mt-3">
                <a href="./new.php?user_id=<?php echo urlencode($id) ?>" class="btn btn-warning btn-lg col-md-12 p-sm-4" role="button">New Annoucement</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>



</body>

</html>
