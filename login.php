<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="vendor/boostrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/icons/css/boxicons.min.css">
  <link rel="stylesheet" href="styles/login.css">
  <link rel="shortcut icon" href="Dashboard/img/fruit.png">
  <title>Simbah</title>
</head>

<body>
  <div class="global-container">
    <div class="card login-form">
      <h1 class="card-title text-center text-white mb-5">
        Login
      </h1>
      <div class="card-text">
        <div class="mb-3">
          <label for="username" class="form-label text-white">Username</label>
          <input type="text" class="form-control btn-login-form" id="username" aria-describedby="usernameHelp" placeholder="Masukkan Username" required autofocus name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label text-white">Password</label>
          <input type="password" class="form-control btn-login-form" id="password" placeholder="Masukkan Password" required name="password">
        </div>
        <!-- <div class="mb-3">
            <select class="form-control" name="level" id="level">
              <option value="owner">owner</option>
              <option value="karyawan">karyawan</option>
              <option value="member">member</option>
              <option value="pelanggan">pelanggan</option>
            </select>
          </div> -->
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label text-white" for="exampleCheck1">Check me out</label>
          </div> -->
        <div class="d-grid gap-2">
          <button id="SignIn" class="btn btn-primary">Login</button>
        </div>
        <div class="d-grid gap-2 mt-3 mb-5 text-center">
          <span style="color: #fff;">Belum punya akun ? Silahkan <a href="register.php" class="text-center  text-decoration-none" style="color:#d8db64; font: bold;">Register</a></span>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $("#SignIn").click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        if (username.length == "") {
          Swal.fire({
            title: 'Oops...',
            text: 'Username must be filled dumbass!'
          });
        } else if (password.length == "") {
          Swal.fire({
            title: 'Oops...',
            text: 'Password must be filled dumbass!'
          });
        } else {
          $.ajax({
            url: "cek_login.php",
            type: "POST",
            dataType: "json",
            data: {
              "username": username,
              "password": password
            },
            success: function(response) {
              console.log(response)
              if (response.status == true) {
                Swal.fire({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                    // timer: 2000,
                    showCancelButton: false,
                    // showConfirmButton: true
                  })
                  .then(function() {
                    if (response.id_status == '1') {
                      window.location.href = "Dashboard/index.php";
                    } else if (response.id_status == '2') {
                      window.location.href = "Dashboard/index.php";
                    } else if (response.id_status == '3') {
                      window.location.href = "home.php";
                    } else if (response.id_status == '4') {
                      window.location.href = "home.php";
                    }
                  });
              } else if (response.status == false) {
                Swal.fire({
                  icon: response.icon,
                  title: response.title,
                  text: response.text,
                });
              }
            },
            error: function(response) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Server Error!',
              });
            }
          })
        }
      });
    });
  </script>
</body>

</html>