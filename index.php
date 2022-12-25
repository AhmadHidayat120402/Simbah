<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simbah</title>
  <link rel="stylesheet" href="vendor/boostrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/icons/css/boxicons.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Packages
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#food">Aneka buah</a></li>
                  <li><a class="dropdown-item" href="#favFood">Buah favorite</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Selengkapnya
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#cus">Kata customers</a></li>
                  <li><a class="dropdown-item" href="#alamat">Alamat</a></li>
                  <li><a class="dropdown-item" href="#footer">Media sosial</a></li>
                </ul>
              </li>
            </ul>
            <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a>
            <a href="register.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2">Register</a>
          </div>
        </div>
      </nav>
      <div class="content">
        <h1 class="header-title text-white text-capitalize fw-bold"><br><br>Kami menjual buah<br>segar dan
          sehat
        </h1>
        <p class="header-description text-white text fw-light"> Buah yang kami jual beraneka ragam dan tentunya <br> memiliki banyak manfaat bagi tubuh karena <br> buah yang kami jual adalah buah yang <br> berkualitas, segar dan sehat.
        </p>
      </div>
    </div>
  </header>

  <section class="why-choose">
    <div class="container" id="about" style="padding-top:5rem !important; padding-bottom:5rem !important;">
      <div class="d-flex flex-column flex-sm-column
      flex-md-row align-item-center justify-content-between gap-3">
        <h2 class="section-title w-75">Mengapa memilih kami?</h2>
        <p class="section-description"> kami menjual berbagai macam buah yang tentunya buah segar dan sehat</p>
      </div>
      <div class="row mt-5">
        <div class="col-md-3 border-0">
          <div class="card mt-3 boxs">
            <div class="card-body p-3">
              <div class="d-flex flex-row align-items-center gap-3">
                <div class="icons rounded-circle ">
                  <img src="images/img/ongkir.png" alt="" width="30px">
                </div>
                <h4 class="card-title fw-bold m-0">Gratis Ongkir</h4>
              </div>
              <div class="section-description mt-3">
                Belanja minimal Rp 50.000.
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 border-0">
          <div class="card mt-3 boxs">
            <div class="card-body p-3">
              <div class="d-flex flex-row align-items-center gap-3">
                <div class="icons rounded-circle ">
                  <img src="images/img/segar.png" alt="" width="30px">
                </div>
                <h4 class="card-title fw-bold m-0">Selalu Segar</h4>
              </div>
              <div class="section-description mt-3">
                Dari supplier terpercaya.
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 border-0">
          <div class="card mt-3 boxs">
            <div class="card-body p-3">
              <div class="d-flex flex-row align-items-center gap-3">
                <div class="icons rounded-circle ">
                  <img src="images/img/kualitas.png" alt="" width="30px">
                </div>
                <h4 class="card-title fw-bold m-0">Kualitas Bagus</h4>
              </div>
              <div class="section-description mt-3">
                Telah melewati tahap sortir.
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 border-0">
          <div class="card mt-3 boxs">
            <div class="card-body p-3">
              <div class="d-flex flex-row align-items-center gap-3">
                <div class="icons rounded-circle ">
                  <img src="images/img/bantuan.png" alt="" width="30px">
                </div>
                <h4 class="card-title fw-bold m-0">Bantuan</h4>
              </div>
              <div class="section-description mt-3">
                Bantuan 24/7 selalu online.
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="popular-destionation">
    <div class="container" id="food" style="padding-top:5rem !important; padding-bottom:5rem !important;">
      <div class="d-flex flex-column flex-sm-column
    flex-md-row align-item-center justify-content-between gap-3">
        <h2 class="section-title w-50">Tersedia Aneka Buah</h2>
        <a href="login.php" class="btn btn-primary rounded-pill mt-2 fw-bold">Explore More</a>
      </div>
      <div class="row mt-5">
        <div class="col-md-3 mt-3">
          <a href="#" class="card border-0 boxs">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris rounded-pill">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <p class="text-manfaat">Mengkonsumsi mangga dapat melindungi kita dari jenis penyakit kanker dan
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
        <div class="col-md-3 mt-3">
          <a href="#" class="card boxs border-0 ">
            <img src="images/img/pepaya.jpg" alt="Madakaripura" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Pepaya</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris rounded-pill ">Tersedia</i>
                Rp 15.000 / kg
              </p>
              <hr>
              <p class="text-manfaat">Manfaat makan buah pepaya setiap hari bisa membantu orang yang bermasalah dengan
                pencernaannya</p>
            </div>
            <div class="ratings position-absolute top-0 bg-white p-2">
              <p class="d-flex align-items-center gap-2 m-0">
                <i class="bx bxs-star"></i>
                4.9
              </p>
            </div>
          </a>

        </div>
        <div class="col-md-3 mt-3">
          <a href="#" class="card boxs border-0">
            <img src="images/img/buah-naga.jpg" alt="Gili Ketapang" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Buah naga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris rounded-pill ">Tersedia</i>
                Rp 23.000 / kg
              </p>
              <hr>
              <p class="text-manfaat">Sebagai sumber antioksidan bisa membantu mengobati kulit yang terbakar, kulit
                kering dan masalah
                jerawat</p>
            </div>
            <div class="ratings position-absolute top-0 p-2 bg-white">
              <p class="d-flex-align-items-center m-0">
                <i class="bx bxs-star"></i>
                4.9
              </p>
            </div>
          </a>

        </div>
        <div class="col-md-3 mt-3">
          <a href="#" class="card boxs border-0">
            <img src="images/img/jeruk.jpg" alt="Bremi Park" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Jeruk</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris rounded-pill">Tersedia</i>
                Rp 22.000 / kg
              </p>
              <hr>
              <p class="text-manfaat">Manfaatnya sebagai penurun tekanan darah, baik untuk keseahatan dan tentunya kaya
                akan vitamin C</p>
            </div>
            <div class="ratings position-absolute top-0 p-2 bg-white">
              <p class="d-flex align-items-center m-0">
                <i class="bx bxs-star"></i>
                4.9
              </p>
            </div>
          </a>

        </div>
      </div>
    </div>
  </section>

  <section class="take-break" style="padding-top:5rem !important; padding-bottom:5rem !important;">
    <div class="container ">
      <div class="row align-items-center">
        <div class="col-md-6 ">
          <img src="images/img/manfaat-buah.jpg" alt="take-break" class="image" width="500px">
        </div>
        <div class="col-md-6 align-items-center mt-5">
          <h2 class="section-title">Manfaat Buah</h2>
          <p class="section-description mb-4 take-shadow">
            <i class="bx bxs-analyse"></i>
            Mengatasi berbagi macam penyakit <br> <i class="bx bxs-analyse"></i> Memenuhi asupan vitamin dalam
            tubuh<br> <i class="bx bxs-analyse"></i> Kaya akan vitamin dan serat <br> <i class="bx bxs-analyse"></i>
            Menurunkan berat badan
          </p>
          <div class="d-flex align-items-center gap-5">
            <a href="#" class="btn btn-primary align-items-center rounded-pill">Learn More</a>
            <a href="https://www.youtube.com/watch?v=i6awA7O7NKo" target="_blank" class="d-flex align-items-center gap-3">
              <img src="images/img/alpukat.jpg" alt="take-break" class="image rounded-circle" width="40px">
              Watch Video
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="travel-Packages" id="favFood" style="padding-top:5rem !important;">
    <div class="container" ">
      <h2 class=" section-title text-center ">Favorite Buah</h2>
      <p class=" section-description text-center"> favorite buah merupakan jenis buah yang paling banyak digemari pelanggan dan banyak terjual <br> terdapat 3 jenis buah yang paling banyak dikonsumsi yaitu Alpukat, Apel merah, Belimbing.</p>
      <div class="row mt-5">
        <div class="col-md-4 mt-3">
          <a href="#" class="card text-center">
            <img src="images/img/alpukat-1.jpg" alt="indonesian tour" class="card-image">
            <div class="card-body boxs">
              <h4 class="card-title mt-3">Alpukat</h4>
              <p class="section-description px-2">bermanfaat untuk membantu mengendalikan tekanan darah dan mencegah terjadinya tekanan darah tinggi.</p>
              <hr class="mx-auto w-75">
              <p class="price">Rp 15.000/ <span class="section-description">Kg</span></p>
            </div>
            <div class="flag bg-white p-2 rounded-circle shadow-sm position-absolute">
              <img src="images/img/alpukat-1.jpg" alt="" width="150px" class="rounded-circle ">
            </div>
          </a>
        </div>
        <div class="col-md-4 mt-3">
          <a href="#" class="card text-center">
            <img src="images/img/apel-merah2.jpg" alt="indonesian tour" class="card-image">
            <div class="card-body boxs">
              <h4 class="card-title mt-3">Apel fuji</h4>
              <p class="section-description px-2">bermanfaat untuk menjaga jantung agar tetap sehat, mengurangi resiko serangan jantung dan dapat mencegah serangan asma.</p>
              <hr class="mx-auto w-75">
              <p class="price">Rp 20.000/ <span class="section-description">Kg</span></p>
            </div>
            <div class="flag bg-white p-2 rounded-circle shadow-sm position-absolute">
              <img src="images/img/apel-merah2.jpg" alt="" width="150px" class="rounded-circle ">
            </div>
          </a>
        </div>
        <div class="col-md-4 mt-3">
          <a href="#" class="card text-center">
            <img src="images/img/belimbing.jpg" alt="indonesian tour" class="card-image">
            <div class="card-body boxs">
              <h4 class="card-title mt-3">Belimbing</h4>
              <p class="section-description px-2">bermanfaat untuk menurunkan berat badan dan meningkatkan daya tahan tubuh hingga mencegah pertumbuhan sel kanker..</p>
              <hr class="mx-auto w-75">
              <p class="price">Rp 10.000/ <span class="section-description">Kg</span></p>
            </div>
            <div class="flag bg-white p-2 rounded-circle shadow-sm position-absolute">
              <img src="images/img/belimbing.jpg" alt="" width="150px" class="rounded-circle ">
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonial">
    <div class="container" id="cus" style="padding-top:5rem !important; padding-bottom:5rem !important">
      <h2 class="section-title">Apa yang mereka katakan tentang kami ?</h2>
      <p class="section-description">Berikut merupakan penilaian dari pelanggan yang sudah membeli buah dari toko kami
        <br>
        penilaian tersebut asli tanpa ada paksaan dari pihak manapun
      </p>
      <div class="row mt-3">
        <div class="col-md-4">
          <a href="#" class="card mt-3 boxs p-4">
            <div class="card-body p-3 border-0 rounded-0">
              <i class="bx bxs-quote-left"></i>
              <p class="section-description">" sangat puas dengan pelayanan adminnya "
              </p>
              <div class="d-flex mt-3 gap-3">
                <img src="./images/image_people/OrangA.jpg" alt="foto" class="foto rounded-circle">
                <div class="d-flex flex-column">
                  <h4 class="card-title">Reza Rahardian</h4>
                  <p class="section-description">
                    Pembeli Apel
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#" class="card mt-3 boxs p-4">
            <div class="card-body p-3 border-0 rounded-0">
              <i class="bx bxs-quote-left"></i>
              <p class="section-description">" sangat puas dengan pelayanan dan produknya segar semua "
              </p>
              <div class="d-flex mt-3 gap-3">
                <img src="./images/image_people/OrangB.jpg" alt="foto" class="foto rounded-circle">
                <div class="d-flex flex-column">
                  <h4 class="card-title">Agnes Monica</h4>
                  <p class="section-description">
                    Pembeli Anggur
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#" class="card mt-3 boxs p-4">
            <div class="card-body p-3 border-0 rounded-0">
              <i class="bx bxs-quote-left"></i>
              <p class="section-description">" pesanan dikirim tepat waktu dan kualitas segar "
              </p>
              <div class="d-flex mt-3 gap-3">
                <img src="./images/image_people/OrangC.jpg" alt="foto" class="foto rounded-circle">
                <div class="d-flex flex-column">
                  <h4 class="card-title">Iqball Ramadhan</h4>
                  <p class="section-description">
                    Pembeli Pisang susu
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="subscirber">
    <div class="container" id="alamat" style="padding-top:5rem; padding-bottom:5rem;">
      <div class="row ">
        <div class="col-md-6 position-relative">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.318529169943!2d113.71703871433064!3d-8.170629484146595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695cd393785a9%3A0x6457ebd393aec71a!2sPandawa%20Fruit%20Store!5e0!3m2!1sen!2sid!4v1667572267418!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <!-- <img src="images/image/subscribe.png" alt="subcribe" class="subcrib-image rounded-0 w-100"> -->
          <div class="position-absolute p-3 rounded-circle bg-white shadow-sm">
            <!-- <img src="images/image/flash-sale 1.svg" alt=""> -->
          </div>
        </div>

        <div class="col-md-6 align-items-center mt-2" style="transform: translateX(80px);">
          <h3 class="section-title">Lokasi Toko Buah Pandawa</h3>
          <p class="section-description">Terletak di Jl. Jawa No.64A Kabupaten Jember. Jika anda dari Politeknik Negeri Jember sekitar 3 km untuk sampai
            ke Toko Buah Pandawa yang berada disebelah kiri jalan. Toko Buah Pandawa ini berwarna krem. Buka setiap hari pada <b>Jam 08.15 - 21.30</b>.
            Anda bisa mencari kebutuhan buah anda di Toko Buah Pandawa.</p>
          <div class="d-flex gap-3 mt-4">
            <h3>0858-5643-2875</h3>
            <p class="section-description">(Toko Buah Pandawa)</p>
          </div>
          <!-- <div class="iconBro bg-white shadow-sm rounded-circle p-3 position-absolute" style="right: -20px; bottom: 65px;"> -->
          <!-- <img src="images/image/world.svg" alt=""> -->
        </div>
      </div>
    </div>
    </div>
  </section>
  <footer class="py-5 footerCuy footer-index">
    <div class="container" id="footer">
      <div class="row mx-auto">
        <div class="col md-3">
          <a href="#" class="text-decoration-none">
            <h4 class="fw-bold ">SiMbah</h4>
          </a>
          <p class="section-description align-items-center">toko buah yang menjual buah murah dan berkualitas tinggi </p>
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
          <p class="section-description justify-content-center align-items-center">Berikut merupakan sosial media yang kami gunakan untuk melakukan promosi</p>
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