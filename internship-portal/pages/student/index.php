<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>
<!-- <?php
// require './auth.php'; -->
// if (!isset($_SESSION['login_id'])) {
//     $location = "../login/index.php";
//     header('Location: ' . $location);
//     exit;
// }
// $id = $_SESSION['student_auth_id'];

// $get_user = mysqli_query($db_connection, "SELECT * FROM `Users` WHERE `google_id`='$id'");

// if (mysqli_num_rows($get_user) > 0) {
//     $user = mysqli_fetch_assoc($get_user);
// }
// else{
//     header('Location: logout.php');
//     exit;
// }
?>

<body>
    <div class="ghi">
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Welcome, Pratik</p>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                <a href="./new.php" class="btn btn-primary btn-lg col-md-12 p-sm-4" role="button">New
                    Application</a>
            </div>
            <div class="col my-3">
                <a href="./previous.php" class="btn btn-warning btn-lg col-md-12 p-sm-4" role="button">Previous
                    Applications</a>
            </div>
        </div>
    </div>
    <?php
    include_once("../../components/announcement/index.php");
    ?>

    <?php
    include_once("../../components/student-profile/index.php");
    ?>
</div>

<!-- <div class="gj"></div>
<style>
.gj{
height:5rem;
width:5rem;
background-color: #999;
z-index:5000;
cursor: pointer;

}

.cv{
    height:100vh;
    width:100vw;
    z-index:10000;
    position: absolute;
    top:0;
}

</style> -->
<script>
const gj = document.querySelector('.gj')

gj.addEventListener('click',()=>{
   gj.classList.add('cv');

})

</script>

   <!-- <script  src="script.js"></> -->
</body>

</html>