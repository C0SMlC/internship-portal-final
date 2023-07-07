<?php
$title = "Response";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

// Get the action from the query string
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Set the color based on the action
$boxColor = ($action === '') ? 'green' : 'red';
?>

<body>
    <?php include_once("../../components/navbar/index.php"); ?>
    <div class="container">
        <div class="response-box <?php echo $boxColor; ?>">
            <div style="text-align: center;">
                <h2 style="margin-bottom: 7vh;">Announcement added successfully.</h2>
                <a href="./index.php" class="btn btn-primary btn-sm col-md-2 p-sm-4" role="button">Go Back</a>
            </div>
        </div>
    </div>
</body>

</html>


