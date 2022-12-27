<?php
include 'connect.php';
include 'session.php';
$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);

$keyword = $_GET['keyword'];

$semuadata = [];
$ambil = $koneksi->query("SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'");

// asumsi pencarian banyak maka pakai perulangan

while ($pecah = $ambil->fetch_assoc()) {
  $semuadata[] = $pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
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
  <title>Pencarian</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container-fluid mt-auto">
      <a class="navbar-brand" href="index.php">
        <h2 class="logo">SiMbah</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <ul class="navbar-nav mx-auto mb-2 mb-lg-0"> -->
        <!-- <li class="nav-item">
                <a href="home.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"> <i class='bx bxs-home text-white'></i> Home</a>
              </li>
              <li class="nav-item">
                <a href="riwayat.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"><i class="bx bx-cart text-white"></i> Riwayat Belanja</a>
              </li> -->
        <!-- </ul> -->

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
        <form action="pencarian.php" method="GET" class="d-flex align-item-center gap-2 bg-light rounded p-2">
          <input type="search" name="keyword" id="search" class=" form-control bg-transparent border-0 " placeholder="cari buah" autofocus autocomplete="off">
          <button class="btn btn-primary">Cari</button>
        </form>

        <?php
        $query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
        $query_select = mysqli_query($koneksi, $query);
        $result = mysqli_fetch_array($query_select);
        // print_r($result);
        $tampilan = '';
        if ($result['id_status'] == '3' or $result['id_status'] == '4') {
          $tampilan = 'd-none';
        }

        ?>
        <a href="cart.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"><i class="bx bx-cart text-white "></i></a>
        <a href="Dashboard/index.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0 <?php echo $tampilan ?>"><i class='bx bxs-dashboard text-white'></i></a>
        <!-- <i class='bx bxs-message-dots text-white'></i> -->


        <!-- <a href="register.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-bell text-white'></i></a> -->

        </a>
        <a href="riwayat.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"><i class="bx bx-cart text-white"></i> Riwayat Belanja</a>

        <a href="profile.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $result['username'] ?>
        </a>
        <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i> Logout</a>
        <!-- <p class="text-white"></p> -->

        <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->

      </div>
    </div>
  </nav>

  <section class="kontent">
    <div class="container">
      <h3 class="fw-bold">Hasil Pencarian : <?php echo $keyword ?></h3>
      <?php
      if (empty($semuadata)) : ?>
        <div class="alert alert-danger">Buah <strong><?php echo $keyword ?></strong> Tidak ditemukan ! </div>
      <?php endif ?>



      <div class="row mt-5">

        <?php foreach ($semuadata as $key => $value) : ?>


          <div class="col-md-3 mt-3">
            <div class="thumbnail card boxs border-0">
              <img src="images/images_buah/<?php echo $value['image']; ?>" alt="gunung bromo" class="images">
              <div class="card-body">
                <h4 class="card-title fw-bold"><?php echo $value['nama_barang']; ?></h4>
                <p class="d-flex align-items-center gap-2">
                  <i class="laris rounded-pill">Tersedia</i>
                  Rp <?php echo number_format($value['harga_jual']); ?> / kg
                </p>
                <hr>
                <!-- <button type="button" class="btn btn-outline-dark rounded-pill">Add To Cart</button> -->
                <a href="beli.php?id=<?php echo $value['id_barang']; ?>" class="btn btn-outline-dark rounded-pill">Add To Cart</a>
                <!-- <input type="submit" class="btn btn-outline-dark rounded-pill" value="add to cart" name="add_to_cart"> -->
                <a href="detail_produk.php?id=<?php echo $value['id_barang']; ?>" class="btn btn-outline-dark rounded-pill">Detail</a>
              </div>
              <div class="ratings position-absolute top-0 bg-white p-2">
                <p class="d-flex align-items-center gap-2 m-0 ">
                  <i class="bx bxs-star" style="color: #d8db64 !important;"></i>
                  4.9
                </p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <script src="vendor/boostrap/js/bootstrap.min.js"></script>
</body>

</html>