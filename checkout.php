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

// $_SESSION['keranjang'];
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
  echo "<script>alert('keranjang kosong, silahkan belanja terlebih dahulu !' )</script>";
  echo "<script>location = 'home.php';</script>";
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
      <h1 class="cart-title">Produk Cart</h1>
      <table class="table table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>No</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>

          </tr>
        </thead>

        <tbody>
          <?php $no = 1; ?>
          <?php $totalbelanja = 0; ?>
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

            </tr>
            <?php $no++; ?>
            <?php $totalbelanja += $total; ?>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">Total Belanja</th>
            <th>Rp <?php echo number_format($totalbelanja); ?></th>
          </tr>
        </tfoot>
      </table>
      <form action="" method="POST">

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="nama" id="nama" readonly value="<?php echo $_SESSION['identitas']['username'] ?>" class="form-control" style="background-color: white !important;">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="nama" id="nama" readonly value="<?php echo $_SESSION['identitas']['no_telp'] ?>" class="form-control" style="background-color: white !important;">
            </div>
          </div>
          <div class="col-md-4">
            <select name="id_ongkir" id="ongkir" class="form-select" style="background-color: white !important;" aria-label="Default select example">
              <option value="0">pilih ongkos kirim</option>
              <?php
              include 'connect.php';
              $ongkir  = mysqli_query($koneksi, "SELECT * FROM ongkir");
              while ($ambil_ongkir = mysqli_fetch_array($ongkir)) {
              ?>
                <option value="<?php echo $ambil_ongkir['id_ongkir'] ?>">
                  <?php echo $ambil_ongkir['nama_daerah'] ?> -
                  Rp <?php echo number_format($ambil_ongkir['tarif']) ?>
                </option>
              <?php }; ?>
            </select>
          </div>
        </div>
        <button class="btn btn-primary mt-4" name="checkout">Checkout</button>
      </form>
      <?php

      if (isset($_POST['checkout'])) {
        $id_pelanggan = $_SESSION['identitas']['id_pembeli'];
        $id_ongkir = $_POST['id_ongkir'];
        $tanggal_pembelian  = date('Y-m-d');

        $ambil_tarif = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
        $arraytarif = mysqli_fetch_array($ambil_tarif);
        $tarif = $arraytarif['tarif'];

        $total_pembelian = $totalbelanja + $tarif;

        // menyimpan data ke tabel pembelian
        $simpan = mysqli_query($koneksi, "INSERT INTO pembelian (id_pembeli,id_ongkir,tanggal_pembelian,total_pembelian) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian')");

        // mendapatkan id pembelian barusan terjadi
        $id_pembelian_barusan = $koneksi->insert_id;

        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
          $queri_insert = mysqli_query($koneksi, "INSERT INTO pembelian_buah (id_pembelian,id_barang,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
        }

        // mengkosongkan keranjang belanja
        unset($_SESSION['keranjang']);


        // tampilan dialihkan kehalaman nota, dari pembelian barusan
        echo "<script>alert('pembelian sukses');</script>";
        echo "<script>location = 'nota.php?id=$id_pembelian_barusan';</script>";
      }


      ?>
    </div>
    </div>
  </section>
  <pre>
  <?php print_r($_SESSION['identitas']) ?>
  <?php print_r($_SESSION['keranjang']) ?>
</pre>



  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>