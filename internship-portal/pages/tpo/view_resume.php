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

    // Prepare and execute the SQL statement
    $sql = "SELECT resume FROM applications WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $resume = $row['resume'];

        // Set the appropriate headers to display the PDF
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="resume.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo $resume;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
