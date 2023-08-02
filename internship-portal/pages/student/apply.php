<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

include "../../connect/connect.php";

// Retrieve the ID from the URL
$id = isset($_GET['id']) ? $_GET['id'] : 1;

// Retrieve the announcement title from the new_annoucement table
$sql = "SELECT announcement_title FROM new_annoucement WHERE announcement_id = $id";
$result = $db_connection->query($sql);

// Initialize the variable
$announcementTitle = "";

// Check if there is any announcement title
if ($result && $result->num_rows > 0) {
    // Fetch the announcement title
    $row = $result->fetch_assoc();
    $announcementTitle = $row['announcement_title'];
} else {
    $announcementTitle = "XYZ Pvt Ltd"; // Set a default announcement title
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $userName = $_POST['userName'];
    $admissionNo = $_POST['admissionNo'];
    $contact = $_POST['Contact'];
    $studentLocation = $_POST['StudentLocation'];
    $resume = $_FILES['resume'];

    // Retrieve the email from the session (assuming the email is stored in the session)
    $user_email = $_SESSION["email"];
    // After successful authentication, set the fullname session variable // Replace with the actual full name retrieved from the database
    $user_email = $_SESSION["email"];

// Fetch the full name associated with the logged-in email from the database
$sqlFullName = "SELECT fullname FROM users WHERE email = ?";
$stmtFullName = $db_connection->prepare($sqlFullName);
if (!$stmtFullName) {
    // If the prepare statement fails, display the SQL error message
    die("Prepare failed: " . $db_connection->error);
}

$stmtFullName->bind_param("s", $user_email);
$stmtFullName->execute();
$resultFullName = $stmtFullName->get_result();
$stmtFullName->close();

if ($resultFullName && $resultFullName->num_rows > 0) {
    // Fetch the full name
    $rowFullName = $resultFullName->fetch_assoc();
    $full_name_from_database = $rowFullName['fullname'];

    // Set the full name in the session variable
    $_SESSION["fullname"] = $full_name_from_database;
}
    

    // Check if the CertificatePath is not null for the given applicant and announcement ID
    $sqlCheckCertificate = "SELECT CertificatePath FROM internship_applications WHERE ID = ? AND CertificatePath IS NOT NULL AND StudentName = ?";
    $stmtCheckCertificate = $db_connection->prepare($sqlCheckCertificate);
    if (!$stmtCheckCertificate) {
        // If the prepare statement fails, display the SQL error message
        die("Prepare failed: " . $db_connection->error);
    }

    $stmtCheckCertificate->bind_param("is", $id, $StudentName);
    $stmtCheckCertificate->execute();
    $resultCheckCertificate = $stmtCheckCertificate->get_result();
    $stmtCheckCertificate->close();

    if (!$resultCheckCertificate || $resultCheckCertificate->num_rows === 0) {
        // If the CertificatePath is null or the certificate is not uploaded by the applicant, display an error message and don't proceed with the application
        $errorMessage = "Certificate not uploaded yet for the previous internship. Please upload your certificate before applying.";
    } elseif (isset($resume) && $resume['error'] === UPLOAD_ERR_OK) {
        // Specify the target directory to store the uploaded files
        $uploadFolder = "./CV_Uploads/";

        //original filename
        $originalFilename = $resume['name'];

        // Generate a filename based on the given format
        $filename = $userName . "_" . $announcementTitle . "_" . $admissionNo . ".pdf";

        // Read contents of the uploaded file 
        $fileContents = file_get_contents($resume['tmp_name']);

        // Convert the file contents to base64
        $pdfUrl = "data:application/pdf;base64," . base64_encode($fileContents);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($resume['tmp_name'], $uploadFolder . $filename)) {
            $sql = "INSERT INTO applications (student_name, admission_no, contact_no, student_location, cv_file, application_date, company_name, announcement_id, resume, email) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)";
            $stmt = $db_connection->prepare($sql);
            if (!$stmt) {
                // If the prepare statement fails, display the SQL error message
                die("Prepare failed: " . $db_connection->error);
            }

            $stmt->bind_param("ssssssiss", $userName, $admissionNo, $contact, $studentLocation, $filename, $announcementTitle, $id, $pdfUrl, $user_email);
            $stmt->execute();
            $stmt->close();

            // Display success message
            $successMessage = "Successfully applied for $announcementTitle.<br>You have successfully registered for $announcementTitle. Please keep checking your email inbox for further updates.";
        } else {
            $errorMessage = "Please select a valid PDF file.";
        }
    }
}

// Close the database connection
$db_connection->close();
?>
<body>
    <?php include_once("../../components/navbar/index.php"); ?>

    <div class="container my-2 greet">
        <p>Applying for <?php echo $announcementTitle; ?></p>
        <p>Welcome, <?php echo isset($_SESSION["fullname"]) ? $_SESSION["fullname"] : 'Guest'; ?></p>

    </div>


    <div class="container my-3" id="content">
        <div class="container my-3 text-justify" id="content">
            <div class="bg-light p-5 rounded">
                <?php if (isset($successMessage)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $successMessage; ?>
                    </div>
                <?php elseif (isset($errorMessage)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php endif; ?>  

                <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <strong for="userName" class="form-label">Student Full Name</strong>
                        <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="userName" id="userName" placeholder="John Richard Doe">
                    </div>
                    <div class="col-12">
                        <strong for="admissionNo" class="form-label">Admission Number</strong>
                        <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="admissionNo" id="admissionNo" placeholder="2099SM4004">
                    </div>
                    <div class="col-12">
                        <strong for="Contact" class="form-label">Contact No.</strong>
                        <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="Contact" id="Contact" placeholder="987654210">
                    </div>
                    <div class="col-12">
                        <strong for="StudentLocation" class="form-label">Student Location</strong>
                        <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="StudentLocation" id="StudentLocation" placeholder="e.g. Panvel">
                    </div>
                    <div class="col-12">
                        <strong for="resume" class="form-label">Upload CV</strong>
                        <input type="file" accept=".pdf" class="form-control" spellcheck="false" required autocomplete="off" name="resume" id="resume">
                        <br>
                        <div class="text">
                            <strong for="resume" class="form-label">Note! :-</strong>
                            <small for="resume" class="form-label">
                                <i>
                                    CV format
                                    <br>
                                    <b class="text-danger bg-warning">Student-name_Company-name_Admission-no.pdf</b>
                                    <br>
                                    (JohnDoe_MarkIndustries_2000PE0400.pdf)
                                </i>
                            </small>
                        </div>
                    </div>
                    <div class="container text-center">
                        <div class="row mx-auto">
                            <div class="col mt-3">
                                <button class="btn btn-primary btn-lg col-md-12" role="button" name="submit">Apply</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
