<?php
$title = "Decision";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
include_once("../../connect/connect.php");

// Check if 'ID' parameter is set in the URL
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    // Fetch the student's data from the database
    $sql = "SELECT * FROM internship_applications WHERE ID = '$ID'";
    $result = $db_connection->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $ID = $student['ID'];
        $CompanyName = $student['CompanyName'];
        $CompanyAddress = $student['CompanyAddress'];
        $CompanyLocation = $student['CompanyLocation'];
        $startDate = $student['startDate'];
        $endDate = $student['endDate'];
        $branch = $student['branch'];
        $semester = $student['semester'];
        $Stipend = $student['Stipend'];
        $Location = $student['Location'];

        // Display the student's information as a non-editable form
        echo "<form>";
        echo "<div class='container my-2 greet'>";
        echo "<p>Student Application</p>";
        echo "</div>";
        echo "<div class='container my-3' ID='content'>";
        echo "<div class='bg-light p-5 rounded'>";
        echo "<div class='mb-3'>";
        echo "<label for='ID' class='form-label'><strong>ID</strong></label>";
        echo "<input type='text' class='form-control' ID='ID' value='$ID' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='CompanyName ' class='form-label'><strong>Company Name</strong></label>";
        echo "<input type='text' class='form-control' ID='CompanyName' value='$CompanyName' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='CompanyAddres' class='form-label'><strong>Company Address</strong></label>";
        echo "<input type='text' class='form-control' ID='CompanyAddress' value='$CompanyAddress' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='CompanyLocation' class='form-label'><strong>Company Location</strong></label>";
        echo "<input type='text' class='form-control' ID='CompanyLocation' value='$CompanyLocation' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='starDate' class='form-label'><strong>Start Date</strong></label>";
        echo "<input type='text' class='form-control' ID='startDate' value='$startDate' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='endDate' class='form-label'><strong>End Date</strong></label>";
        echo "<input type='text' class='form-control' ID='endDate' value='$endDate' readonly>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='branch' class='form-label'><strong>Branch</strong></label>";
        echo "<input type='text' class='form-control' ID='branch' value='$branch' readonly>";
        echo "<div class='mb-3'>";
        echo "<label for='semester' class='form-label'><strong>Semester</strong></label>";
        echo "<input type='text' class='form-control' ID='semester' value='$semester' readonly>";
        echo "<div class='mb-3'>";
        echo "<label for='Stipend' class='form-label'><strong>Stipend</strong></label>";
        echo "<input type='text' class='form-control' ID='Stipend' value='$Stipend' readonly>";
        echo "<div class='mb-3'>";
        echo "<label for='Location' class='form-label'><strong>Location</strong></label>";
        echo "<input type='text' class='form-control' ID='Location' value='$Location' readonly>";
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
    if (isset($_POST["status"]) && isset($_POST["Comment"]) && isset($_POST["ID"])) {
        // Get the form data
        $ID = $_POST["ID"];
        $status = $_POST["status"];
        $Comment = $_POST["Comment"];

        // Get the current date and format it as YYYY-MM-DD
        $dateApproved = date("Y-m-d");

        // Prepare and execute the SQL statement
        // $stmt = $db_connection->prepare("UPDATE internship_applications SET status = ?, Comment = ?, ActionDate = ? WHERE ID = ?");
        // $stmt->bind_param("ssss", $status, $Comment, $dateApproved, $ID);
        // $stmt->execute();

        // // Close the statement
        // $stmt->close();
        // Update the status in internship_applications table
        $stmt1 = $db_connection->prepare("UPDATE internship_applications SET status = ?, Comment = ?, ActionDate = ? WHERE ID = ?");
        $stmt1->bind_param("ssss", $status, $Comment, $dateApproved, $ID);
        $stmt1->execute();

        // Update the status in table2
        $stmt2 = $db_connection->prepare("UPDATE group_students SET status = ? WHERE groupId = ?");
        $stmt2->bind_param("ss", $status, $ID);
        $stmt2->execute();

        // Close the statements
        $stmt1->close();
        $stmt2->close();


        // Redirect to a success page or perform any other actions
        header("Location: success.php");
        exit();
    }
}
?>

<div class="container my-2 greet">
    <p>Application ID: <?php echo isset($_GET['ID']) ? $_GET['ID'] : 'N/A'; ?></p>
</div>

<div class="container my-3" ID="content">
    <div class="bg-light p-5 rounded">
        <form class="row g-3" status="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="mb-3">
                <label for="inputComment" class="form-label"><strong>Comment</strong></label>
                <textarea class="form-control" ID="inputComment" name="Comment" rows="10" placeholder="e.g. Please collect the approval letter from the office"></textarea>
            </div>
            <div class="container text-center">
                <div class="row mx-auto">
                    <div class="col mt-3">
                        <button class="btn btn-success btn-lg col-md-12 p-sm-4" name="status" value="approved" type="submit">Approve</button>
                    </div>
                    <div class="col my-3">
                        <button class="btn btn-danger btn-lg col-md-12 p-sm-4" name="status" value="rejected" type="submit">Reject</button>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['ID'])) { ?>
            <input type="hIDden" name="ID" value="<?php echo $_GET['ID']; ?>">
            <input type="hIDden" name="CompanyName" value="<?php echo $CompanyName; ?>">
            <input type="hIDden" name="CompanyAddress" value="<?php echo $CompanyAddress; ?>">
            <input type="hIDden" name="CompanyLocation" value="<?php echo $CompanyLocation; ?>">
            <input type="hIDden" name="startDate" value="<?php echo $startDate; ?>">
            <input type="hIDden" name="endDate" value="<?php echo $endDate; ?>">
            <input type="hIDden" name="branch" value="<?php echo $branch; ?>">
            <input type="hIDden" name="semester" value="<?php echo $semester; ?>">
            <input type="hIDden" name="Stipend" value="<?php echo $Stipend; ?>">
            <input type="hIDden" name="Location" value="<?php echo $branch; ?>">
            <?php } ?>
        </form>
    </div>
</div>
</body>
</html>
