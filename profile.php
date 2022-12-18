<?php
require 'connect.php';
include 'session.php';
// if (empty($_SESSION['id_pembeli'])) {
//   echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='login.php'</script>";
// }

$ambil = $koneksi->query("SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]' ");
$pecah = $ambil->fetch_array();

if (isset($_POST['simpan'])) {
  $passlama = $_POST['passlama'];
  $passlbaru = $_POST['passbaru'];

  $ambil = $koneksi->query("SELECT * FROM users");
  $pecah = $ambil->fetch_array();
  if ($passlama == $pecah['password']) {
    $baru = $koneksi->query("UPDATE users SET password = '$passbaru'");
    header('location : login.php');
  }
}

$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);

if (isset($_POST['ubah'])) {

  $ubah = mysqli_query($koneksi, "UPDATE users SET 
      nama_lengkap = '$_POST[nama]',
      username = '$_POST[username]',
      email = '$_POST[email]',
      no_telp = '$_POST[no_telepon]',
      password = '$_POST[password]',
      jk = '$_POST[jenis_kelamin]',
      alamat = '$_POST[alamat]'
      WHERE id_pembeli = '$_SESSION[id_pembeli]'
  ");
  // header('location: member.php');

  if ($ubah) {
    echo "<script>
      alert('ubah data sukses');
      document.location= 'profile.php';
      </script>";
  } else {
    echo "<script>
      alert('ubah data gagal');
      document.location= 'profile.php';
      </script>";
  }
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
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/profile.css">

  <title>Profile</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container-fluid mt-auto">
      <a class="navbar-brand" href="#">
        <h2 class="logo">SiMbah</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Packages
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="home.php">Aneka buah</a></li>
              <li><a class="dropdown-item" href="index.php">Buah favorite</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Selengkapnya
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="index.php">Kata customers</a></li>
              <li><a class="dropdown-item" href="index.php">Alamat</a></li>
              <li><a class="dropdown-item" href="index.php">Media sosial</a></li>
            </ul>
          </li>
        </ul>

        <?php
        $query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
        $query_select = mysqli_query($koneksi, $query);
        $result = mysqli_fetch_array($query_select);
        // print_r($result);
        $tampilan = '';
        if ($result['id_status'] == '3' or $result['id_status'] == '4') {
          $tampilan = 'd-none';
        }

        ?>
        <!-- <a href="cart.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a> -->
        <a href="Dashboard/index.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0 <?php echo $tampilan ?>"><i class='bx bxs-dashboard text-white'></i></a>
        <a href="riwayat.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"><i class="bx bx-cart text-white"></i> Riwayat Belanja</a>

        <a href="profile.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i> <?php echo $result['username'] ?>

          <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i> Logout</a>
          <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->
      </div>
    </div>
  </nav>
  <br><br>
  <div class="container mt-5 boxs mb-5" style="max-width: 600px; margin:0 auto ;">
    <div class="satu" style="max-width: 500px; margin:0 auto ;">
      <div class="card-title text-center mt-5">
        <h3 class="mt-5 py-4">Data User : <?php echo $pecah['username']; ?></h3>
      </div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-black">Nama lengkap</label>
            <input type="text" class="form-control btn-register-form" id="exampleInputEmail1" style="background-color: white !important;" aria-describedby="emailHelp" placeholder="Masukkan Nama" required name="nama" value="<?php echo $pecah['nama_lengkap'] ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-black">Username</label>
            <input type="text" class="form-control btn-register-form" id="exampleInputEmail1" style="background-color: white !important;" aria-describedby="emailHelp" placeholder="Masukkan Username" required name="username" value="<?php echo $pecah['username']; ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-black">Email</label>
            <input type="email" class="form-control btn-register-form" id="exampleInputEmail1" style="background-color: white !important;" aria-describedby="emailHelp" placeholder="Masukkan Email" required name="email" value="<?php echo $pecah['email'] ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-black">No Telepon</label>
            <input type="text" class="form-control btn-register-form" id="exampleInputPassword1" style="background-color: white !important;" placeholder="Masukkan No Telepon" required name="no_telepon" value="<?php echo $pecah['no_telp'] ?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-black">Password</label>
            <input type="password" class="form-control btn-register-form" id="exampleInputPassword1" style="background-color: white !important;" placeholder="Masukkan Password" required name="password" value="<?php echo $pecah['password'] ?>">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
              <option value="<?= $pecah['jk']  ?>">
                <?= $pecah['jk'] ?></option>
              <option value="Laki">Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" style="background-color: white !important;" required><?php echo $pecah['alamat'] ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary" name="ubah">Update</button>

        </form>
      </div>


    </div>
  </div>
  <!-- <div class="card mt-3 mb-4" style="max-width: 500px; margin:0 auto ;">
      <div class="card-title text-center">
        <h3>Ganti Password</h3>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-black">Password Lama</label>
            <input type="password" class="form-control btn-register-form" id="exampleInputPassword1" style="background-color: white !important;" placeholder="Masukkan Password" required name="passwordlama" value="<?php // echo $pecah['password'] 
                                                                                                                                                                                                                      ?>"> -->
  <!-- </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-black">Password Baru</label>
            <input type="password" class="form-control btn-register-form" id="exampleInputPassword1" style="background-color: white !important;" placeholder="Masukkan Password Baru" required name="passwordbaru">
          </div>

          <button type="submit" class="btn btn-primary" name="ubahpass">Update</button>

        </form>
      </div> -->

  </div>
  <footer class="footerCuy footer_home">
    <div class="container">
      <div class="text-center" style="margin-top:290px ;">
        <h6 class="section-footer">Copyright &copy; 2022 SiMbah</h6>
      </div>
    </div>
  </footer>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>