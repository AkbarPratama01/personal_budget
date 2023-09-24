<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "component/head.php"; ?>
  <title>Register Page</title>


</head>


<body>
  <!-- container -->
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <!-- Card -->
        <div class="card smooth-shadow-md">
          <!-- Card body -->
          <div class="card-body p-6">
            <!-- Form -->
            <form id="form-sign-up">
              <!-- Name -->
              <div class="mb-3">
                <label for="fullname" class="form-label">Nama Lengkap</label>
                <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Fullname here"
                  required="">
              </div>
              <!-- Username -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here"
                  required="">
              </div>
              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="**************"
                  required="">
              </div>
              <div>
                <!-- Button -->
                <div class="d-grid">
                  <button type="button" id="btn-sign-up" class="btn btn-primary">Sign
                    Up</button>
                </div>

                <div class="d-md-flex justify-content-between mt-4">
                  <div class="mb-2 mb-md-0">
                    <a href="login.php" class="fs-5">Already have account </a>
                  </div>
                  <div>
                    <a href="forget-password.html" class="text-inherit
                        fs-5">Forgot your password?</a>
                  </div>

                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <?php include "component/js.php"; ?>
  <script>
    var btn_daftar = document.getElementById('btn-sign-up');

    btn_daftar.onclick = function() {
      //data Login
      const data_daftar = [
        document.querySelector('input[name="fullname"]'),
        document.querySelector('input[name="email"]'),
        document.querySelector('input[name="password"]')
      ];

      let isInputEmpty = false;

      for (let i = 0; i < data_daftar.length; i++) {
        if (!data_daftar[i].value) {
            isInputEmpty = true;
            break;
        }
      }

      if (isInputEmpty) {
        alert('Fullname, username atau password masih kosong');
      } else {
        var fullname = document.getElementById("fullname").value;
        var username = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        $.ajax({
          url: "../controllers/registerController.php",
          type: "post",
          data: {
            fullname:fullname,
            username: username,
            password: password
          },
          success: function(result) {
            if (result == 'Ok') {
              window.location.href = "login.php";
            } else if (result == 'Ada') {
                alert("akun telah ada, harap cek kembali!");
              // Access the form element
              var form = document.getElementById('form-sign-up');

              // Reset the form
              form.reset();  
            } else {
              alert("gagal membuat akun");
              // Access the form element
              var form = document.getElementById('form-sign-up');

              // Reset the form
              form.reset();
            }
          }
        })
      }
    }
  </script>
</body>

</html>