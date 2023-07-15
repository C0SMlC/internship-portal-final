<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upload";

// Get the company name from the query parameter
$company = isset($_GET["company"]) ? $_GET["company"] : '';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the students for the specific company
//$sql = "SELECT * FROM feedback" . $company . "`";
$sql = "SELECT * FROM feedback WHERE company = '" . $company . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the list of students
    echo "<h2>Students for company: " . $company . "</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        // Output other student details as per your table structure
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No students found for company: " . $company;
}

// Close the database connection
$conn->close();
?>
