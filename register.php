<?php
require 'connect.php';
if (isset($_POST['register'])) {

  $nama_lengkap = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $no_telp = $_POST['no_telp'];
  $passVall = $_POST['password'];
  $jk = $_POST['jk'];
  $alamat = $_POST['alamat'];
  $id_status = $_POST['id_status'];

  $query = "INSERT INTO users (nama_lengkap,username,email,no_telp,password,jk,alamat,id_status) VALUES ('$nama_lengkap','$username','$email','$no_telp','$passVall','$jk','$alamat','3')";

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
            <label for="exampleInputEmail1" class="form-label text-white">nama lengkap</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your Name" required name="nama_lengkap">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your username" required name="username">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your email" required name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">No Telepon</label>
            <input type="tel" class="form-control" id="exampleInputPassword1" placeholder="Input your password" required name="no_telp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Input your password" required name="password">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Jenis Kelamin</label>
            <p><input type="radio" name="jk" id="jk" value=" pria" checked='checked'> Pria</p>
            <p><input type="radio" name="jk" id="jk" value=" perempuan"> Perempuan</p>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Alamat</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Input your address" required name="alamat">
          </div>

          <!-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your email" required name="email">
          </div> -->


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