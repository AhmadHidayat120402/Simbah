<?php
require 'connect.php';
if (isset($_POST['register'])) {


  $username = $_POST['username'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $password = mysqli_escape_string($koneksi, $_POST['password']);
  $level = $_POST['level'];

  $query = "INSERT INTO users (username,nama_lengkap,email,password,level) VALUES ('$username','$nama_lengkap','$email','$password','$level')";

  $result = mysqli_query($koneksi, $query);
  header('location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="vendor/boostrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/icons/css/boxicons.min.css">
  <link rel="stylesheet" href="styles/register.css">
  <title>Simbah</title>
</head>

<body>
  <div class="global-container">
    <div class="card login-form">
      <div class="card-body">
        <h1 class="card-title text-center text-white">
          Register
        </h1>
      </div>
      <div class="card-text">
        <form method="POST" action="register.php">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your username" required name="username">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">nama lengkap</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your nama lengkap" required name="nama_lengkap">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your email" required name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Input your password" required name="password">
          </div>
          <div class="mb-3">
            <select class="form-control" name="level" id="level">
              <option value="owner">owner</option>
              <option value="karyawan">karyawan</option>
              <option value="member">member</option>
              <option value="pelanggan">pelanggan</option>
            </select>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="register">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>