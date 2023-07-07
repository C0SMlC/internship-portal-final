<?php
$title = "Decision";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upload";

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
    $sql = "SELECT * FROM student_info WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $id = $student['id'];
        $company = $student['company'];
        $appliedOn = $student['appliedOn'];
        $startDate = $student['startDate'];
        $endDate = $student['endDate'];
        $type = $student['type'];
        $class = $student['class'];

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
        echo "<label for='company' class='form-label'><strong>Company</strong></label>";
        echo "<input type='text' class='form-control' id='company' value='$company' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='appliedOn' class='form-label'><strong>Applied On</strong></label>";
        echo "<input type='text' class='form-control' id='appliedOn' value='$appliedOn' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='startDate' class='form-label'><strong>Start Date</strong></label>";
        echo "<input type='text' class='form-control' id='startDate' value='$startDate' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='endDate' class='form-label'><strong>End Date</strong></label>";
        echo "<input type='text' class='form-control' id='endDate' value='$endDate' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='type' class='form-label'><strong>Type</strong></label>";
        echo "<input type='text' class='form-control' id='type' value='$type' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='class' class='form-label'><strong>Class</strong></label>";
        echo "<input type='text' class='form-control' id='class' value='$class' readonly>";
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
    if (isset($_POST["comment"]) && isset($_POST["status"]) && isset($_POST["company"]) && isset($_POST["appliedOn"]) && isset($_POST["startDate"]) && isset($_POST["endDate"]) && isset($_POST["type"]) && isset($_POST["class"])) {
        // Get the form data
        $comment = $_POST["comment"];
        $status = $_POST["status"];
        $company = $_POST["company"];
        $appliedOn = $_POST["appliedOn"];
        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];
        $type = $_POST["type"];
        $class = $_POST["class"];

        if ($status === "Approved") {
            $table = "approved_data";
        } else {
            $table = "rejected_data";
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO feedback (id, comment, status, company, appliedOn, startDate, endDate, type, class, approvedOn) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())");
        $stmt->bind_param("sssssssss", $id, $comment, $status, $company, $appliedOn, $startDate, $endDate, $type, $class);
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
    <p>Application ID: <?php echo $_GET['id']; ?></p>
</div>

<div class="container my-3" id="content">
    <div class="bg-light p-5 rounded">
        <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="mb-3">
                <label for="inputComment" class="form-label"><strong>Comment</strong></label>
                <textarea class="form-control" id="inputComment" name="comment" rows="10" placeholder="e.g. Please collect the approval letter from the office"></textarea>
            </div>
            <div class="container text-center">
                <div class="row mx-auto">
                    <div class="col mt-3">
                        <button class="btn btn-success btn-lg col-md-12 p-sm-4" name="status" value="Approved" type="submit">Approve</button>
                    </div>
                    <div class="col my-3">
                        <button class="btn btn-danger btn-lg col-md-12 p-sm-4" name="status" value="Rejected" type="submit">Reject</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="company" value="<?php echo $company; ?>">
            <input type="hidden" name="appliedOn" value="<?php echo $appliedOn; ?>">
            <input type="hidden" name="startDate" value="<?php echo $startDate; ?>">
            <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="hidden" name="class" value="<?php echo $class; ?>">
        </form>
    </div>
</div>
</body>
</html>

