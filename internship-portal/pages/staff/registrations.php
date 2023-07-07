<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
//require ".../.../Upload-and-Store-pdf/index.php";

//pagination part
//connect db here
include "../../connect/connect.php";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$per_page_record = 10; // limit
$start_from = ($page - 1) * $per_page_record;
$data_search = "SELECT * FROM applications LIMIT $start_from, $per_page_record";//db query here
//$data_search = "";
$query = mysqli_query($db_connection, $data_search);


?> 

<!-- Auth -->


<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Registered Applicants</p>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered table-dark table-sm">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Applicant Name</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row= mysqli_fetch_assoc($query)){
                    $id = $row['id'];
                    $name = $row['student_name'];
                    $resumeLink = "../../Upload-and-Store-pdf/index.php?id=".$id;
                
                ?>
                <tr class="table-light">
                    <th class="pt-3 text-center" scope="row">
                        <?php echo $id; ?>
                    </th>
                    <td class="pt-3" scope="row">
                        <?php echo $name; ?>
                    </td>
                    <td class="pt-3 text-center">
                        <a href="<?php echo $resumeLink; ?>" target="_blank">Link</a>
                    </td>
                    <td class="text-center">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">

                            <button type="submit" name="approve_btn_<?php echo $id; ?>" class="btn btn-success" value="Approved">Approve</button>
                            <button type="submit" name="reject_btn_<?php echo $id; ?>" class="btn btn-danger" value= "Rejected">Reject</button>
                            
                        </form>
                        
                    
                       
                    </td>
                </tr>
                <?php 

                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if (isset($_POST['approve_btn_' . $id])) {
                        // Insert data into the new table for approved applicants
                        $updateQuery = "Update applications set action = 'approved' where id = $id ";
                        echo $updateQuery;
                        echo mysqli_error($db_connection);
                        mysqli_query($db_connection, $updateQuery);
                    }

                    if (isset($_POST['reject_btn_' . $id])) {
                        // Insert data into the new table for rejected applicants
                        $updateQuery = "Update applications set action = 'rejected' where id = $id ";
                        echo $updateQuery;
                        echo mysqli_error($db_connection);
                        mysqli_query($db_connection, $updateQuery);
                    }
                }
                ?>
            
                        
                <?php 
                }
                ?>
            </tbody>
        </table>
       
        <br>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php //if ($page < 2) echo "disabled" 
                                        ?>">
                    <a class="page-link" href="previous.php?page=<?php //echo $page - 1; 
                                                                    ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                //$row_search = "SELECT COUNT(*) FROM userregisdata";
                //count from db query
                // $rs_result = mysqli_query($conn, $row_search);
                // $row = mysqli_fetch_row($rs_result);
                // $total_records = $row[0];
                // $total_pages = ceil($total_records / $per_page_record);
                // $start = $page;
                // if ($page < $total_pages - 2) {
                //     $end = $page + 2;
                // } else {
                //     $start = $total_pages - 2;
                //     $end = $total_pages;
                // }
                //
                //temporary start and end
                $start = 1;
                $end = 3;
                //
                //
                for ($i = $start; $i <= $end; $i++) {
                    if ($i == $page) {
                        $pagLink = "<li class='page-item active'><a class='page-link'  href='previous.php?page=$i'>" . $i . "</a></li>";
                    } else {
                        $pagLink = "<li class='page-item'><a class='page-link'  href='previous.php?page=$i'>" . $i . "</a></li>";
                    }
                    echo $pagLink;
                }
                ?>
                <li class="page-item <?php //if ($page == $total_pages) echo "disabled" 
                                        ?>">
                    <a class="page-link" href="previous.php?page=<?php //if ($page < $total_pages) echo $page + 1;  ?>">Next</a>
                </li>
            </ul>
        </nav>
       
        
    </div>

    <script>
    // Get all the "Approve" buttons
    const approveButtons = document.querySelectorAll('.btn-success');
    const rejectedButtons = document.querySelectorAll('.btn-danger');

    // Add event listeners to each "Approve" button
    approveButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get the parent table row
            const tableRow = this.closest('tr');

            // Change the status to "Approved"
            const statusCell = tableRow.querySelector('td:nth-child(4)');
            statusCell.textContent = 'Approved';
            statusCell.style.color = 'green';
            // Hide the "Reject" button
            const rejectButton = tableRow.querySelector('.btn-danger');
            rejectButton.style.display = 'none';
        });
    });

        rejectedButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get the parent table row
            const tableRow = this.closest('tr');

            // Change the status to "Approved"
            const statusCell = tableRow.querySelector('td:nth-child(4)');
            statusCell.textContent = 'Rejected';
            statusCell.style.color = 'red';

            // Hide the "Reject" button
            const approveButton = tableRow.querySelector('.btn-success');
            approveButton.style.display = 'none';
        });
    });
</script>

</body>

</html>

