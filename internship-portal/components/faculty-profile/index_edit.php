<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "internship_portal";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("Failed to connect");
}
?>
<?php
require 'connect.php';
$update = update_data($con);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- Custom JavaScript -->
    <script defer src="script.js"></script>
    <title>Document</title>
  </head>

  <body>
    <div class="profile"></div>
    <section class="main">
      <div class="container py-5">
        <div class="row">
          <div class="col">
            <nav
              aria-label="breadcrumb"
              class="rounded-3 p-3 mb-4 vh custom-breadcrumb"
            >
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  User Profile
                </li>
              </ol>
              -
            </nav>
          </div>
        </div>
        <div class="row">
          <!-- Profile Card -->
          <div class="col-lg-4 profile-card">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img
                  src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                  alt="avatar"
                  class="rounded-circle img-fluid"
                  style="width: 150px"
                />
                <h5 class="my-3">John Smith</h5>
                <p class="text-muted mb-1">Upload Image</p>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-body">
                <!-- Profile Details -->
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"> <?php echo $update['fac_name']; ?></p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $update['fac_email']; ?></p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Age</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $update['fac_age']; ?></p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mobile</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $update['fac_mobile']; ?></p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $update['fac_address']; ?></p>
                  </div>
                </div>
              </div>
              <!-- Edit Profile Link -->
              <div class="edit-profile mb-5">
                <a href="#" class="edit-profile-link mt-4" onclick="openForm()"
                  >Edit</a
                >
              </div>
            </div>
          </div>

          <!-- Dashboard -->
          <div class="col-lg-8">
            <div class="d-flex align-items-center justify-content-between mb-5">
              <h2>Internship Details</h2>
              <button type="button" class="btn btn-primary">Publish</button>
            </div>

            <div class="internship-detail row py-2">
              <div class="card mb-2">
                <h5 class="card-header">Name Of Internship</h5>
                <div class="card-body">
                  <h5 class="card-title">Position</h5>
                  <p class="card-text mt-3">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <p>Published On : 20/01/2022</p>
                  <div class="d-flex internship-date">
                    <p>Students Applied :</p>
                    <p class="ms-2 status">69</p>
                  </div>
                </div>
              </div>

              <div class="card mb-2">
                <h5 class="card-header">Name Of Internship</h5>
                <div class="card-body">
                  <h5 class="card-title">Position</h5>
                  <p class="card-text mt-3">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <p>Published On : 20/01/2022</p>
                  <div class="d-flex internship-date">
                    <p>Students Applied :</p>
                    <p class="ms-2 status">69</p>
                  </div>
                </div>
              </div>
              <div class="card mb-2">
                <h5 class="card-header">Name Of Internship</h5>
                <div class="card-body">
                  <h5 class="card-title">Position</h5>
                  <p class="card-text mt-3">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <p>Published On : 20/01/2022</p>
                  <div class="d-flex internship-date">
                    <p>Students Applied :</p>
                    <p class="ms-2 status">69</p>
                  </div>
                </div>
              </div>
              <div class="card mb-2">
                <h5 class="card-header">Name Of Internship</h5>
                <div class="card-body">
                  <h5 class="card-title">Position</h5>
                  <p class="card-text mt-3">
                    With supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <p>Published On : 20/01/2022</p>
                  <div class="d-flex internship-date">
                    <p>Students Applied :</p>
                    <p class="ms-2 status">69</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Edit Profile Form -->

<div class="edit-profile-form card d-none" id="editProfileForm">
  <div class="card-header">
    <h5 class="card-title">Edit Profile</h5>
  </div>
  <div class="card-body form-card-body">
    <form action="connect.php" method="post">
      <div class="mb-3">
        <label for="fullName" class="form-label">Full Name</label>
        <input
          type="text"
          class="form-control"
          id="fullName"
          name="fullName"
          value="<?php echo isset($update['fac_name']) ? $update['fac_name'] : ''; ?>"
          required
        />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
          type="email"
          class="form-control"
          id="email"
          name="email"
          value="<?php echo isset($update['fac_email']) ? $update['fac_email'] : ''; ?>"
          required
        />
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input
          type="number"
          class="form-control"
          id="age"
          name="age"
          value="<?php echo isset($update['fac_age']) ? $update['fac_age'] : ''; ?>"
          required
        />
      </div>
      <div class="mb-3">
        <label for="mobile" class="form-label">Mobile</label>
        <input
          type="tel"
          class="form-control"
          id="mobile"
          name="mobile"
          value="<?php echo isset($update['fac_mobile']) ? $update['fac_mobile'] : ''; ?>"
          required
        />
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea
          class="form-control"
          id="address"
          name="address"
          required
        ><?php echo isset($update['fac_address']) ? $update['fac_address'] : ''; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-secondary" onclick="closeForm()">
        Cancel
      </button>
    </form>
  </div>
</div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>