<?php

require 'connect.php';
include 'session.php';
// include 'Dashboard/pembelian.php';
// include 'Dashboard/detail_pembelian.php';



if (empty($_SESSION['id_pembeli'])) {
  echo "<script>document.location='login.php'</script>";
}
$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);

$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

// jika belum ada data pembayaran
if (empty($pecah)) {
  echo "<script>alert('belum ada data pembayaran ');</script>";
  echo "<script>location = 'riwayat.php'</script>";
  exit();
}

// jika data pelanggan yang bayar tidak sesuai denagn yang login
if ($_SESSION['identitas']['id_pembeli'] !== $pecah['id_pembeli']) {
  echo "<script>alert('anda tidak berhak mengakses halaman ini ! ');</script>";
  echo "<script>location = 'riwayat.php'</script>";
  exit();
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
//   echo "<script>alert('keranjang kosong, silahkan belanja terlebih dahulu !' )</script>";
//   echo "<script>location = 'home.php';</script>";
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="vendor/boostrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/icons/css/boxicons.min.css">
  <link rel="shortcut icon" href="Dashboard/img/fruit.png">

  <!-- cdn -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

  <title>Lihat Pembayaran</title>

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
        <!-- <a href="cart.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a> -->

        <a href="riwayat.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"><i class="bx bx-cart text-white"></i> Riwayat Belanja</a>

        <a href="profile.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $result['username'] ?>

          <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i>Logout</a>
          <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->
      </div>
    </div>
  </nav>

  <section class="kontent">
    <div class="container boxs p-4">
      <h2 class="fw-bold">Lihat Pembayaran <?php echo $_SESSION['identitas']['nama_lengkap']; ?></h2>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <tr>
              <th>Nama</th>
              <td><?php echo $pecah['nama']; ?></td>
            </tr>
            <tr>
              <th>Bank</th>
              <td><?php echo $pecah['bank']; ?></td>
            </tr>
            <tr>
              <th>Tanggal</th>
              <td><?php echo $pecah['tanggal']; ?></td>
            </tr>
            <tr>
              <th>Jumlah</th>
              <td>Rp <?php echo number_format($pecah['jumlah']); ?></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <img src="bukti_pembayaran/<?php echo $pecah['bukti']; ?>" alt="image" class="img-responsive text-center" width="300px">
        </div>

      </div>
  </section>
  <footer class="footerCuy footer_home">
    <div class="container">
      <div class="text-center" style="margin-top:290px ;">
        <h6 class="section-footer">Copyright &copy; 2022 SiMbah</h6>
      </div>
    </div>
  </footer>

  <script src="vendor/boostrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>