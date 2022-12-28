<?php

// include 'session.php';
include 'connect.php';

session_start();

if (empty($_SESSION['id_pembeli'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='login.php'</script>";
}
$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);

// $_SESSION['keranjang'];
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";



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

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <title>Simbah</title>
</head>


<body>

  <?php include 'header.php'; ?>


  <section class="content-cart mt-5">
    <div class="container">
      <h1 class="cart-title">Produk Cart</h1>
      <table class="table table-striped" id="cart">
        <thead class="thead-inverse">
          <tr>
            <th>No</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php if (isset($_SESSION['keranjang'])) { ?>

            <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
              // menampilkan produk yang sedang diperulangkan berdasarkan id_produk
              $ambil = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_produk'");
              $pecah = mysqli_fetch_array($ambil);
              $total = $pecah['harga_jual'] * $jumlah;
              // echo "<pre>";  
              // echo print_r($pecah);
              // echo "</pre>";
            ?>

              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $pecah['nama_barang']; ?></td>
                <td> Rp <?php echo number_format($pecah['harga_jual']); ?></td>
                <td><?php echo $jumlah; ?></td>
                <td>Rp <?php echo number_format($total); ?></td>
                <td>
                  <a href="hapuscart.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>

                  <!-- // if (isset($_GET['id'])) {
                //   $insert = mysqli_query($koneksi, "INSERT INTO cart (nama,harga,jumlah,total_harga) VALUES ('$pecah[nama_barang]','$pecah[harga_jual]','$jumlah','$total')");
                // } -->
                </td>
              </tr>
              <?php $no++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
      <a href="home.php" class="btn btn-primary"><i class="bx bx-cart text-black"></i> Lanjutkan Belanja</a>
      <a href="checkout.php" class="btn btn-primary "><i class='bx bxs-share bx-flip-horizontal '></i> Bayar Sekarang</a>
      <!-- <div class="card mt-5 m x-auto" style="width: 18rem;">
        <div class=" card-body text-center">
          <h5 class="card-title">Checkout</h5>
          <p class="card-text">Total : Rp 30.000</p>
          <hr>
          <a href="#" class="btn btn-primary">Checkout</a>
        </div>
      </div> -->
      <!-- <div class="card-checkout mt-5">
        <div class="card border-primary">
          <div class="card-body">
            <h4 class="card-title text-center">Checkout</h4>
            <p class="card-text text-center ">Total : Rp 75000</p>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary w-100">Checkout</button>
          </div>
        </div>
      </div> -->


    </div>
    <script>
      $(document).ready(function() {
        $('#cart').DataTable();
      });
    </script>
    </div>
  </section>

  <footer class="footerCuy footer_home">
    <div class="container">
      <div class="text-center" style="margin-top:290px ;">
        <h6 class="section-footer">Copyright &copy; 2022 SiMbah</h6>
      </div>
    </div>
  </footer>


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

  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <?php
  if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
    //   $eror = "keranjang kosong, silahkan belanja terlebih dahulu !";
    //   echo "<script>
    //   Swal.fire({
    //   icon: 'error',
    //   title: ' $eror',
    //           }).then((result) => {
    //   window.location.href = 'home.php';
    // })
    //     </script>";

    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'keranjang kosong, silahkan belanja terlebih dahulu ! ',
              }).then((result) => {
      window.location.href = 'home.php';
  })
    </script>";

    // echo "<script>location = 'home.php';</script>";
    // $success = "Data Ongkir Berhasil Disimpan";

    // echo "<script>

    //             </script>";
  }
  ?>
</body>

</html>