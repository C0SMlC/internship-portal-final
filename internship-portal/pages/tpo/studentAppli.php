<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

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

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$per_page_record = 20; // Number of records to display per page
$start = ($page - 1) * $per_page_record;

// Search functionality
$search = isset($_GET["search"]) ? $_GET["search"] : "";
$searchedData = [];

// Fetch data from the database table
if (!empty($search)) {
    $sql = "SELECT id, company_name, student_name, admission_no, contact_no, student_location, application_date, resume FROM applications WHERE id LIKE '%$search%' OR company_name LIKE '%$search%' LIMIT $start, $per_page_record";
} else {
    $sql = "SELECT id, company_name, student_name, admission_no, contact_no, student_location, application_date, resume FROM applications LIMIT $start, $per_page_record";
}

$result = $conn->query($sql);

if (!$result) {
    die("Query execution failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $searchedData[] = $row;
    }
}

// Count total records for pagination
$total_records_sql = "SELECT COUNT(*) AS count FROM applications";
$total_records_result = $conn->query($total_records_sql);

if (!$total_records_result) {
    die("Query execution failed: " . $conn->error);
}

$total_records = $total_records_result->fetch_assoc()['count'];
$total_pages = ceil($total_records / $per_page_record);
$end = $start + $per_page_record;

// Render the table
?>
<body>
    <?php include_once("../../components/navbar/index.php"); ?>
    <div class="container my-2 greet">
        <p>Student Applications</p>
        <!-- Search Button -->
        <form class="row g-3" method="GET">
            <div class="col-auto">
                <input class="form-control" id="search" name="search" placeholder="ID or Company Name" value="<?php echo $search; ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search</button>
            </div>
             <div class="col-auto ml-auto">
                <button class="btn btn-primary btn-download-excel">Download Excel</button>
                <!--<button class="btn btn-primary btn-download-pdf">Download PDF</button>-->
             </div>
        </form>
    </div>
    <div class="container mt-2 table-responsive-sm">
        <table class="table table-bordered table-light table-sm">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Company</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Admission No</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Student Location</th>
                    <th scope="col">Application Date</th>
                    <th scope="col">Resume</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($searchedData as $student) {
                    $id = $student['id'];
                    $company_name = $student['company_name'];
                    $student_name = $student['student_name'];
                    $admission_no = $student['admission_no'];
                    $contact_no = $student['contact_no'];
                    $student_location = $student['student_location'];
                    $application_date = $student['application_date'];
                    $resume = $student['resume'];

                    // Convert the longblob data to PDF file
                    $pdfUrl = "data:application/pdf;base64," . base64_encode($resume);

                    // Display student information
                    echo "<tr>";
                    echo "<td class='pt-3 text-center fw-bold'><a href='decision.php?id={$id}' style='text-decoration: none; color: #00008B; font-weight:bold;'>{$id}</a></td>";
                    echo "<td class='pt-3'><a href='index copy.php?company_name={$company_name}' style='text-decoration: none; color: #00008B; font-weight:bold;'>{$company_name}</a></td>";
                    //echo "<td><a href='./index copy.php?company_name=" . urlencode($row["company_name"]) . "' class='company-link'>" . $row["company_name"] . "</a></td>";
                    echo "<td class='pt-3 text-center'>{$student_name}</td>";
                    echo "<td class='pt-3 text-center'>{$admission_no}</td>";
                    echo "<td class='pt-3 text-center'>{$contact_no}</td>";
                    echo "<td class='pt-3 text-center'>{$student_location}</td>";
                    echo "<td class='pt-3 text-center'>{$application_date}</td>";
                    echo "<td class='pt-3 text-center'>
                            <a href='view_resume.php?id={$id}' target='_blank' class='btn btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z' />
                                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z' />
                                </svg>
                            </a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page < 2) echo "disabled"; ?>">
                <a class="page-link" href="previous.php?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>" tabindex="-1">Previous</a>
            </li>
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink = "<li class='page-item active'><a class='page-link' href='previous.php?page=$i&search=$search'>" . $i . "</a></li>";
                } else {
                    $pagLink = "<li class='page-item'><a class='page-link' href='previous.php?page=$i&search=$search'>" . $i . "</a></li>";
                }
                echo $pagLink;
            }
            ?>
            <li class="page-item <?php if ($page == $total_pages) echo "disabled"; ?>">
                <a class="page-link" href="previous.php?page=<?php if ($page < $total_pages) echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a>
            </li>
        </ul>
    </nav>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to download the table data in Excel format
    function downloadExcel() {
      // Generate the table data
      var tableData = '<table>' + $('table').html() + '</table>';

      // Create a temporary download link element
      var link = document.createElement('a');
      link.href = 'data:application/vnd.ms-excel;base64,' + btoa(tableData);
      link.download = 'table_data.xls';
      link.style.display = 'none';

      // Append the link element to the document
      document.body.appendChild(link);

      // Trigger the click event on the link
      link.click();

      // Remove the link from the document
      document.body.removeChild(link);
    }

    // Add an event listener to the "Download Excel" button
    $(document).ready(function() {
      $('.btn-download-excel').click(function() {
        downloadExcel();
      });
    });
</script>
</html>

<?php
// Close the database connection
$conn->close();
?>
