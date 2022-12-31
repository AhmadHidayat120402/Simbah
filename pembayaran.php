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


// if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
//   echo "<script>alert('keranjang kosong, silahkan belanja terlebih dahulu !' )</script>";
//   echo "<script>location = 'home.php';</script>";
// }

// mendapatkan id_pembelian dari url
// $idpem = $_GET['id'];
// $tampil_datanya = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
// $ambil_datanya = mysqli_fetch_array($tampil_datanya);

// // mendapatkan id pelanggan yang beli
// $id_pelanggan_beli = $ambil_datanya['id_pembeli'];

// // mendapatkan id pelanggan yang login
// $id_pelanggan_login = $_SESSION['identitas']['id_pembeli'];

// if ($id_pelanggan_login !== $id_pelanggan_beli) {
//   echo "<script> alert ('Anda tidak berhak mengakses halaman ini');</script>";
//   echo "<script>location='riwayat.php';</script>";
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


  <!-- cdn -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

  <title>Nota Pembelian</title>

</head>

<body>
  <?php

  // mendapatkan id_pembelian dari url
  $idpem = $_GET['id'];
  $tampil_datanya = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
  $ambil_datanya = mysqli_fetch_array($tampil_datanya);

  // mendapatkan id pelanggan yang beli
  $id_pelanggan_beli = $ambil_datanya['id_pembeli'];

  // mendapatkan id pelanggan yang login
  $id_pelanggan_login = $_SESSION['identitas']['id_pembeli'];

  if ($id_pelanggan_login !== $id_pelanggan_beli) {
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text : 'Anda tidak berhak mengakses halaman ini',
              }).then((result) => {
      window.location.href = 'riwayat.php';
  })
    </script>";
    // echo "<script> alert ('Anda tidak berhak mengakses halaman ini');</script>";
    // echo "<script>location='riwayat.php';</script>";
  }


  ?>
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

        <a href="profile.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i> <?php echo $result['username'] ?>

          <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i> Logout</a>
          <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->
      </div>
    </div>
  </nav>

  <section class="kontent">
    <div class="container">
      <h2 class="fw-bold">konfirmasi Pembayaran</h2>
      <p>kirim bukti pembayaran anda disini</p>
      <div class="alert alert-info">Total tagihan anda <strong><?php echo number_format($ambil_datanya['total_pembelian']); ?></strong></div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Penyetor</label>
          <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" style="background-color: white !important" ;>
        </div>
        <div class="mb-3">
          <label for="bank" class="form-label">Bank</label>
          <input type="text" class="form-control" id="bank" name="bank" style="background-color: white !important; ">
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" style="background-color: white !important; " min="1">
        </div>
        <div class="mb-3">
          <label for="bukti" class="form-label">Foto Bukti</label>
          <input type="file" class="form-control" id="bukti" name="bukti" style="background-color: white !important; " accept="image/*">
          <p class="text-danger">foto bukti harus JPG maksimal 2MB </p>
        </div>
        <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <?php
    // jika ada tombol kirim

    if (isset($_POST['kirim'])) {
      // upload foto bukti
      $namabukti = $_FILES['bukti']['name'];
      $lokasibukti = $_FILES['bukti']['tmp_name'];
      $namafiks = date("YmdHis") . $namabukti;
      move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

      $nama = $_POST['nama'];
      $bank = $_POST['bank'];
      $jumlah = $_POST['jumlah'];
      $tanggal = date("Y-m-d");

      // simpan pembayaran
      $simpan_bukti = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

      // update data pembelian dari pending sudah kirim pembayarn
      $update_data = mysqli_query($koneksi, "UPDATE pembelian SET status_pembayaran = 'sudah kirim pembayaran' WHERE id_pembelian = '$idpem'");

      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text : 'terima kasih telah mengirimkan bukti pembayaran',
                }).then((result) => {
        window.location.href = 'riwayat.php';
    })
      </script>";
      // echo "<script> alert ('terima kasih telah mengirimkan bukti pembayaran');</script>";
      // echo "<script>location='riwayat.php';</script>";
    }




    ?>

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