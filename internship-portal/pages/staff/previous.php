<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
require "../../connect/connect.php";

//pagination part

// if (isset($_GET["page"])) {
//     $page = $_GET["page"];
// } else {
//     $page = 1;
// }
// $per_page_record = 10; // limit
// $start_from = ($page - 1) * $per_page_record;
// if(isset($_GET['search'])){
//     $search = $_GET['search'];
//     $data_search = "Select announcement_id, announcement_title, published_on from new_annoucement where announcement_id = '$search' OR announcement_title LIKE '%$search%' LIMIT $start_from, $per_page_record ";

// }else{
//     $data_search = "Select announcement_id, announcement_title, published_on from new_annoucement LIMIT $start_from, $per_page_record";
// }
// $query = mysqli_query($db_connection, $data_search);

  
// ?>


<!-- Auth -->

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Previous Announcements</p>
        <!-- Search Button -->
        <form class="row g-3" method = "GET">
                    <div class="col-auto">
                        <input class="form-control" id="search" placeholder="ID or Company Name" name = 'search'>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
    </div>
    <div class="container mt-2">
        <table class="table table-bordered table-dark table-sm">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">View/Edit</th>
                    <th scope="col">Title</th>
                    <th scope="col">Published On</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operation</th>
                    <th scope="col">Registrations</th>
                    <th scope="col">Download</th>

                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($query)) {
                    $announcement_id = $row["announcement_id"];
                    $announcement_title = $row["announcement_title"];
                    $published_on = $row["published_on"];
                ?>
                <tr class="table-light">
                    <th class="pt-3 text-center text-danger" scope="row">
                        <?php 
                        echo $row['announcement_id'];
                        ?>
                    </th>
                    <td class="py-3 text-center ">
                        <div class="d-flex justify-content-center align-items-center">

                            <a href="../Internship/index.php?id=<?php echo $announcement_id; ?>" class="btn btn-primary" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </a>
                        </div>

                    </td>
                    <td class="pt-3 ">
                    <?php 
                        echo $row['announcement_title'];
                    ?>
                    </td>
                    <td class="pt-3 text-center">
                    <?php 
                        echo $row['published_on'];
                    ?>
                    </td>
                    <th class="pt-3 text-center text-success">
                        Active
                    </th>
                    <td class="py-3 text-center ">
                        <div class="d-flex justify-content-center align-items-center">

                            <button class="btn btn-success" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </button>

                        </div>

                    </td>
                    <td class="py-3 text-center ">
                        <div class="d-flex justify-content-center align-items-center">

                            <a href="./registrations.php" target="_blank" class="btn btn-warning" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                </svg>
                            </a>
                        </div>

                    </td>



                    <td class="py-3 text-center ">
                        <div class="d-flex justify-content-center align-items-center">

                            <a href="../../Libraries/excel/process.php" class="btn btn-primary" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                            </a>
                        </div>

                    </td>
                <?php 
                }
                ?>
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