<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

//pagination part
//connect db here
// include "../../connect/connect.php";
// if (isset($_GET["page"])) {
//     $page = $_GET["page"];
// } else {
//     $page = 1;
// }
// $per_page_record = 10; // limit
// $start_from = ($page - 1) * $per_page_record;
// // $data_search = "SELECT * FROM userregisdata LIMIT $start_from, $per_page_record";//db query here
// $data_search = "";
// $query = mysqli_query($conn, $data_search);
?>
<?php
// require './auth.php';
?>
<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Student Applications</p>
        <!-- Search Button -->
        <form class="row g-3">
            <div class="col-auto">
                <input class="form-control" id="search" placeholder="ID or Company Name">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search</button>
            </div>
        </form>
    </div>
    <div class="container mt-2 table-responsive-sm">
        <table class="table table-bordered table-dark table-sm">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Company</th>
                    <th scope="col">Applied On</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Class</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-light">
                    <th class="pt-3 text-danger text-center" scope="row">
                        <a href="./decision.php">
                            14
                        </a>
                    </th>
                    <td class="pt-3">
                        Mark Industries pvt. ltd
                    </td>
                    <td class="pt-3 text-center">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center">
                        WFH
                    </td>
                    <td class="pt-3 text-center">
                        SE-ECS
                    </td>

                </tr>
                <tr class="table-light">
                    <th class="pt-3 text-center text-danger" scope="row">
                        <a href="./decision.php">
                            14
                        </a>
                    </th>
                    <td class="pt-3">
                        Mark Industries pvt. ltd
                    </td>
                    <td class="pt-3 text-center">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center">
                        WFH
                    </td>
                    <td class="pt-3 text-center">
                        SE-ECS
                    </td>

                </tr>

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
                    };
                    echo $pagLink;
                }
                ?>
                <li class="page-item <?php //if ($page == $total_pages) echo "disabled" 
                                        ?>">
                    <a class="page-link" href="previous.php?page=<?php //if ($page < $total_pages) echo $page + 1; 
                                                                    ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>