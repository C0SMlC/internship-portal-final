<?php
require 'connect.php';
$update = get_student_data($con);
$profileImageUrl = "demo.png";

// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$con = mysqli_connect('localhost', 'root', '', 'internship_portal');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function getDashboardData($con) {
  $dashboardData = array(
      'applied' => array(
          'approved' => 0,
          'rejected' => 0,
      ),
      'approved' => 0,
      'rejected' => 0,
  );

  // Fetch count of 'approved' and 'rejected' internships from internship_applications table
  $query = "SELECT Status, COUNT(*) as count FROM internship_applications WHERE Status IN ('approved', 'rejected') GROUP BY Status";
  $result = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($result)) {
      $status = strtolower($row['Status']);
      if (array_key_exists($status, $dashboardData['applied'])) {
          $dashboardData['applied'][$status] = $row['count'];
      }
  }

  // Fetch count of 'approved' and 'rejected' internships from applications table and update 'applied' count
  $query = "SELECT Action, COUNT(*) as count FROM applications WHERE Action IN ('approved', 'rejected') GROUP BY Action";
  $result = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($result)) {
      $action = strtolower($row['Action']);
      if (array_key_exists($action, $dashboardData['applied'])) {
          $dashboardData['applied'][$action] += $row['count'];
      }
  }

  return $dashboardData;
}


// Fetch data from the database
$dashboardData = getDashboardData($con);
?>

    <div class="main-container ">
      <div class="profile"></div>
      <div class="profile-conainer">
        <div class="container pt-5">
          <div class="row">
            <div class="col">
              <nav
                aria-label="breadcrumb"
                class="rounded-3 p-3 mb-5 vh custom-breadcrumb">
<ol class="breadcrumb mb-0">
  <li class="breadcrumb-item text-white">
    <a class="home" href="#">Home</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">
    User Profile
  </li>
  <li class="breadcrumb-item">
    <a class="logout" href="logout.php">Logout</a>
  </li>
</ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <!-- Profile Card -->
            <div class="col-lg-4 profile-card">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img
                    src="<?php echo $profileImageUrl; ?>"
                    alt="avatar"
                    class="rounded-circle img-fluid"
                    style="width: 150px"
                  />
                  <h5 class="my-3"><?php echo $update['s_name']; ?></h5>
                  <p class="text-muted mb-1">Upload Image</p>
                </div>
              </div>
              <div class="card mb-4 px-4">
                <div class="card-body">
                  <!-- Profile Details -->
                  <div class="row">
                    <div class="col-4">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-8">
                      <p class="formText mb-0"><?php echo $update['s_name']; ?></p>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-4">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-8">
                      <p class="formText mb-0"><?php echo $update['s_email']; ?></p>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-4">
                      <p class="mb-0">Age</p>
                    </div>
                    <div class="col-8">
                      <p class="formText mb-0"><?php echo $update['s_age']; ?></p>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-4">
                      <p class="mb-0">Mobile</p>
                    </div>
                    <div class="col-8">
                      <p class="formText mb-0"><?php echo $update['s_mobile']; ?></p>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-4">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-8">
                      <p class="formText mb-0"><?php echo $update['s_address']; ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Edit Profile Link -->
              <div class="edit-profile">
                <a href="#" class="edit-profile-link" onclick="openForm()"
                  >Edit</a
                >
              </div>
            </div>


<!-- Dashboard -->
<div class="col-lg-8">
  <h2 class="mb-4 font-weight-bold">Dashboard</h2>
  <div class="card mb-3">
    <div class="card-body py-4">
    <div class="panel">
      <!-- Applied Internships -->
      <div class="internship internship-applied">
        <p class="internship-text">Applied</p>
        <p><?php echo $dashboardData['applied']['approved'] + $dashboardData['applied']['rejected']; ?></p>
      </div>
      <!-- Approved Internships -->
      <div class="internship internship-approved">
        <p class="internship-text">Approved</p>
        <p><?php echo $dashboardData['applied']['approved']; ?></p>
      </div>
      <!-- Rejected Internships -->
      <div class="internship internship-rejected">
        <p class="internship-text">Rejected</p>
        <p><?php echo $dashboardData['applied']['rejected']; ?></p>
      </div>
    </div>
  </div>
