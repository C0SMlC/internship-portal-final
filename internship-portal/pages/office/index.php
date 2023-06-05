<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>
<?php
require './auth.php';
?>
<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>

    
   
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                <a href="./approved.php" class="btn btn-success btn-lg col-md-12 p-sm-4" role="button">Approved
                    Applications</a>
            </div>
            <div class="col my-3">
                <a href="./rejected.php" class="btn btn-danger btn-lg col-md-12 p-sm-4" role="button">Rejected
                    Applications</a>
            </div>
        </div>
    </div>



</body>

</html>