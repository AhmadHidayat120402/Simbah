<?php

include 'session.php';
include 'connect.php';

// $query = "SELECT * FROM barang";
// $query_cari = mysqli_query($koneksi, $query);

if (empty($_SESSION['id_pembeli'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='login.php'</script>";
}

// function query($query)
// {
//   global $koneksi;
//   $result = mysqli_query($koneksi, $query);
//   $rows = [];
//   while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//   }
//   return $rows;
// }

// if (isset($_POST['cari'])) {
//   $cari = cari($_POST["search"]);
// }

// function cari($search)
// {
//   $queryy = "SELECT * FROM barang WHERE nama_barang LIKE '%$search%'";
//   return query($queryy);
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
  <title>Simbah</title>
</head>

<body>
  <header>
    <div class="container">
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
                <a class="nav-link active" aria-current="page" href=".">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Packages
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href=".">Aneka buah</a></li>
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
            <form action="" method="POST" class="d-flex align-item-center gap-2 bg-light rounded p-2">
              <div class="input-group ">
                <span class="input-group-text bg-transparent border-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                  </svg>
                </span>
                <input type="search" name="search" id="search" class=" form-control bg-transparent border-0 " placeholder="cari buah" autofocus autocomplete="off">
              </div>
              <button type="submit" class="btn btn-primary" name="cari">Go</button>

            </form>

            <?php
            $query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
            $query_select = mysqli_query($koneksi, $query);
            $result = mysqli_fetch_array($query_select);
            // print_r($result);
            $tampilan = '';
            if ($result['id_status'] == '3') {
              $tampilan = 'd-none';
            }

            ?>
            <a href="cart.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a>
            <a href="Dashboard/index.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center <?php echo $tampilan ?>"><i class='bx bxs-dashboard text-white'></i></a>
            <!-- <i class='bx bxs-message-dots text-white'></i> -->


            <!-- <a href="register.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-bell text-white'></i></a> -->
            <a href="register.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $result['nama_lengkap'] ?>

            </a>
            <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i> Logout</a>
            <!-- <p class="text-white"></p> -->

            <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->

          </div>
        </div>
      </nav>
      <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
        <div class="container mt-auto">
          <a class="navbar-brand" href="#">
            <h2 class="logo font-italic">SiMbah</h2>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          <i class='bx bx-customize'></i> -->
      <!-- </button>
          <form class="d-flex" role="search">
            <input class="form-control me-2 bg-light" type="search" placeholder="Search buah" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form> --> -->
      <!-- <div class="input-group gap-3">
              <input type="text" class="form-control rounded-3" placeholder="cari buah" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-success align-align-items-center justify-content-center rounded-circle border-light bg-white" type="button" id="button-addon2"><i class="bx bx-search  "></i></button> -->
      <!-- <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto gap-3">
              <li class="nav-item bg-white rounded-3">
                <a class="nav-link " href="#"><i class="bx bx-cart"></i></a>
              </li>
              <li class="nav-item bg-white rounded-3">
                <a class="nav-link" href="#"><i class='bx bx-bell '></i></a>
              </li>
              <li class="nav-item bg-white rounded-3">
                <a class="nav-link" href="#"><i class='bx bx-user'></i></a>
              </li>
            </ul>
          </div>

      </nav> -->

      <div class="content">
        <h1 class="header-title text-white text-capitalize fw-bold"><br><br>Kami menjual buah<br>segar dan
          sehat
        </h1>
        <p class="header-description text-white text fw-light"> Buah yang kami jual beraneka ragam dan tentunya <br> memiliki banyak manfaat bagi tubuh karena <br> buah yang kami jual adalah buah yang <br> berkualitas, segar dan sehat.
        </p>
      </div>
      <!-- <form action="#" method="get" class="d-flex align-item-center gap-2 bg-light rounded p-2">
        <div class="input-group">
          <span class="input-group-text bg-transparent border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </span>
          <input type="search" name="search" id="search" class=" form-control bg-transparent border-0" placeholder="search buah">
        </div>
        <button type="submit" class="btn btn-primary">Go</button>
      </form> -->
    </div>
    </div>
  </header>
  <!-- <nav class="navbar navbar-expand-lg bg-white py-3 fixed-top shadow-sm">
    <div class="container">
      <a href="." class="navbar-brand text-uppercase">
        SiMbah
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"> <i class='bx bx-customize'></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav gap-3 mx-auto">
          <li class="nav-item"><a href="." class="nav-link active">Home</a></li>
          <li class="nav-item"><a href="." class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="." class="nav-link">Services</a></li>
          <li class="nav-item"><a href="." class="nav-link">About Us</a></li>
        </ul>
        <ul class="navbar-nav gap-3">
          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="register.php" class="btn btn-primary rounded-pill fw-medium px-4 py-2">Register</a></li>
        </ul>
      </div> 
    </div>
  </nav> 
  <section class="kategori-buah mt-5" style="background-color: #f8f8fb;">
    <div class="container">
      <h4 class="section-title_home align-items-center justify-content-center fw-bold ">Kategori Buah</h4>
      <div class="row mt-5">
        <div class="col-md-4 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris rounded-pill">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <p class="text-manfaat">Mengonsumsi mangga dapat melindungi kita dari jenis penyakit kanker dan
                mangga mengandung vitamin A.
              </p>
            </div>
            <div class="ratings position-absolute top-0 bg-white p-2">
              <p class="d-flex align-items-center gap-2 m-0 ">
                <i class="bx bxs-star"></i>
                4.9
              </p>
            </div>
          </a>
        </div>
        <div class="col-md-4 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris rounded-pill">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <p class="text-manfaat">Mengonsumsi mangga dapat melindungi kita dari jenis penyakit kanker dan
                mangga mengandung vitamin A.
              </p>
            </div>
            <div class="ratings position-absolute top-0 bg-white p-2">
              <p class="d-flex align-items-center gap-2 m-0 ">
                <i class="bx bxs-star"></i>
                4.9
              </p>
            </div>
          </a>
        </div>
        <div class="col-md-4 mt-3">
          <h4 class="harga-spesial">Harga Spesial</h4>
          <form action="get" class="inputan bg-white p-5 boxs">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg rounded-0" id="specificSizeInputGroupUsername" placeholder="Kode Member">
            </div>
            <button class="btn btn-lg btn-light btn-outline-dark rounded-3 w-100  " type="button">Submit</button>
            <!-- <button class=" btn tombol-submit rounded-3 border-0 btn-lg w-100" type="submit">Submit</button> -->
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>

  <section class="popular-destionation">
    <div class="container">
      <div class="d-flex flex-column flex-sm-column
    flex-md-row align-item-center justify-content-between gap-3 ">
        <h3 class="section-titlee w-50 fw-bold">Aneka Buah</h3>
        <!-- <a href="#" class="btn btn-primary btn btn-outline-dark rounded-0 mt-2 fw-bold">Explore More</a> -->
      </div>

      <div class="row mt-5">

        <?php
        include 'connect.php';
        $produk = mysqli_query($koneksi, "SELECT * FROM  barang");
        while ($hasil = mysqli_fetch_array($produk)) {
        ?>
          <div class="col-md-3 mt-3">
            <div class="thumbnail card boxs border-0">
              <img src="images/images_buah/<?php echo $hasil['image']; ?>" alt="gunung bromo" class="images">
              <div class="card-body">
                <h4 class="card-title fw-bold"><?php echo $hasil['nama_barang']; ?></h4>
                <p class="d-flex align-items-center gap-2">
                  <i class="laris rounded-pill">Tersedia</i>
                  <?php echo number_format($hasil['harga_jual']); ?> / kg
                </p>
                <hr>
                <!-- <button type="button" class="btn btn-outline-dark rounded-pill">Add To Cart</button> -->
                <a href="beli.php?id=<?php echo $hasil['id_barang'] ?>" class="btn btn-outline-dark rounded-pill">Add To Cart</a>
                <!-- <input type="submit" class="btn btn-outline-dark rounded-pill" value="add to cart" name="add_to_cart"> -->
                <a href="detail_page.php" class="btn btn-outline-dark rounded-pill">Detail</a>
              </div>
              <div class="ratings position-absolute top-0 bg-white p-2">
                <p class="d-flex align-items-center gap-2 m-0 ">
                  <i class="bx bxs-star"></i>
                  4.9
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
  </section>

  <footer class="py-5 footerCuy footer_home">
    <div class="container">
      <div class="row mx-auto">
        <div class="col md-3">
          <a href="#" class="text-decoration-none">
            <h4 class="fw-bold">SiMbah</h4>
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
            <a href="#"><i><img src="images/img/logo_ig.jpg" alt="" width="40px"></i></a>
            <a href="#"><i><img src="images/img/logo_facebook.jpg" alt="" width="40px"></i></a>
            <a href="#"><i><img src="images/img/logo_twitter1.jpg" alt="" width="35px"></i></a>
            <a href="#"><i><img src="images/img/logo_WA2.jpg" alt="" width="40px"></i></a>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>