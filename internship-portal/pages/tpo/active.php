<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upload";




// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$search = isset($_GET["search"]) ? $_GET["search"] : '';

$sql = "SELECT * FROM feedback WHERE status = 'approved' AND (id LIKE '%$search%' OR company_name LIKE '%$search%')";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<body>
    <style>
        .company-link {
    text-decoration: none;
    color: #0f1142;
    font-weight: bold;
}

    </style>
    <?php include_once("../../components/navbar/index.php"); ?>
    <div class="container my-2 greet">
        <p>Active Internships</p>
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
                    <th scope="col">Company</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
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
                        //echo "<td>" . $row["company"] . "</td>";
                        //echo "<td><a href='./index copy.php>" . $row["company"] . "</a></td>";
                        //echo "<td><a href='./index copy.php=<?php echo $company;
                        //echo "<td><a href='./index copy.php?company=" . $row["company"] . "' class='company-link'>" . $row["company"] . "</a></td>";
                        echo "<td><a href='./index copy.php?company_name=" . urlencode($row["company_name"]) . "' class='company-link'>" . $row["company_name"] . "</a></td>";

                        echo "<td>" . $row["startDate"] . "</td>";
                        echo "<td>" . $row["endDate"] . "</td>";
                        
                        echo "<td><a href='./students-for-company.php?company=" . urlencode($row["company_name"]) ."' class='btn btn-primary ' role='button'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'><path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/><path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/></svg></a></td>";
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