<?php

require 'connect.php';
include 'session.php';
// include 'Dashboard/pembelian.php';
// include 'Dashboard/detail_pembelian.php';



if (empty($_SESSION['id_pembeli'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='login.php'</script>";
}
$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);


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

  <!-- cdn -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

  <title>Nota Pembelian</title>

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
        <a href="cart.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a>

        <a href="register.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $result['nama_lengkap'] ?>

          <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i>Logout</a>
          <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->
      </div>
    </div>
  </nav>

  <section class="kontent">
    <div class="container">
      <h2 class="fw-bold">Riwayat Belanja <?php echo $_SESSION['identitas']['nama_lengkap']; ?></h2>
      <div class="table-responsive">
        <table class="table table-bordered mt-5" id="riwayat">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Total</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <!-- mendapatkan id_pembeli yang login dari session -->
            <?php
            $no = 1;
            $id_pembeli = $_SESSION['identitas']['id_pembeli'];
            $tampil_data = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembeli = '$id_pembeli' ");
            while ($ambil_data = mysqli_fetch_array($tampil_data)) {
            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ambil_data['tanggal_pembelian']; ?></td>
                <td>
                  <?php echo $ambil_data['status_pembayaran']; ?> <br>
                  <?php
                  if (!empty($ambil_data['resi_pengiriman'])) { ?>
                    Resi : <?php echo $ambil_data['resi_pengiriman']; ?>
                  <?php } ?>

                </td>
                <td> Rp <?php echo number_format($ambil_data['total_pembelian']); ?></td>
                <td>
                  <a href="nota.php?id=<?php echo $ambil_data['id_pembelian']; ?>" class="btn btn-info">Nota</a>

                  <?php if ($ambil_data['status_pembayaran'] == 'pending') : ?>
                    <a href="pembayaran.php?id=<?php echo $ambil_data['id_pembelian']; ?>" class="btn btn-success"> Input Pembayaran</a>
                  <?php else : ?>
                    <a href="lihat_pembayaran.php?id=<?php echo $ambil_data['id_pembelian']; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                  <?php endif ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#riwayat').DataTable();
      });
    </script>
  </section>

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