<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "component/head.php"; ?>
  <title>Login Page</title>


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
            <form id="form-sign-in">
              <!-- Username -->
              <div class="mb-3">
                <label for="email" class="form-label">email</label>
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
                  <button type="button" id="btn-sign-in" class="btn btn-primary">Sign
                    in</button>
                </div>

                <div class="d-md-flex justify-content-between mt-4">
                  <div class="mb-2 mb-md-0">
                    <a href="sign-up.html" class="fs-5">Create An
                      Account </a>
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
  var btn_login = document.getElementById("btn-sign-in");

  btn_login.onclick = function() {

    //data Login
    const data_login = [
      document.querySelector('input[name="email"]'),
      document.querySelector('input[name="password"]')
    ];

    let isInputEmpty = false;

    for (let i = 0; i < data_login.length; i++) {
      if (!data_login[i].value) {
        isInputEmpty = true;
        break;
      }
    }

    if (isInputEmpty) {
      alert('Username atau password masih kosong');
    } else {
      var username = document.getElementById("email").value;
      var password = document.getElementById("password").value;

      $.ajax({
        url: "../controllers/LoginController.php",
        type: "post",
        data: {
          username: username,
          password: password
        },
        success: function(result) {
          if (result == 'success') {
            window.location.href = "index.php";
          } else {
            alert("user tidak ditemukan");
            // Access the form element
            var form = document.getElementById('form-sign-in');

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