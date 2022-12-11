<?php

require 'connect.php';
include 'session.php';
// include 'Dashboard/pembelian.php';
// include 'Dashboard/detail_pembelian.php';

$id_produk = $_GET['id'];

// query ambil data
$query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_produk'");
$ambil_query_barang = mysqli_fetch_array($query_barang);

// echo "<pre>";
// print_r($ambil_query_barang);
// echo "</pre>";

if (empty($_SESSION['id_pembeli'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='login.php'</script>";
}

if (empty($_GET['id'])) {
  echo "<script>alert('belum ada buah dikeranjang pembelian');</script>";
  echo "<script>location='home.php';</script>";
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
  <title>Nota Pembelian</title>

</head>

<body>

  <?php include 'header.php'; ?>

  <section class="kontent">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/images_buah/<?php echo $ambil_query_barang['image']; ?>" alt="image_produk" class="img-thumbnail rounded">
        </div>
        <div class="col-md-6">
          <h2> <?php echo $ambil_query_barang['nama_barang'] ?></h2>
          <h4 class="mt-3">Rp <?php echo number_format($ambil_query_barang['harga_jual']); ?></h4>
          <h5>Stok : <?php echo $ambil_query_barang['stok']; ?></h5>
          <form action="" method="post">
            <div class="form-group">
              <div class="input-group mt-5">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus dolorem placeat, quae quod eveniet laborum eaque dolores quas adipisci ducimus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum, quas ullam recusandae est quod enim laborum doloremque atque? Hic, atque?</p>
                <input type="number" name="jumlah" id="" class="form-control" style="background-color: white !important;" placeholder="masukkan jumlah buah yang ingin dibeli" min="1" max="<?php echo $ambil_query_barang['stok']; ?>">
                <div class="input-group-btn">
                  <button class="btn btn-primary" name="beli">Beli</button>
                </div>
              </div>
            </div>
          </form>
          <?php
          // jika ada tombol beli atau tombol beli diklik
          if (isset($_POST['beli'])) {
            // mendapatkan jumlah yang diinputkkan
            $jumlah = $_POST['jumlah'];

            // masukkan dikeranjang belanja
            $_SESSION['keranjang'][$id_produk] = $jumlah;

            echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
            echo "<script>location='cart.php';</script>";
          }


          ?>




          <p><?php echo $ambil_query_barang['deskripsi']; ?></p>
        </div>
      </div>

    </div>
  </section>

  <script src="vendor/boostrap/js/bootstrap.min.js"></script>
</body>

</html>