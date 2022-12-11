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
              <a href="home.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"> <i class='bx bxs-home text-white'></i> Home</a>
            </li>
            <li class="nav-item">
              <a href="riwayat.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i> Riwayat Belanja</a>
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
          if ($result['id_status'] == '3') {
            $tampilan = 'd-none';
          }

          ?>

          <a href="riwayat.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a>
          <a href="Dashboard/index.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center <?php echo $tampilan ?>"><i class='bx bxs-dashboard text-white'></i></a>
          <!-- <i class='bx bxs-message-dots text-white'></i> -->


          <!-- <a href="register.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-bell text-white'></i></a> -->
          <a href="register.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $result['nama_lengkap'] ?>

          </a>
          <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i> Logout</a>


        </div>
      </div>
    </nav>
  </div>
  </div>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>