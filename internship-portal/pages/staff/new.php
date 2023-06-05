<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>

<!-- Auth -->

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>New Announcement</p>
    </div>
    <div class="container my-3" id="content">
        <div class="bg-light p-5 rounded">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">

                <div class="col-12">

                    <strong for="Title" class="form-label">Announcement Title</strong>
                    <br>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="Title"
                        id="Title" placeholder="e.g. ABC pvt. ltd. hiring interns for XYZ fields....">
                </div>
                <br>

                <div class="mb-3">
                    <label for="Description" class="form-label">
                        <strong>
                            Description
                        </strong>

                    </label>
                    <br>

                    <textarea class="form-control" id="Description" rows="10"
                        placeholder="Description Of Announcement"></textarea>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">
                        <strong>
                            Skills required
                        </strong>

                    </label>
                    <br>
                    <textarea class="form-control" id="skills" rows="2"
                        placeholder="e.g. AutoCAD, JAVA, Web development, PCB Designing, etc..."></textarea>
                </div>
                <div class="col-12">
                    <strong for="Location" class="form-label">Location</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off"
                        name="Location" id="Location" placeholder="e.g. Raigad,Panvel">
                </div>
                <br>

                <div class="col-12">
                    <strong for="startDate" class="form-label">Start Date</strong>
                    <input id="startDate" class="form-control" type="date" />

                </div>
                <br>
                <div class="col-12">

                    <strong for="Duration" class="form-label">Duration</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off"
                        name="Duration" id="Duration" placeholder="Number (In Months)">
                </div>
                <br>

                <div class="form-group">
                    <label><strong>Branch :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ECS" value="ECS" />
                        <span class="form-check-label">ECS</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="CS" value="CS" />
                        <span class="form-check-label">CS</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="IT" value="IT" />
                        <span class="form-check-label">IT</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="MECH" value="MECH" />
                        <span class="form-check-label">MECH</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="AUTO" value="AUTO" />
                        <span class="form-check-label">AUTO</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="All" value="All" />
                        <span class="form-check-label">All Branches</span>
                    </label>

                </div>
                <div class="form-group">
                    <label><strong>Work type :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="WorkType" value="Paid" />
                        <span class="form-check-label"> Paid </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="WorkType" value="UnPaid" />
                        <span class="form-check-label"> Unpaid </span>
                    </label>
                </div>
                <div class="form-group">
                    <label><strong>Stipend type :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="StipendType" value="Paid" />
                        <span class="form-check-label"> Lumpsum (After Internship Duration)</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="StipendType" value="UnPaid" />
                        <span class="form-check-label"> Monthly </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="StipendType" value="UnPaid" />
                        <span class="form-check-label"> Unpaid </span>
                    </label>
                </div>
                <div class="col-12">

                    <strong for="Stipend" class="form-label">Stipend</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off"
                        name="Stipend" id="Stipend" placeholder="(In Rupees)">
                </div>
                <div class="form-group">
                    <label><strong>Work Location :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Location" value="WFH" />
                        <span class="form-check-label"> Work From Home</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Location" value="Hybrid" />
                        <span class="form-check-label"> Hybrid </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Location" value="OnSite" />
                        <span class="form-check-label"> On-site </span>
                    </label>
                </div>
                <div class="col-12">
                    <strong for="Perks" class="form-label">Perks</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="Perks"
                        id="Perks" placeholder="e.g. Certificate, Letter Of Recommendation, Flexible timings, etc...">
                </div>
                <br>
                <div class="container text-center">
                    <div class="row mx-auto">
                        <div class="col mt-5">
                            <button class="btn btn-warning btn-lg col-md-12" role="button">Add Announcement</button>
                        </div>

                    </div>
                </div>



            </form>
        </div>
    </div>





</body>

</html>