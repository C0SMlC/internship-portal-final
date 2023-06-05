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
    <div class="container my-2 greet">
        <p>Custom Letter Addressing</p>
    </div>
    <div class="container my-3" id="content">
        <div class="bg-light p-5 rounded">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">

                <div class="col-12">
                    <strong for="Title" class="form-label">Application ID</strong>
                    <br>
                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="Title" id="Title" placeholder="e.g. ABC pvt. ltd. hiring interns for XYZ fields....">
                </div>
                <br>
                <div class="col-12">
                    <strong for="Stipend" class="form-label">Address To</strong>
                    <br>
                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="Stipend" id="Stipend" placeholder="e.g. General Manager, Director, Office in-charge">
                </div>
                <div class="col-12">
                    <strong for="Duration" class="form-label">Name  <small> <i>(optional)</i></small> </strong>
                    <br>
                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="Duration" id="Duration" placeholder="Number (In Months)">
                </div>
                <br>
                <div class="container text-center">
                    <div class="row mx-auto">
                        <div class="col mt-5">
                            <button class="btn btn-success btn-lg col-md-12" role="button">Generate Letter</button>
                        </div>

                    </div>
                </div>



            </form>
        </div>
    </div>





</body>

</html>