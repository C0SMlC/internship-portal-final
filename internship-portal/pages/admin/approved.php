<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");

require_once 'config/db.php';
require_once 'config/approved_functions.php';
$result = display_data();
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

<div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#search").keyup(function(){
            var input=$(this).val();
            //alert(input);
            if(input!=""){
                $.ajax({
                    url:"livesearch_approved.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                    }
                });
            }else{
                $("#searchresult").css("display","none");
            }
        });
    });
</script>



    <div>
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card-header">
                        <!-- <h2></h2> -->
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>ID</td>
                                <td>Company Name</td>
                                <td>Applied On</td>
                                <td>Start Date</td>
                                <td>End Date</td>
                                <td>Type</td>
                                <td>Class</td>
                                <td>Approved On</td>
                                <td>Comment</td>
                                <td>Download</td>
                                <!-- <td class="py-3 ">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="../../components/internshipLetter/index.php" class="btn btn-primary" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg></a>
                        </div>

                    </td> -->
                            </tr>

                            <tr>
                               <?php
                               
                               while($row = mysqli_fetch_assoc($result))
                               {
                                ?>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['company']; ?></td>
                                    <td><?php echo $row['applied_on']; ?></td>
                                    <td><?php echo $row['start_date']; ?></td>
                                    <td><?php echo $row['end_date']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['class']; ?></td>
                                    <td><?php echo $row['approved_on']; ?></td>
                                    <td><?php echo $row['comment']; ?></td>
                                    <td class="py-3 ">
                                        <div class="d-flex justify-content-center align-items-center">
                                        <a href="LetterOne.php" class="btn btn-primary" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg></a>
                                        </div>
                                     </td>
                                   
                            </tr>
                                <?php
                               }

                               ?>
                            <!-- </tr> -->
                            </table>


                    </div>
                </div>
            </div>
        </div>
    </div>















    <!-- <div class="container mt-2 table-responsive-sm">
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
    </div> -->

</body>


<head>
    <title>pagination</title>
    <style type="text/css">
        .firstpaging{
                border: 1px solid black;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
        }
        a{
                text-decoration: none ;
                background-color: white;
                padding: 10px;
                color: black;
        }
        a.sec:hover{
                background-color: #0d6efd;
                color: white;


        }
    </style>


</head>
    <body>
    <?php
            include_once("../../components/navbar/index.php");
    ?>

    <div class="firstpaging">
        <a href=""class="sec"><< Previous</a>
        <a href="" class="sec">1</a>
        <a href="" class="sec">2</a>
        <a href="" class="sec">3</a>
        <a href="" class="sec">4</a>
        <a href="" class="sec">5</a>
        <a href=""class="sec">Next >></a>
    </div>    
</body>   
 

