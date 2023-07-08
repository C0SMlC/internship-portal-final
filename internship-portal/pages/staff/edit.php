<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
require "../../connect/connect.php";

if(isset($_GET['id'])) {
    // Retrieve the ID from the URL
    $id = $_GET['id'];

    // Query to fetch the specific announcement based on the ID
    $query = "SELECT * FROM new_annoucement WHERE announcement_id = '$id'";
    $result = mysqli_query($db_connection, $query);

    // Check if a row is found
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Extract the information from the row
        $announcement_title = $row["announcement_title"];
        $description = $row["description"];
        $duration = $row["duration"];
        $start_date = $row["start_date"];
        $skills_required = $row["skills_required"];
        $branch = $row["branch"];
        $location = $row["location"];
        $work_type = $row["work_type"];
        $work_location = $row["work_location"];
        $stipend_type = $row["stipend_type"];
        $stipend = $row["stipend"];
        $perks = $row["perks"];

        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['announcement_title']) && !empty($_POST['description']) && !empty($_POST['skills_required']) && !empty($_POST['location']) && !empty($_POST['start_date']) && !empty($_POST['duration']) && !empty($_POST['branch']) && !empty($_POST['work_type']) && !empty($_POST['stipend_type']) && !empty($_POST['work_location']) && !empty($_POST['perks'])) {
                $announcement_title = $_POST['announcement_title'];
                $description = $_POST['description'];
                $skills_required = $_POST['skills_required'];
                $location = $_POST['location'];
                $start_date = $_POST['start_date'];
                $duration = $_POST['duration'];
                $branch = $_POST['branch'];
                $work_type = $_POST['work_type'];
                $stipend_type = $_POST['stipend_type'];
                $stipend = $_POST['stipend'];
                $work_location = $_POST['work_location'];
                $perks = $_POST['perks'];
            
                $query = "UPDATE new_annoucement SET announcement_title = '$announcement_title', description = '$description', duration = '$duration', start_date = '$start_date', skills_required = '$skills_required', branch = '$branch', location = '$location', work_type = '$work_type', work_location = '$work_location', stipend_type = '$stipend_type', stipend = '$stipend', perks = '$perks' WHERE announcement_id = '$id'";
                if(mysqli_query($db_connection, $query))
                {
                    echo true;
                    exit;
                }else{
                    echo "error". mysqli_error($db_connection);
                }
                header("Location: /internship-portal-final/internship-portal/pages/Internship/index.php");
                die;
               
            
            }

      
    } else {
        // No announcement found with the specified ID, handle accordingly
        echo "Announcement not found.";
        die;
    }
// } else {
//     // ID parameter not present in the URL, handle accordingly
//     echo "Invalid request.";
//     die;
}




?>