</div>




<div class="panel">
    <!-- INTERNSHIP DETAILS -->
<!-- INTERNSHIP DETAILS -->
</div>
<h2 class="mt-5 mb-4 font-weight-bold">Internship Details</h2>
<div class="internship-detail row py-2">
  <?php
  // Fetch data from the 'new_announcement' table
  $queryAnnouncement = "SELECT announcement_title, status, skills_required FROM new_annoucement";
  $resultAnnouncement = mysqli_query($con, $queryAnnouncement);

  // Fetch data from the 'internship_applications' table
  $queryApplications = "SELECT CompanyName, Status FROM internship_applications";
  $resultApplications = mysqli_query($con, $queryApplications);

  while ($rowAnnouncement = mysqli_fetch_assoc($resultAnnouncement)) {
    $name = $rowAnnouncement['announcement_title'];
    $status = $rowAnnouncement['status'];
    $position = $rowAnnouncement['skills_required'];
  ?>

    <div class="card mb-2">
      <h5 class="card-header"><?php echo $name; ?></h5>
      <div class="card-body">
        <h5 class="card-title"><?php echo $position; ?></h5>
        <p class="card-text">
          With supporting text below as a natural lead-in to
          additional content.
        </p>
        <div class="d-flex">
          <p>Status from Announcement:</p>
          <p class="ms-2 status"><?php echo $status; ?></p>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php
  // Reset the data pointer in the 'internship_applications' result set to the beginning
  mysqli_data_seek($resultApplications, 0);

  while ($rowApplications = mysqli_fetch_assoc($resultApplications)) {
    $companyName = $rowApplications['CompanyName'];
    $statusApplications = $rowApplications['Status'];
  ?>

    <div class="card mb-2">
      <h5 class="card-header"><?php echo $companyName; ?></h5>
      <div class="card-body">
        <h5 class="card-title">Position</h5>
        <p class="card-text">
          With supporting text below as a natural lead-in to
          additional content.
        </p>
        <div class="d-flex">
          <p>Status from Applications:</p>
          <p class="ms-2 status"><?php echo $statusApplications; ?></p>
        </div>
      </div>
    </div>
  <?php } ?>
</div>





                <div class="card">
                  <h5 class="card-header">Name Of Internship</h5>
                  <div class="card-body">
                    <h5 class="card-title">Position</h5>
                    <p class="card-text">
                      With supporting text below as a natural lead-in to
                      additional content.
                    </p>
                    <div class="d-flex">
                      <p>Status :</p>
                      <p class="ms-2 status">approved</p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <h5 class="card-header">Name Of Internship</h5>
                  <div class="card-body">
                    <h5 class="card-title">Position</h5>
                    <p class="card-text">
                      With supporting text below as a natural lead-in to
                      additional content.
                    </p>
                    <div class="d-flex">
                      <p>Status :</p>
                      <p class="ms-2 status">approved</p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <h5 class="card-header">Name Of Internship</h5>
                  <div class="card-body">
                    <h5 class="card-title">Position</h5>
                    <p class="card-text">
                      With supporting text below as a natural lead-in to
                      additional content.
                    </p>
                    <div class="d-flex">
                      <p>Status :</p>
                      <p class="ms-2 status">approved</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Profile Form -->
      <div class="edit-profile-form card d-none" id="editProfileForm">
        <div class="card-header">
          <h5 class="card-title">Edit Profile</h5>
        </div>
        <div class="card-body form-card-body">
        <form method="post" action="update_profile.php">
          <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo $update['s_name']; ?>" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $update['s_email']; ?>" required />
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo $update['s_age']; ?>" required />
          </div>
          <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="tel" class="form-control" id="mobile" name="mobile" value="<?php echo $update['s_mobile']; ?>" required />
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" required><?php echo $update['s_address']; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" onclick="closeForm()">Cancel</button>
        </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>



<script>

const profileExpander = document.querySelector('.profile');
const hideProfile = document.querySelector('.home')
const mainProfile = document.querySelector('.profile-conainer');
const mainContainer = document.querySelector('.main-container');
const announcement = document.querySelector('.announcement');

let isVisible = false;

profileExpander.addEventListener('click', () => {
  if (!isVisible) {
    isVisible = true;
    mainContainer.classList.add('main-container-active')
    mainContainer.style.display = 'block';
    mainProfile.style.display = 'block';
    mainProfile.style.opacity = '0';
    profileExpander.style.opacity = '0';
    profileExpander.style.transform = 'scale(0)';
    profileExpander.style.backgroundImage ='none';
    announcement.style.display = 'none';

    setTimeout(() => {
      mainProfile.style.opacity = '1';
    }, 250); // Delay of 10 milliseconds before changing the opacity
  } 
});

hideProfile.addEventListener('click', () => {
  if (isVisible) {
    profileExpander.style.transform = 'scale(0)';
    mainContainer.style.opacity='0';
    announcement.style.display = 'block';

    setTimeout(() => {
      profileExpander.style.backgroundImage = 'url("demo.png")';
      mainContainer.classList.remove('main-container-active')
      mainProfile.style.display = 'none';
      mainProfile.style.opacity = '1';
      profileExpander.style.transform = 'scale(1)';
      profileExpander.style.opacity = '1';
      mainContainer.style.opacity='1';

    },500); // Wait for the animation to complete before hiding the element

    isVisible = false;
  }});

function openForm() {
  document.getElementById('editProfileForm').classList.remove('d-none');
}

function closeForm() {
  document.getElementById('editProfileForm').classList.add('d-none');
}
</script>

<style>

* {
  padding: 0%;
  margin: 0%;
  box-sizing: border-box;
}

html,
body {
  height: 100%;
  position: relative;
  font-size: 100%;
  background-color:#eee;
}

.main-container {
    transition: all 0.2s;
}

.main-container-active{
   background-color:#DEDEDE;
    height:100vh;
    width:100vw;
    z-index:10000;
    position: absolute;
    top:0;
}

.profileChangeText {
  display: block;
  cursor: pointer;
  text-decoration: underline;
  color: blue;
}

.profile-conainer {
  opacity: 0;
  display: none;
  transition: opacity 1s;
}

.profile {
  width: 4rem;
  height: 4rem;
  display: block;
  border-radius: 50%;
  position: fixed;
  bottom: 10%;
  right: 3%;
  cursor: pointer;
  z-index: 100;

  background-image: url('<?php echo $profileImageUrl; ?>');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  transition: background-image 0.5s, transform 1s;
}

.edit {
  cursor: pointer;
}

.formText{
  color:#000000;
  font-weight: 600;
}

.internship {
  display: flex;
  flex-direction: column;
  font-size: 1.4rem;
  align-items: center;
}

.internship-text {
  font-weight: 500;
}

.panel {
  display: flex;
  justify-content: space-around;
  padding: 0 2rem;
}

.status {
  color: #00c853;
  font-weight: 500;
}

.internship-detail {
  height: 400px;
  overflow: auto;
}

.vh {
  background-color: #1b3058;
}

.vh a,
.vh .breadcrumb-item.active,
.vh .breadcrumb-item::before {
  color: #fafafa;
}

.edit-profile {
  position: relative;
}
.edit-profile-link {
  position: absolute;
  text-decoration: none;
  top: -1.1rem;
  right: 1%;
  font-size: 1.2rem;
  cursor: pointer;
}

.card-form {
  z-index: 100;
}

.profile-card {
  position: relative;
}

.edit-profile-form {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  background-color: rgba(0, 0, 0, 0.85);
  display: flex;
  align-items: center;
  justify-content: center;
}

.edit-profile-form .card {
  width: 500px;
  max-width: 90%;
}

.form-card-body {
  width: 500px;
  max-width: 90%;
  color: #fafafa;
}

@media (max-width: 33em) {
  .internship-text {
    font-size: 1rem;
  }
}
</style>