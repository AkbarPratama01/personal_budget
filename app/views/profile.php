<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $nama_user = $_SESSION['name'];
} else {
  $user_id = '';
  $nama_user = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "component/head.php"; ?>
  <title>Profile</title>


</head>


<body class="bg-light" onload="showProfile('<?= $user_id; ?>')">
  <div id="db-wrapper">
    <!-- navbar vertical -->
    <?php include "component/navbar-vertical.php"; ?>
    <!-- Page content -->
    <div id="page-content">
      <?php include "component/header.php"; ?>
      <!-- Container fluid -->
      <div class="bg-primary pt-10 pb-21"></div>
      <div class="container-fluid mt-n22 px-6">
        <div class="row align-items-center">
          <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <!-- Bg -->
            <div class="pt-20 rounded-top" style="
                background: url(../../public/images/background/profile-cover.jpg)
                    no-repeat;
                background-size: cover;
                "></div>
            <div class="card rounded-bottom rounded-0 smooth-shadow-sm mb-5">
              <div class="d-flex align-items-center justify-content-between pt-4 pb-6 px-4">
                <div class="d-flex align-items-center">
                  <!-- avatar -->
                  <div class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                    <img src="../../public/images/avatar/avatar.jpg" class="avatar-xxl
                    rounded-circle border border-2 " alt="Image">
                  </div>
                  <!-- text -->
                  <div class="lh-1">
                    <h2 class="mb-0" id="fullname">
                      <?= $nama_user ?>
                      <a href="#!" class="text-decoration-none"></a>
                    </h2>
                  </div>
                </div>
                <div>
                  <a href="profile_edit.php" class="btn btn-outline-primary d-none d-md-block">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-5">
              <!-- card -->
              <div class="card h-100">
                <!-- card body -->
                <div class="card-header">
                  <h4 class="mb-0">About Me</h4>
                </div>
                <div class="card-body">
                  <!-- card title -->
                  <h5 class="text-uppercase">Bio</h5>
                  <!-- text -->
                  <p class="mt-2 mb-6" id="information">
                    
                  </p>
                    <!-- row -->
                  <div class="row">
                    <div class="col-12 mb-5">
                      <!-- text -->
                      <h5 class="text-uppercase">Gender</h5>
                      <p class="mb-0" id="gender"></p>
                    </div>
                    <div class="col-6 mb-5">
                      <h5 class="text-uppercase">Phone</h5>
                      <p class="mb-0" id="phone"></p>
                    </div>
                    <div class="col-6">
                      <h5 class="text-uppercase">Email</h5>
                      <p class="mb-0" id="email"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Scripts -->
  <?php include "component/js.php"; ?>


</body>

</html>