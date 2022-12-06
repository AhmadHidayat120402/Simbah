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
          <?php } ?>
        </tbody>
      </table>
      <form action="" method="POST">

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="nama" id="nama" readonly value="<?php echo $_SESSION['identitas']['username'] ?>" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="nama" id="nama" readonly value="<?php echo $_SESSION['identitas']['no_telp'] ?>" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <select name="ongkir" id="ongkir">
              <option value="0">pilih ongkos kirim</option>
              <option value="0"></option>
              <option value="0"></option>
            </select>
          </div>
        </div>

      </form>

    </div>
    </div>
  </section>
  <pre>
  <?php print_r($_SESSION['identitas']) ?>
</pre>



  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>