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
  <script src="vendor/boostrap/js/jquery-3.6.1.min.js"></script>
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
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
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
        <!-- <a href="cart.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a> -->

        <a href="profile.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $result['username'] ?>

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
          <div class="col-md-3">
            <div class="form-group">
              <input type="text" name="nama" id="nama" readonly value="<?php echo $_SESSION['identitas']['username'] ?>" class="form-control" style="background-color: white !important;">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <input type="text" name="nama" id="nama" readonly value="<?php echo $_SESSION['identitas']['no_telp'] ?>" class="form-control" style="background-color: white !important;">
            </div>
          </div>
          <div class="col-md-3">
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
          <div class="col-md-3">
            <?php

            if ($result['id_status'] == '3') { ?>


              <input type="hidden" name="diskonn" id="" placeholder="masukkan diskon tanpa %" class="form-control" style="background-color: white !important;">
            <?php } else { ?>
              <input type="number" name="diskon" id="" placeholder="masukkan diskon tanpa %" class="form-control" style="background-color: white !important;" min="1">
            <?php } ?>
          </div>

        </div>
        <div class="form-group mt-3">
          <label for="">Alamat Lengkap Pengiriman</label>
          <textarea name="alamat_pengiriman" id="alamat_pengiriman" cols="20" rows="3" class="form-control" placeholder="masukkan alamat lengkap pengiriman (termasuk kode pos)" style="background-color: white !important;"></textarea>

        </div>

        <button class="btn btn-primary mt-4" name="checkout">Checkout</button>
      </form>
      <?php

      if (isset($_POST['checkout'])) {
        if ($result['id_status'] == '4' or $result['id_status'] == '2' or $result['id_status'] == '1') {
          $id_pelanggan = $_SESSION['identitas']['id_pembeli'];
          $id_ongkir = $_POST['id_ongkir'];
          $diskonku = $_POST['diskon'];
          $tanggal_pembelian  = date('Y-m-d');
          $alamat_pengiriman = $_POST['alamat_pengiriman'];

          $ambil_tarif = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
          $arraytarif = mysqli_fetch_array($ambil_tarif);
          $tarif = $arraytarif['tarif'];
          $nama_daerah = $arraytarif['nama_daerah'];


          $total_pembelian = $totalbelanja + $tarif;
          $total_all =   $total_pembelian - (($diskonku * 100000) / 100);
          // $total_all = $total_pembelian * $diskonku / 100;

          // menyimpan data ke tabel pembelian
          $simpan = mysqli_query($koneksi, "INSERT INTO pembelian (id_pembeli,id_ongkir,diskon,tanggal_pembelian,total_pembelian,nama_daerah,tarif,alamat_pengiriman,status_pembayaran,resi_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$diskonku','$tanggal_pembelian','$total_all','$nama_daerah','$tarif','$alamat_pengiriman','pending','null')");

          // mendapatkan id pembelian barusan terjadi
          $id_pembelian_barusan = mysqli_insert_id($koneksi);


          foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

            // mendapatkan data produk berdasrkan id_produk
            $insert_query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_produk'");
            $ambil_insert_query = mysqli_fetch_array($insert_query);

            $nama_buah = $ambil_insert_query['nama_barang'];
            $harga_buah = $ambil_insert_query['harga_jual'];
            $berat_buah = $ambil_insert_query['berat_buah'];

            $subberat = $ambil_insert_query['berat_buah'] * $jumlah;
            $subharga = $ambil_insert_query['harga_jual'] * $jumlah;

            $queri_insert = mysqli_query($koneksi, "INSERT INTO pembelian_buah (id_pembelian,id_barang,jumlah,nama,harga,berat,subberat,subharga) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama_buah','$harga_buah','$berat_buah','$subberat','$subharga')");

            // skrip update stok
            $koneksi->query("UPDATE barang SET stok = stok - $jumlah WHERE id_barang = '$id_produk'");
          }
          // mengkosongkan keranjang belanja
          unset($_SESSION['keranjang']);
          // tampilan dialihkan kehalaman nota, dari pembelian barusan
          echo "<script>alert('pembelian sukses');</script>";
          echo "<script>location = 'nota.php?id=$id_pembelian_barusan';</script>";
        } elseif ($result['id_status'] == '3') {

          $id_pelanggan = $_SESSION['identitas']['id_pembeli'];
          $id_ongkir = $_POST['id_ongkir'];
          $tanggal_pembelian  = date('Y-m-d');
          $alamat_pengiriman = $_POST['alamat_pengiriman'];

          $ambil_tarif = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
          $arraytarif = mysqli_fetch_array($ambil_tarif);
          $tarif = $arraytarif['tarif'];
          $nama_daerah = $arraytarif['nama_daerah'];

          $total_pembelian = $totalbelanja + $tarif;

          // menyimpan data ke tabel pembelian
          $simpan = mysqli_query($koneksi, "INSERT INTO pembelian (id_pembeli,id_ongkir,diskon,tanggal_pembelian,total_pembelian,nama_daerah,tarif,alamat_pengiriman,status_pembayaran,resi_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','0','$tanggal_pembelian','$total_pembelian','$nama_daerah','$tarif','$alamat_pengiriman','pending','null')");

          // mendapatkan id pembelian barusan terjadi
          $id_pembelian_barusan = mysqli_insert_id($koneksi);

          foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

            // mendapatkan data produk berdasrkan id_produk
            $insert_query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_produk'");
            $ambil_insert_query = mysqli_fetch_array($insert_query);

            $nama_buah = $ambil_insert_query['nama_barang'];
            $harga_buah = $ambil_insert_query['harga_jual'];
            $berat_buah = $ambil_insert_query['berat_buah'];

            $subberat = $ambil_insert_query['berat_buah'] * $jumlah;
            $subharga = $ambil_insert_query['harga_jual'] * $jumlah;

            $queri_insert = mysqli_query($koneksi, "INSERT INTO pembelian_buah (id_pembelian,id_barang,jumlah,nama,harga,berat,subberat,subharga) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama_buah','$harga_buah','$berat_buah','$subberat','$subharga')");

            // skrip update stok
            $koneksi->query("UPDATE barang SET stok = stok - $jumlah WHERE id_barang = '$id_produk'");
          }

          // mengkosongkan keranjang belanja
          unset($_SESSION['keranjang']);


          // tampilan dialihkan kehalaman nota, dari pembelian barusan
          echo "<script>alert('pembelian sukses');</script>";
          echo "<script>location = 'nota.php?id=$id_pembelian_barusan';</script>";
        }
      }


      ?>
    </div>
    </div>
  </section>
  <pre>
  <?php //print_r($_SESSION['identitas']) 
  ?>
  <?php //print_r($_SESSION['keranjang']) 
  ?>
</pre>



  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>