<!-- Auth -->

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Edit Announcement</p>
    </div>
    <div class="container my-3" id="content">
        <div class="bg-light p-5 rounded">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id=' . $id;  ?>" method="POST">

                <div class="col-12">

                    <strong for="Title" class="form-label">Announcement Title</strong>
                    <br>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="announcement_title" id="Title" value = "<?php echo $announcement_title; ?>" placeholder="e.g. ABC pvt. ltd. hiring interns for XYZ fields....">
                </div>
                <br>

                <div class="mb-3">
                    <label for="Description" class="form-label">
                        <strong>
                            Description
                        </strong>

                    </label>
                    <br>

                    <textarea class="form-control" id="Description" rows="10" placeholder="Description Of Announcement"  name = "description" ><?php echo $description; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">
                        <strong>
                            Skills required
                        </strong>

                    </label>
                    <br>
                    <textarea class="form-control" id="skills" rows="2" placeholder="e.g. AutoCAD, JAVA, Web development, PCB Designing, etc..." name = "skills_required"><?php echo $skills_required; ?></textarea>
                </div>
                <div class="col-12">
                    <strong for="Location" class="form-label">Location</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="location" id="Location" placeholder="e.g. Raigad,Panvel" value = "<?php echo $location; ?>">
                </div>
                <br>

                <div class="col-12">
                    <strong for="startDate" class="form-label">Start Date</strong>
                    <input id="startDate" class="form-control" type="date" name = "start_date" value = "<?php echo $start_date; ?>"/>

                </div>
                <br>
                <div class="col-12">

                    <strong for="Duration" class="form-label">Duration</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="duration" id="Duration" placeholder="Number (In Months)" value = "<?php echo $duration; ?>">
                </div>
                <br>

                <div class="form-group">
                    <label><strong>Branch :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="ECS" <?php if ($branch == 'ECS') echo 'checked'; ?> />
                        <span class="form-check-label">ECS</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="CS" <?php if ($branch == 'CS') echo 'checked'; ?>/>
                        <span class="form-check-label">CS</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="IT" <?php if ($branch == 'IT') echo 'checked'; ?> />
                        <span class="form-check-label">IT</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="MECH" <?php if ($branch == 'MECH') echo 'checked'; ?> />
                        <span class="form-check-label">MECH</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="AUTO" <?php if ($branch == 'AUTO') echo 'checked'; ?> />
                        <span class="form-check-label">AUTO</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="ALL" <?php if ($branch == 'All') echo 'checked'; ?> />
                        <span class="form-check-label">All Branches</span>
                    </label>

                </div>
                <div class="form-group">
                    <label><strong>Work type :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_type" value="Paid" <?php if ($work_type == 'Paid') echo 'checked'; ?> />
                        <span class="form-check-label"> Paid </span>
                    </label>
                    <label class="form-checkform-check-inline">
                        <input class="form-check-input" type="radio" name="work_type" value="UnPaid" <?php if ($work_type == 'UnPaid') echo 'checked'; ?>/>
                        <span class="form-check-label"> UnPaid </span>
                    </label>
                </div>
                <div class="form-group">
                    <label><strong>Stipend type :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stipend_type" value="Lumpsum (After Internship Duration)" <?php if ($stipend_type == 'Lumpsum (After Internship Duration)') echo 'checked'; ?> />
                        <span class="form-check-label"> Lumpsum (After Internship Duration)</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stipend_type" value="Monthly" <?php if ($stipend_type == 'Monthly') echo 'checked'; ?> />
                        <span class="form-check-label"> Monthly </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stipend_type" value="UnPaid" <?php if ($stipend_type == 'UnPaid') echo 'checked'; ?> />
                        <span class="form-check-label"> UnPaid </span>
                    </label>
                </div>
                <div class="col-12">

                    <strong for="Stipend" class="form-label">Stipend</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="stipend" id="Stipend" placeholder="(In Rupees)" value = "<?php echo $stipend; ?>">
                </div>
                <div class="form-group">
                    <label><strong>Work Location :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_location" value="Work From Home" <?php if ($work_location == 'Work From Home') echo 'checked'; ?> />
                        <span class="form-check-label"> Work From Home</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_location" value= 'Hybrid'<?php if ($work_location == 'Hybrid') echo 'checked'; ?> />
                        <span class="form-check-label"> Hybrid </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_location" value="OnSite" <?php if ($work_location == 'OnSite') echo 'checked'; ?> />
                        <span class="form-check-label"> OnSite </span>
                    </label>
                </div>
                <div class="col-12">
                    <strong for="Perks" class="form-label">Perks</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="perks" id="Perks" placeholder="e.g. Certificate, Letter Of Recommendation, Flexible timings, etc..." value = "<?php echo $perks; ?>">
                </div>
                <br>
                <div class="container text-center">
                    <div class="row mx-auto">
                        <div class="col mt-5">
                            <button class="btn btn-warning btn-lg col-md-12" role="button">Save</button>
                        </div>

                    </div>
                </div>



            </form>
        </div>
    </div>





</body>

</html>