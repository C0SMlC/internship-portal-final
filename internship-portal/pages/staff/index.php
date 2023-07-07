<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>
<!-- Auth -->

<body>
    <div class="ghv">
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Welcome , XYZ</p>
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
    include_once("../../components/announcement/index.php");
    ?>

    <?php
    include_once("../../components/faculty-profile/index.php");
    ?>

</div>
</body>

</html>