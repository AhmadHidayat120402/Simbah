<?php

session_start();
include 'connect.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' and password = '$password'");

  $user_valid = mysqli_fetch_array($cek_user);

  // uji jika email terdaftar
  if ($user_valid) {
    //  jika username terdaftar
    // cek password sesuai atau tidak
    if ($password == $user_valid['password'] && $id_status = $user_valid['id_status']) {

      // jika password sesuai buat session

      session_start();
      $_SESSION['id_pembeli'] = $user_valid['id_pembeli'];
      $_SESSION['identitas'] = $user_valid;
      echo $success =  "Login berhasil";
      //  uji level user
      if ($id_status == 1) {
        header('location: Dashboard/index.php');
      } elseif ($id_status == 2) {
        header('location: Dashboard/index.php');
      } elseif ($id_status == 3) {
        header('location: home.php');
      } elseif ($id_status == 4) {
        header('location: home.php');
      }
    } else {
      echo $errorr = 'Maaf, login gagal, password anda tidak sesuai!';
      header('login.php');
    }
  } else {
    echo $errorr = 'Maaf, login gagal, password anda tidak sesuai!';
    header('login.php');
  }
}
// else {
//     echo "<script>alert('Maaf, login gagal, password anda tidak sesuai!'); document.location='login.php'</script>";
//   }
// } else {
//   echo "<script>alert('Maaf, login gagal, username anda tidak terdaftar'); document.location='login.php'</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="vendor/boostrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/icons/css/boxicons.min.css">
  <link rel="stylesheet" href="styles/login.css">
  <title>Simbah</title>
</head>

<body>

  <div class="global-container">
    <div class="card login-form">
      <h1 class="card-title text-center text-white mb-5">
        Login
      </h1>
      <div class="card-text">
        <form method="POST" action="cek_login.php">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Username</label>
            <input type="text" class="form-control btn-login-form" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username" required autofocus name="username">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Password</label>
            <input type="password" class="form-control btn-login-form" id="exampleInputPassword1" placeholder="Masukkan Password" required name="password">
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
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
          <div class="d-grid gap-2 mt-3 mb-5">
            <span style="color: #fff;">Belum punya akun? <a href="register.php" class="text-center  text-decoration-none" style="color:#d8db64; font: bold;">Register</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>