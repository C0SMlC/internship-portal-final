<?php
$title = "Login";
$style = "./index.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>
<?php
require '../../connect/connect.php';

if (isset($_SESSION['student_auth_id'])) {
    $location = "../student/index.php";
    header('Location: ' . $location);
    exit;
} else if (isset($_SESSION['admin_auth_id'])) {
    $location = "../admin/index.php";
    header('Location: ' . $location);
    exit;
} else if (isset($_SESSION['tpo_auth_id'])) {
    $location = "../tpo/index.php";
    header('Location: ' . $location);
    exit;
} else if (isset($_SESSION['staff_auth_id'])) {
    $location = "../staff/index.php";
    header('Location: ' . $location);
    exit;
} else if (isset($_SESSION['office_auth_id'])) {
    $location = "../office/index.php";
    header('Location: ' . $location);
    exit;
}

require '../../../InternshipPortal/Google-Login/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('231703390647-r0gf1o95dsf9km8u4qcdk7qesoavcig3.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/InternshipPortal/pages/login/index.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code'])) :

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token["error"])) {

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `user_type` FROM `Users` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {
            $fetch_user_type = mysqli_fetch_assoc($get_user);

            if ($fetch_user_type['user_type'] == "Admin") {
                $_SESSION['admin_auth_id'] = $id;
                $location = "../admin/index.php";
                header('Location: ' . $location);
                exit;
            } else if ($fetch_user_type['user_type'] == "Office") {
                $_SESSION['office_auth_id'] = $id;
                $location = "../office/index.php";
                header('Location: ' . $location);
                exit;
            } else if ($fetch_user_type['user_type'] == "Tpo") {
                $_SESSION['tpo_auth_id'] = $id;
                $location = "../tpo/index.php";
                header('Location: ' . $location);
                exit;
            } else if ($fetch_user_type['user_type'] == "Student") {
                $_SESSION['student_auth_id'] = $id;
                $location = "../student/index.php";
                header('Location: ' . $location);
                exit;
            } else if ($fetch_user_type['user_type'] == "Staff") {
                $_SESSION['staff_auth_id'] = $id;
                $location = "../staff/index.php";
                header('Location: ' . $location);
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        } else {
            $user_type = "";
            if ($email == "nimbartehima19m@student.mes.ac.in") {
                $user_type = "Admin";
            } else if ($email == "myadav20ecs@student.mes.ac.in") {
                $user_type = "Staff";
            } else if ($email == "kohadkarhasa19et@student.mes.ac.in") {
                $user_type = "Office";
            } else {
                if (strlen($user_type) == 0) {
                    $splitted = explode("@", $email);
                    if ($splitted[1] == "student.mes.ac.in") {
                        $user_type = "Student";
                    } else if ($splitted[1] == "mes.ac.in") {
                        $user_type = "Staff";
                    }
                }
            }
            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `Users`(`google_id`,`name`,`email`,`user_type`) VALUES('$id','$full_name','$email','$user_type')");

            if ($insert) {
                if ($user_type == "Admin") {
                    $_SESSION['admin_auth_id'] = $id;
                    $location = "../admin/index.php";
                    header('Location: ' . $location);
                    exit;
                } else if ($user_type == "Office") {
                    $_SESSION['office_auth_id'] = $id;
                    $location = "../office/index.php";
                    header('Location: ' . $location);
                    exit;
                } else if ($user_type == "Tpo") {
                    $_SESSION['tpo_auth_id'] = $id;
                    $location = "../tpo/index.php";
                    header('Location: ' . $location);
                    exit;
                } else if ($user_type == "Student") {
                    $_SESSION['student_auth_id'] = $id;
                    $location = "../student/index.php";
                    header('Location: ' . $location);
                    exit;
                } else if ($user_type == "Staff") {
                    $_SESSION['staff_auth_id'] = $id;
                    $location = "../staff/index.php";
                    header('Location: ' . $location);
                    exit;
                } else {
                    echo "Sign up failed!(Something went wrong).";
                }
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {
        $location = "./index.php";
        header('Location: ' . $location);
        exit;
    }

else :
?>


    <body>
        <div class="outerGrid">
            <div class="Main">
                <div class="first">
                    <img src="../../assets/logo.jpeg" class="logo" alt="...">
                </div>
                <div class="second">
                    <div class="imageContainer">
                        <img src="../../assets/College.png" class="image1" alt="...">
                        <img src="../../assets/Google.png" class="image2" alt="...">
                    </div>
                    <div class="signInText">
                        <p class="pceTitle">PCE Internship Portal</p>
                        <p class="mailDesc">
                            Sign in with Student MES Account Only
                        </p>
                    </div>
                    <a class="btn btn-sm btn-danger" href=<?php echo $client->createAuthUrl(); ?> role="button">Sign-in with Google</a>
                </div>
            </div>


        </div>
    </body>

    </html>
<?php endif; ?>