<?php

include 'session.php';
include 'connect.php';

// session_start();

if (empty($_SESSION['id_pembeli'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='login.php'</script>";
}
$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);

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
  <title>Simbah</title>
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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Packages
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Aneka buah</a></li>
              <li><a class="dropdown-item" href="#">Buah favorite</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Selengkapnya
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Kata customers</a></li>
              <li><a class="dropdown-item" href="#">Alamat</a></li>
              <li><a class="dropdown-item" href="#">Media sosial</a></li>
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

  <section class="content-cart">
    <div class="container">
    <h2>Detail Pembelian</h2>
<?php
require 'connect.php';

$query_pembelian = "SELECT * FROM users JOIN pembelian ON pembelian.id_pembeli = users.id_pembeli WHERE pembelian.id_pembelian = '$_GET[id]'";

$hasil_keputusan = mysqli_query($koneksi, $query_pembelian);
$ambil = mysqli_fetch_array($hasil_keputusan);
?>
<pre><?php print_r($ambil); ?></pre>
<strong><?php echo $ambil['username']; ?></strong> <br>
<p>
  <?php echo $ambil['no_telp']; ?> <br>
  <?php echo $ambil['email']; ?>
</p>
<p>
  Tanggal : <?php echo $ambil['tanggal_pembelian']; ?> <br>
  Total : Rp <?php echo $ambil['total_pembelian']; ?>
</p>
<div class="table-responsive">
  <table id="detail_pembelian" class="table table-striped table-bordered w-100 nowrap" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>SubTotal</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require 'connect.php';
      $no = 1;
      $query_produk = mysqli_query($koneksi, "SELECT * FROM pembelian_buah JOIN barang ON pembelian_buah.id_barang =  barang.id_barang WHERE pembelian_buah.id_pembelian ='$_GET[id]'");
      while ($ambil_query = mysqli_fetch_array($query_produk)) { ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $ambil_query['nama_barang']; ?></td>
          <td><?php echo $ambil_query['harga_jual']; ?></td>
          <td><?php echo $ambil_query['jumlah']; ?></td>
          <td>
            <?php echo $ambil_query['harga_jual'] * $ambil_query['jumlah']; ?>
          </td>
        </tr>
      <?php }

      ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#detail_pembelian').DataTable();
  });
</script>
    </div>
  </section>


  <!-- <footer class="py-5 footerCuy footer-detail ">
    <div class="container">
      <div class="row mx-auto">
        <div class="col md-3">
          <a href="#" class="text-decoration-none">
            <h4 class="fw-bold ">SiMbah</h4>
          </a>
          <p class="section-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus.</p>
          <h6 class="section-footer">Copyright &copy; 2022 SiMbah</h6>
        </div>
        <div class="col md-2">
          <h5 class="section-judul fw-bold">Menu</h5>
          <p class="section-description">Tentang Kami</p>
          <p class="section-description">Hubungi Kami</p>
          <p class="section-description">Article</p>
        </div>
        <div class="col md-2">
          <h5 class="section-judul fw-bold">Bantuan</h5>
          <p class="section-description">Keranjang Buah</p>
          <p class="section-description">Konfirmasi Pembayaran</p>
          <p class="section-description">Testimoni Pembayaran</p>
        </div>
        <div class="col md-2">
          <h5 class="section-judul fw-bold">Punya pertanyaan ? </h5>
          <p class="section-description">Indonesia</p>
          <p class="section-description">Singapore</p>
          <p class="section-description">Thailand</p>
        </div>
        <div class="col md-2">
          <h5 class="section-judul fw-bold">Social Media</h5>
          <p class="section-description">Berikut merupakan sosial media yang kami gunakan untuk melakukan promosi</p>
          <p class="section-description d-flex gap-4">
            <i><img src="images/img/logo_ig.jpg" alt="" width="40px"></i>
            <i><img src="images/img/logo_facebook.jpg" alt="" width="40px"></i>
            <i><img src="images/img/logo_twitter1.jpg" alt="" width="35px"></i>
            <i><img src="images/img/logo_WA2.jpg" alt="" width="40px"></i>
          </p>
        </div>
      </div>
    </div>
  </footer> -->

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>