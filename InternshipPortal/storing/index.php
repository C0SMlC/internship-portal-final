<!DOCTYPE html>
<html>
<head>
    <title>Student Resumes</title>
</head>
<body>
    <h1>Student Resumes</h1>
    
    <form action="uploadanddownload.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="resume">Upload Resume:</label>
        <input type="file" name="resume" id="resume" required>
        <br>
        <input type="submit" value="Upload">
    </form>
    
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function displayTableRows($students)
            {
                $uploadDir = 'resumes/';

                foreach ($students as $student) {
                    $name = $student['name'];
                    $resume = $student['resume'];
                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><a href="<?php echo $uploadDir . $resume; ?>" download>Download</a></td>
                    </tr>
                    <?php
                }
            }

            if (isset($_GET['name']) && isset($_GET['resume'])) {
                $name = $_GET['name'];
                $resume = $_GET['resume'];

                $students[] = ['name' => $name, 'resume' => $resume];
            } else {
                $students = [];
            }

            displayTableRows($students);
            ?>
        </tbody>
    </table>
</body>
</html>

