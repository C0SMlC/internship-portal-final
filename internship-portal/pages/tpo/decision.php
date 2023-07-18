<?php
$title = "Decision";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship_portal";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the student's data from the database
    $sql = "SELECT * FROM applications WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $id = $student['id'];
        $announcement_title = $student['announcement_title'];
        $student_name = $student['student_name'];
        $admission_no = $student['admission_no'];
        $contact_no = $student['contact_no'];
        $student_location = $student['student_location'];
        $application_date = $student['application_date'];

        // Display the student's information as a non-editable form
        echo "<form>";
        echo "<div class='container my-2 greet'>";
        echo "<p>Student Application</p>";
        echo "</div>";
        echo "<div class='container my-3' id='content'>";
        echo "<div class='bg-light p-5 rounded'>";
        echo "<div class='mb-3'>";
        echo "<label for='id' class='form-label'><strong>ID</strong></label>";
        echo "<input type='text' class='form-control' id='id' value='$id' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='announcement_title' class='form-label'><strong>Company Name</strong></label>";
        echo "<input type='text' class='form-control' id='announcement_title' value='$announcement_title' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='student_name' class='form-label'><strong>Student Name</strong></label>";
        echo "<input type='text' class='form-control' id='student_name' value='$student_name' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='admission_no' class='form-label'><strong>Admission No</strong></label>";
        echo "<input type='text' class='form-control' id='admission_no' value='$admission_no' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='contact_no' class='form-label'><strong>Contact No</strong></label>";
        echo "<input type='text' class='form-control' id='contact_no' value='$contact_no' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='student_location' class='form-label'><strong>Student Location</strong></label>";
        echo "<input type='text' class='form-control' id='student_location' value='$student_location' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='application_date' class='form-label'><strong>Application Date</strong></label>";
        echo "<input type='text' class='form-control' id='application_date' value='$application_date' readonly>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</form>";
    } else {
        echo "Student not found.";
    }
} else {
    echo "ID parameter is missing.";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && isset($_POST["comment"]) && isset($_POST["id"])) {
        // Get the form data
        $id = $_POST["id"];
        $action = $_POST["action"];
        $comment = $_POST["comment"];

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("UPDATE applications SET action = ?, comment = ? WHERE id = ?");
        $stmt->bind_param("sss", $action, $comment, $id);
        $stmt->execute();

        // Close the statement
        $stmt->close();

        // Redirect to a success page or perform any other actions
        header("Location: success.php");
        exit();
    }
}
?>

<div class="container my-2 greet">
    <p>Application ID: <?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?></p>
</div>

<div class="container my-3" id="content">
    <div class="bg-light p-5 rounded">
        <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="mb-3">
                <label for="inputComment" class="form-label"><strong>Comment</strong></label>
                <textarea class="form-control" id="inputComment" name="comment" rows="10" placeholder="e.g. Please collect the approval letter from the office"></textarea>
            </div>
            <div class="container text-center">
                <div class="row mx-auto">
                    <div class="col mt-3">
                        <button class="btn btn-success btn-lg col-md-12 p-sm-4" name="action" value="Approved" type="submit">Approve</button>
                    </div>
                    <div class="col my-3">
                        <button class="btn btn-danger btn-lg col-md-12 p-sm-4" name="action" value="Rejected" type="submit">Reject</button>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="announcement_title" value="<?php echo $announcement_title; ?>">
            <input type="hidden" name="student_name" value="<?php echo $student_name; ?>">
            <input type="hidden" name="admission_no" value="<?php echo $admission_no; ?>">
            <input type="hidden" name="contact_no" value="<?php echo $contact_no; ?>">
            <input type="hidden" name="student_location" value="<?php echo $student_location; ?>">
            <input type="hidden" name="application_date" value="<?php echo $application_date; ?>">
            <?php } ?>
        </form>
    </div>
</div>
</body>
</html>
