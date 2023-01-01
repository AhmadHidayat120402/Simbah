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
  <link rel="shortcut icon" href="Dashboard/img/fruit.png">
  <title>Simbah</title>
</head>

<body>
  <div class="global-container">
    <div class="card login-form">
      <div class="card-body">
        <h1 class="card-title text-center text-white pt-0">
          Register
        </h1>
      </div>
      <div class="card-text mt-2">
        <form method="POST" action="register.php">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Nama lengkap</label>
            <input type="text" class="form-control btn-register-form nama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama" required name="nama_lengkap">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Username</label>
            <input type="text" class="form-control btn-register-form namaUnik" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username" required name="username">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Email</label>
            <input type="email" class="form-control btn-register-form email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email" required name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">No Telepon</label>
            <input type="text" class="form-control btn-register-form no" id="exampleInputPassword1" placeholder="Masukkan No Telepon" required name="no_telp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Password</label>
            <input type="password" class="form-control btn-register-form pass" id="exampleInputPassword1" placeholder="Masukkan Password" required name="password">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-check-label text-white mb-2">Jenis Kelamin</label>
            <div class="p-2 btn-register-form text-white-50" id="jk">
              <p class="m-0 mb-1"><input type="radio" class="form-check-input" name="jk" id="jk" value="laki-laki"> Laki-laki</p>
              <p class="m-0"><input type="radio" class="form-check-input" name="jk" id="jk" value="perempuan"> Perempuan</p>
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Alamat</label>
            <input type="text" class="form-control btn-register-form alamat" id="exampleInputPassword1" placeholder="Masukkan Alamat" required name="alamat">
          </div>

          <!-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your email" required name="email">
          </div> -->


          <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary" name="register" id="register">Submit</button>
          </div>
          <div class="d-grid gap-2 mt-3 mb-5 text-center">
            <span style="color: #fff;">Sudah punya akun ? Silahkan <a href="login.php" class="text-center  text-decoration-none" style="color:#d8db64; font: bold;">Login</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="vendor\sweetalert\dist\sweetalert2.all.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $('#register').click(function(e) {

        var valid = this.form.checkValidity();
        if (valid) {

          var namaLengkap = $('.nama').val();
          var username = $('.namaUnik').val();
          var email = $('.email').val();
          var noTelpon = $('.no').val();
          var password = $('.pass').val();
          var jeniskelamain = $('#jk').val();
          var alamat = $('.alamat').val();
          Swal.fire({
            icon: 'success',
            title: 'ANDA BERHASIL LOGIN',
            text: 'Semoga Harinya Menyenangkan ❤️',

            // timer: 50000

            timer: 40000,
            showConfirmButton: true


          }).then((result) => {
            window.location.href = 'login.php'
          })
          // })
        } else {
          alert('Masukkan data anda');
        }
      });
    });
  </script>
</body>

</html>