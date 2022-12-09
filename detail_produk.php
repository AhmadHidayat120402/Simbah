<?php

require 'connect.php';
include 'session.php';
// include 'Dashboard/pembelian.php';
// include 'Dashboard/detail_pembelian.php';



$id_produk = $_GET['id'];

// query ambil data
$query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_produk'");
$ambil_query_barang = mysqli_fetch_array($query_barang);

echo "<pre>";
print_r($ambil_query_barang);
echo "</pre>";



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