<?php
session_start();

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
        <a href="register.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a>

        <a href="register.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $_SESSION['username'] ?></a>
        <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->
      </div>
    </div>
  </nav>


  <section class="detail-buah">
    <div class="container">
      <div class="row align-item-center detail-photo">
        <!-- <a href="#" class="row align-item-center detail-photo text-decoration-none"> -->
        <div class="col-md-6">
          <img src="images/img/alpukat.jpg" alt="" class="rounded-3 mb-3 buah-photo" width="500px">
          <div class="image-cut justify-content-center align-items-center border-1">
            <img src="images/img/alpukatt1.png" alt="" width="115px">
            <img src="images/img/alpukatt2.png" alt="" width="115px">
            <img src="images/img/alpukatt3.png" alt="" width="115px">
            <img src="images/img/alpukatt4.png" alt="" width="115px">
          </div>
          <div class="media-sosial mt-2">
            <p class="text-media-sosial mt-1">
              Bagikan
              <i><img src="images/img/logo_ig.jpg" alt="" width="40px"></i>
              <i><img src="images/img/logo_facebook.jpg" alt="" width="40px"></i>
              <i><img src="images/img/logo_twitter1.jpg" alt="" width="35px"></i>
              <i><img src="images/img/logo_WA2.jpg" alt="" width="40px"></i>
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <span class="rounded p-2 fw-bold text-dark category align-item-center">Buah Segar dan sehat</span>
          <h2 class="buah-post -title text-dark text-capitalize mt-3 fw-bold">
            Alpukat Mentega
          </h2>
          <h4 class="rating text-dark align-item-center mt-3">
            4.9
            <i class="bx bxs-star text-warning"></i>
            <i class="bx bxs-star text-warning"></i>
            <i class="bx bxs-star text-warning"></i>
            <i class="bx bxs-star text-warning"></i>
            <i class="bx bxs-star text-warning"></i>
          </h4>
          <h3 class="harga align-item-center text-dark mt-5">
            Rp15.000 - Rp25.000
          </h3>
          <div class="d-flex align-item-center gap-3 justify-content-between">
            <h4 class="kirim align-item-center text-dark mt-5">
              Pengiriman
            </h4>
            <div class="input-kirim">
              <form action="#" method="get" class="d-flex align-item-center gap-2 bg-light rounded p-2">
                <div class="input-group">
                  <input type="search" name="search" id="search" class="form-control bg-transparent border-0" placeholder="Masukkan alamat">
                </div>
                <button type="submit" class="btn btn-primary">Go</button>
              </form>
            </div>
          </div>
          <div class="d-flex align-item-center gap-3 justify-content-between ">
            <h4 class="berat align-item-center text-dark mt-5">
              Berat
            </h4>
            <div class="input-berat">
              <form action="#" method="get" class="d-flex align-item-center gap-2 bg-light rounded p-2">
                <div class="input-group">
                  <input type="number" name="search" id="search" class="form-control bg-transparent border-0" placeholder="berat barang">
                </div>
                <button type="submit" class="btn btn-primary">Go</button>
              </form>
              <!-- <input type="number" class="form-control bg-light " placeholder="Berat barang" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-dark" type="button" id="button-addon2">kirim</button> -->
            </div>
          </div>
          <div class="d-flex align-item-center gap-3 justify-content-between">
            <h4 class="jumlah align-item-center text-dark mt-5">
              Jumlah
            </h4>
            <div class="input-jumlah">
              <form action="#" method="get" class="d-flex align-item-center gap-2 bg-light rounded p-2">
                <div class="input-group">
                  <input type="number" name="search" id="search" class="form-control bg-transparent border-0" placeholder="jumlah barang">
                </div>
                <button type="submit" class="btn btn-primary">Go</button>
              </form>
            </div>
            <!-- <div class="input-group mt-4 ">
              <input type="number" class="form-control bg-light " placeholder="Jumlah barang" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-dark" type="button" id="button-addon2">kirim</button>
            </div> -->
          </div>

          <div class="btn_harga mt-5 d-flex flex-column flex-md-row flex-sm-column gap-5 justify-content-between d-inline">
            <a href="cart.php"><button type="button" class="btn btn-outline-dark rounded-pill"> Add to cart
              </button></a>
            <!-- <button type="button" class="btn btn-outline-dark rounded-pill">Beli</button> -->
          </div>
        </div>
        <!-- </a> -->
      </div>
    </div>
  </section>
  <!-- 
  <section class="detail">
    <div class="buah mt-5">
      <div class="container">
        <div class="d-flex gap-3">
          <div class="card border-0 ">
            <img src="images/img/alpukatt.png" alt="" width="200px">
            <div class="card-body">
              <div class="row mt-2">
                <div class="image-cut justify-content-center align-items-center border-1">
                  <img src="images/img/alpukatt1.png" alt="" width="80px">
                  <img src="images/img/alpukatt2.png" alt="" width="80px">
                  <img src="images/img/alpukatt3.png" alt="" width="80px">
                  <img src="images/img/alpukatt4.png" alt="" width="80px">
                </div>
                <div class="d-flex gap-3 mt-3">
                  <p class="text1">Berkualitas</p>
                  <p class="text1">Grosir</p>
                </div>
              </div>
            </div>
            <div class="media-sosial">
              <p class="text-media-sosial mt-1">
                Bagikan
                <i><img src="images/img/logo_ig.jpg" alt="" width="40px"></i>
                <i><img src="images/img/logo_facebook.jpg" alt="" width="40px"></i>
                <i><img src="images/img/logo_twitter1.jpg" alt="" width="35px"></i>
                <i><img src="images/img/logo_WA2.jpg" alt="" width="40px"></i>
              </p>
            </div>
          </div>
          <div class="text-detail">
            <h2 class="card-title">Alpukat Mentega</h2>
            <div class="rating bg-white p-2">
              <p class="ratings d-flex gap-3 m-0 align-items-center">
                4.9
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
              </p>
            </div>
            <div class="harga mt-5">
              <h3 class="rentang-harga fw-bold dis-inline ">Rp15.000 - Rp25.000</h3>
            </div>
            <div class="kirim mt-5 d-flex flex-column flex-md-row flex-sm-column gap-5 align-items-center justify-content-center harga">
              <h4 class="rentang-harga fw-bold dis-inline text-center m-0">pengiriman</h4>
              <form class="dis-inline m-0">
              <img src="images/img/motor.jpg" alt="" class="dis-inline rounded-circle" width="100px"> -->
  <!-- <label for="cars">Choose address:</label>
  <select id="cars" name="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select> -->
  <!-- <input type="submit"> 
  </form>
            </div>
            <div class="harga mt-4 d-flex flex-column flex-md-row flex-sm-column gap-5 justify-content-between">
              <h3 class="rentang-harga fw-bold dis-inline ">Berat</h3>
              <input type="text" name="text" id="">
            </div>
            <div class="harga mt-4 d-flex flex-column flex-md-row flex-sm-column gap-5 justify-content-between ">
              <h3 class="rentang-harga fw-bold dis-inline ">Jumlah</h3>
              <input type="text" name="text" id="">
            </div>
            <div class="btn_harga mt-5 d-flex flex-column flex-md-row flex-sm-column gap-5 justify-content-between">
              <button type="button" class="btn btn-outline-success rounded-pill">Add To Cart</button>
              <button type="button" class="btn btn-success rounded-pill">Beli</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <section class="detail_produk">
    <div class="container">
      <h3 class="detail-produk fw-bold">Detail Produk</h3>
      <p class="deskripsi">
        Daging buah alpukat mentega memiliki ukuran jauh lebih tebal dibandingkan alpukat biasa dan tekstur alpukat mentega juga lebih lembut dengan rasa yang lebih manis. Hal ini membuat alpukat mentega lebih disukai dan menjadi favorit. <br> <br>

        Buah Alpukat Mentega 1 kg <br>

        Alpukat (avocado) adalah salah satu buah padat nutrisi dan merupakan superfood yang wajib dikonsumsi setiap hari <br> <br>


        Alpukat segar dengan kualitas premium <br>
        Memiliki rasa yang gurih & pulen <br>
        Sumber lemak baik & kalum <br>
        Baik untuk kesehatan jantung & nutrisi otak <br>
      </p>
    </div>
  </section>

  <footer class="py-5 footerCuy footer-detail ">
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