<?php

require 'connect.php';
include 'session.php';
// include 'Dashboard/pembelian.php';
// include 'Dashboard/detail_pembelian.php';



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
        <!-- <a href="cart.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class="bx bx-cart text-white"></i>(0)</a> -->

        <a href="riwayat.php" class="btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center border-0"><i class="bx bx-cart text-white"></i> Riwayat Belanja</a>
        <a href="profile.php" class=" btn btn-outline-light rounded-pill px-3 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-user text-white'></i><?php echo $result['username'] ?>

          <a href="logout.php" class="btn btn-outline-light rounded-pill px-4 py-2 m-2 align-items-center justify-content-center"><i class='bx bx-log-out text-white align-items-center justify-content-center'></i>Logout</a>
          <!-- <a href="login.php" class="btn btn-outline-light rounded-pill px-3 py-2">Login</a> -->
      </div>
    </div>
  </nav>

  <section class="kontent">
    <div class="container">
      <h2 class="fw-bold">Nota Pembelian</h2>
      <?php
      require 'connect.php';
      // include 'Dashboard/pembelian.php';
      $query_pembelian = "SELECT * FROM users JOIN pembelian ON pembelian.id_pembeli = users.id_pembeli WHERE pembelian.id_pembelian = '$_GET[id]'";

      $hasil_keputusan = mysqli_query($koneksi, $query_pembelian);
      $ambil = mysqli_fetch_array($hasil_keputusan);

      ?>
      <!-- <h1>data orang yang beli $ambil</h1> -->
      <!-- <pre> <?php //print_r($ambil); 
                  ?></pre> -->

      <!-- <h1>data orang yang login di session </h1> -->
      <!-- <pre><?php //print_r($_SESSION);  
                ?></pre> -->

      <!-- jika pelanggan ynag beli tidak sama dengan pelanggan yang login, maka dilarikan ke halaman riwayat.php atau lainnya karena dia tidak berhak melihat nota orang lain  -->
      <!-- pelanggan yang beli harus pelanggan yang login -->

      <?php
      // mendapatkan id_pelanggan yang beli
      $idpelangganyangbeli = $ambil['id_pembeli'];

      // mendapatkan id_pelanggan yang login dari session
      $idpelangganyanglogin = $_SESSION['identitas']['id_pembeli'];

      if ($idpelangganyangbeli !== $idpelangganyanglogin) {
        echo "<script> alert ('Anda tidak berhak mengakses halaman ini');</script>";
        echo "<script>location='riwayat.php';</script>";
      }




      ?>


      <div class="row mt-5 border border-black rounded p-1">
        <div class="col-md-3">
          <h3 class="fw-bold">Kios Pandawa</h3>
          jl.Jawa Jember Jawa Timur <br>
          08990-423-789 <br>
          padawabuah@gmail.com
        </div>
        <div class="col-md-3">
          <h3 class="fw-bold">Pembelian</h3>
          No. Pembelian : <?php echo $ambil['id_pembelian']; ?> <br>
          Tanggal : <?php echo $ambil['tanggal_pembelian']; ?> <br>
          Total : <?php echo number_format($ambil['total_pembelian']); ?>
        </div>
        <div class="col-md-3">
          <h3 class="fw-bold">Pelanggan</h3>
          <?php echo $ambil['username']; ?><br>
          <p>
            <?php echo $ambil['no_telp']; ?> <br>
            <?php echo $ambil['email']; ?>
          </p>
        </div>
        <div class="col-md-3">
          <h3 class="fw-bold">Pengiriman</h3>
          <?php echo $ambil['nama_daerah'] ?><br>
          Ongkos Kirim : Rp <?php echo number_format($ambil['tarif']); ?> <br>
          Alamat : <?php echo $ambil['alamat_pengiriman']; ?>
        </div>
      </div>

      <div class="table-responsive mt-5">
        <table id="detail_pembelian" class="table table-striped table-bordered w-100 nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Berat</th>
              <th>Jumlah</th>
              <th>SubBerat</th>
              <th>SubTotal</th>
            </tr>
          </thead>
          <tbody>
            <?php

            require 'connect.php';
            // include 'Dashboard/pembelian.php';
            $no = 1;
            $query_produk = mysqli_query($koneksi, "SELECT * FROM pembelian_buah WHERE id_pembelian = '$_GET[id]'");
            while ($ambil_query = mysqli_fetch_array($query_produk)) { ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $ambil_query['nama']; ?></td>
                <td>Rp <?php echo number_format($ambil_query['harga']); ?></td>
                <td><?php echo $ambil_query['berat']; ?> Gr</td>
                <td><?php echo $ambil_query['jumlah']; ?></td>
                <td><?php echo $ambil_query['subberat']; ?> Gr</td>
                <td>Rp <?php echo number_format($ambil_query['subharga']); ?></td>
              </tr>
            <?php }

            ?>
          </tbody>
        </table>
        <div class="row">
          <div class="col-md-5">
            <div class="alert alert-info">
              <p>
                silahkan melakukan pembayaran Rp <?php echo number_format($ambil['total_pembelian']); ?> ke <br>
                <strong>BANK MANDIRI 137-001088-3276 AN. Ahmad Hidayat</strong>

              </p>
              <a href="pembayaran.php?id=<?php echo $ambil['id_pembelian']; ?>" class="btn btn-primary rounded-pill">pembayaran</a>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $('#detail_pembelian').DataTable();
        });
      </script>


    </div>
  </section>

  <script src="vendor/boostrap/js/bootstrap.min.js"></script>
</body>

</html>