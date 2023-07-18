<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship_portal";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$search = isset($_GET["search"]) ? $_GET["search"] : '';

$sql = "SELECT * FROM applications WHERE action = 'approved' AND (id LIKE '%$search%' OR announcement_title LIKE '%$search%')";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<body>
    <?php include_once("../../components/navbar/index.php"); ?>
    <div class="container my-2 greet">
        <p>Approved Applications</p>
        <!-- Search Button -->
        <form class="row g-3" method="GET">
            <div class="col-auto">
                <input class="form-control" id="search" name="search" placeholder="ID or Company Name" value="<?php echo $search; ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search</button>
            </div>
        </form>
    </div>
    <div class="container mt-2 table-responsive-sm">
        <table class="table table-bordered table-light table-sm">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Admission No</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Student Location</th>
                    <th scope="col">Application Date</th>
                    <!--<th scope="col">Approved On</th>-->
                    <th scope="col">Comment</th>
                    <th scope="col">Download</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Output row data
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["announcement_title"] . "</td>";
                        echo "<td>" . $row["student_name"] . "</td>";
                        echo "<td>" . $row["admission_no"] . "</td>";
                        echo "<td>" . $row["contact_no"] . "</td>";
                        echo "<td>" . $row["student_location"] . "</td>";
                        echo "<td>" . $row["application_date"] . "</td>";
                        //echo "<td>" . $row["approvedOn"] . "</td>";
                        echo "<td>" . $row["comment"] . "</td>";
                        //echo "<td><a href='../../components/internshipLetter/index.php' target='_blank' class='btn btn-primary' role='button'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'><path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/><path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/></svg></a></td>";
                        echo "<td class='pt-3 text-center'>
                            <a href='../../components/internshipLetter/index.php' target='_blank' class='btn btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z' />
                                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z' />
                                </svg>
                            </a>
                        </td>";
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td colspan='10'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <!-- Pagination code here -->
    </div>
</body>

</html>