<?php
// Function to establish a database connection
function connectToDatabase()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'upload';

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
}

$uploadDir = 'resumes/';

// Check if a file was uploaded
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $name = $_POST['name'];
    $resumeName = $_FILES['resume']['name'];
    $resumePath = $uploadDir . $resumeName;

    $uploadedFile = $_FILES['resume']['tmp_name'];
    move_uploaded_file($uploadedFile, $resumePath);

    // Store the name and resume in the database
    $conn = connectToDatabase();

    $existingData = [];
    $result = $conn->query('SELECT name, resume FROM students');
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $existingData[] = ['name' => $row['name'], 'resume' => $row['resume']];
        }
    }

    $existingData[] = ['name' => $name, 'resume' => $resumePath];

    $conn->query('TRUNCATE TABLE students');

    $stmt = $conn->prepare('INSERT INTO students (name, resume) VALUES (?, ?)');
    foreach ($existingData as $data) {
        $stmt->bind_param('ss', $data['name'], $data['resume']);
        $stmt->execute();
    }
    $stmt->close();
    $conn->close();

    header('Location: index.php?name=' . urlencode($name) . '&resume=' . urlencode($resumeName));
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
