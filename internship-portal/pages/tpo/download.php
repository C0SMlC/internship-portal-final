<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upload";

// Get the company name from the query parameter
$company_name = isset($_GET["company_name"]) ? $_GET["company_name"] : '';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the students for the specific company
//$sql = "SELECT * FROM feedback" . $company . "`";
$sql = "SELECT * FROM feedback WHERE company_name = '" . $company_name . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the list of students
    echo "<h2>Students for company: " . $company_name . "</h2>";
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
    echo "No students found for company: " . $company_name;
}

// Close the database connection
$conn->close();
?>
