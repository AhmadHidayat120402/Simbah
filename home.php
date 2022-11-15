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
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
        <div class="container mt-auto">
          <a class="navbar-brand" href="#">
            <h2 class="logo font-italic">SiMbah</h2>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <!-- <i class='bx bx-customize'></i> -->
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="input-group gap-3">
              <input type="text" class="form-control rounded-3" placeholder="cari buah" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-success align-align-items-center justify-content-center rounded-circle border-light bg-white" type="button" id="button-addon2"><i class="bx bx-search  "></i></button>
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

  <section class="kategori-buah mt-5">
    <div class="container">
      <h4 class="section-title_home align-items-center justify-content-center fw-bold ">Kategori Buah</h4>
      <div class="row mt-5">
        <div class="col-md-4 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
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
                <i class="laris">Tersedia</i>
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
        <h3 class="section-titlee w-50 fw-bold">Buah Favorite</h3>
        <!-- <a href="#" class="btn btn-primary btn btn-outline-dark rounded-0 mt-2 fw-bold">Explore More</a> -->
      </div>
      <div class="row mt-5">
        <div class="col-md-3 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/pepaya.jpg" alt="Madakaripura" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Pepaya</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 15.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/buah-naga.jpg" alt="Gili Ketapang" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Buah naga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 23.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/jeruk.jpg" alt="Bremi Park" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Jeruk</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 22.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
  <section class="popular-destionation">
    <div class="container">
      <div class="d-flex flex-column flex-sm-column
    flex-md-row align-item-center justify-content-between gap-3 ">
        <h3 class="section-titlee w-50 fw-bold">Flash Sale</h3>
        <!-- <a href="#" class="btn btn-primary btn btn-outline-dark rounded-0 mt-2 fw-bold">Explore More</a> -->
      </div>
      <div class="row mt-5">
        <div class="col-md-3 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/pepaya.jpg" alt="Madakaripura" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Pepaya</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 15.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/buah-naga.jpg" alt="Gili Ketapang" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Buah naga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 23.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/jeruk.jpg" alt="Bremi Park" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Jeruk</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 22.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
  <section class="popular-destionation">
    <div class="container">
      <div class="d-flex flex-column flex-sm-column
    flex-md-row align-item-center justify-content-between gap-3 ">
        <h3 class="section-titlee w-50 fw-bold"> Aneka Buah</h3>
        <!-- <a href="#" class="btn btn-primary btn-outline-dark rounded-0 mt-2 fw-bold">Explore More</a> -->
      </div>
      <div class="row mt-5">
        <div class="col-md-3 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/pepaya.jpg" alt="Madakaripura" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Pepaya</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 15.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/buah-naga.jpg" alt="Gili Ketapang" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Buah naga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 23.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/jeruk.jpg" alt="Bremi Park" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Jeruk</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 22.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
      <div class="row mt-5">
        <div class="col-md-3 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/pepaya.jpg" alt="Madakaripura" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Pepaya</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 15.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/buah-naga.jpg" alt="Gili Ketapang" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Buah naga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 23.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/jeruk.jpg" alt="Bremi Park" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Jeruk</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 22.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
      <div class="row mt-5">
        <div class="col-md-3 mt-3">
          <a href="#" class="card border-0 boxs text-decoration-none">
            <img src="images/img/mango-1.jpg" alt="gunung bromo" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Mangga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 18.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/pepaya.jpg" alt="Madakaripura" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Pepaya</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 15.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/buah-naga.jpg" alt="Gili Ketapang" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Buah naga</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris ">Tersedia</i>
                Rp 23.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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
          <a href="#" class="card boxs border-0 text-decoration-none">
            <img src="images/img/jeruk.jpg" alt="Bremi Park" class="images">
            <div class="card-body">
              <h4 class="card-title fw-bold">Jeruk</h4>
              <p class="d-flex align-items-center gap-2">
                <i class="laris">Tersedia</i>
                Rp 22.000 / kg
              </p>
              <hr>
              <button type="button" class="btn btn-outline-dark rounded-3">Add To Cart</button>
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

  <footer class="py-5 footerCuy">
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
  </footer>

  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>