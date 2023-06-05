<?php
$title = "Welcome";
$style = "./index.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="internWelcome">
        <div>
            <p>Welcome to PCE Internship Portal</p>
        </div>
        <div class="loginBtn">
            <a href="../login/index.php" class="btn btn-success btn-lg" role="button">Login</a>
        </div>
    </div>
    <?php
    include_once("../../components/announcement/index.php");
    ?>

</body>

</html>