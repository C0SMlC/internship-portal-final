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
require './auth.php';
?>
<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Approved Applications</p>
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
                    <th scope="col">Approved On</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Download</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-light">
                    <th class="pt-3 text-center" scope="row">
                        14
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
                    <td class="pt-3 text-center ">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center ">
                        Please collect the approval letter from office
                    </td>
                    <td class="py-3 ">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="../../components/internshipLetter/index.php" target="_blank" class="btn btn-primary" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg></a>
                        </div>

                    </td>
                </tr>
                <tr class="table-light">
                    <th class="pt-3 text-center" scope="row">
                        14
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
                    <td class="pt-3 text-center ">
                        18/10/2022
                    </td>
                    <td class="pt-3 text-center ">
                        Please collect the approval letter from office
                    </td>
                    <td class="py-3 ">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="../../components/internshipLetter/index.php" class="btn btn-primary" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg></a>
                        </div>

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