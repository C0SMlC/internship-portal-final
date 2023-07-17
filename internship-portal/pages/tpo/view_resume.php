<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // Retrieve the resume from the database
    $sql = "SELECT resume FROM applications WHERE id = '{$id}'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $resume = $result->fetch_assoc()['resume'];

        // Set the appropriate headers to display the PDF
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="resume.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo $resume;
    }

    // Close the database connection
    $conn->close();
}
?>
