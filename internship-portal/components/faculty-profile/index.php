<?php
$profileImageUrl = "demo.png";
?>

<div class="main-container">
    <div class="profile"></div>
    <section class="profile-conainer">
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
                  src="<?php echo $profileImageUrl; ?>"
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
                    <p class="text-muted mb-0">Johnatan Smith</p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">example@example.com</p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Age</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">20</p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mobile</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">(098) 765-4321</p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
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
              <a href="./new.php" type="button" class="btn btn-primary">Publish</a>
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
        <form>
          <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input
              type="text"
              class="form-control"
              id="fullName"
              name="fullName"
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
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" onclick="closeForm()">
            Cancel
          </button>
        </form>
      </div>
    </div>

</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>

const profileExpander = document.querySelector('.profile');
const mainProfile = document.querySelector('.profile-conainer');
const mainContainer = document.querySelector('.main-container');

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
    profileExpander.style.backgroundImage =
      'url("https://api.iconify.design/material-symbols/close.svg")';

    setTimeout(() => {
      mainProfile.style.opacity = '1';
      profileExpander.style.opacity = '1';
      profileExpander.style.transform = 'scale(1)';
    }, 250); // Delay of 10 milliseconds before changing the opacity
  } else {
    mainContainer.style.opacity='0';
    profileExpander.style.transform = 'scale(0)';
    profileExpander.style.backgroundImage = 'url("demo.png")';
    

    setTimeout(() => {
      mainContainer.classList.remove('main-container-active')
      mainProfile.style.display = 'none';
      mainProfile.style.opacity = '1';
      profileExpander.style.opacity = '1';
      profileExpander.style.transform = 'scale(1)';
      mainContainer.style.opacity='1';

    }, 250); // Wait for the animation to complete before hiding the element

    isVisible = false;
  }
});

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
  background-color: #eee;
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

.main-container {
    transition: all 0.2s;
}

.main-container-active{
    background-color:#eee;
    height:100vh;
    width:100vw;
    z-index:10000;
    position: absolute;
    top:0;
}

.profile {
  width: 5rem;
  height: 5rem;
  display: block;
  border-radius: 50%;
  position: fixed;
  bottom: 10%;
  right: 5%;
  cursor: pointer;
  z-index: 100;

  background-image:url('<?php echo $profileImageUrl; ?>');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

  transition: background-image 0.5s, transform 1s;
}

.edit {
  cursor: pointer;
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

.internship-date {
  font-weight: 300;
  font-size: 1.1rem;
  margin: 0.5rem 0;
  color: #111111;
  cursor: pointer;
}

.internship-date:hover {
  color: #2979ff;
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
  height: 600px;
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

</style>