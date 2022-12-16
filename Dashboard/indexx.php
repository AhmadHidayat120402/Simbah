<?php
require '../connect.php';

session_start();
if (empty($_SESSION['id_pembeli'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='../login.php'</script>";
}

$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>SiMbah</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../vendor/boostrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../styles/style.css"> -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
          <img src="img/fruit.png" width="35px" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">SiMbah</div>
      </a>
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Back to Home</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
                Interface
            </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> -->
      <!-- <h6 class="collapse-header">Custom Components:</h6> -->
      <!-- <a class="collapse-item" href="pemilik.php">Pemilik</a>
                        <a class="collapse-item" href="karyawan.php">Karyawan</a>
                        <a class="collapse-item" href="member.php">Member</a>
                        <a class="collapse-item" href="pelanggan.php">Pelanggan</a>
                        <a class="collapse-item" href="produk.php">Produk</a>
                        <a class="collapse-item" href="transaksi.php">Transaksi</a>
                        <a class="collapse-item" href="supplier.php">Supplier</a>
                    </div>
                </div>
            </li> -->


      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> -->
      <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
      <!-- <a class="collapse-item" href="pemilik.php">Pemilik</a>
                        <a class="collapse-item" href="karyawan.php">Karyawan</a>
                        <a class="collapse-item" href="pelanggan.php">Pelanggan</a>
                        <a class="collapse-item" href="produk.php">Produk</a>
                        <a class="collapse-item" href="transaksi.php">Transaksi</a>
                    </div>
                </div>
            </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kelola Data
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=pemilik">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>pemilik</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=karyawan">
          <i class="fas fa-fw fa-table"></i>
          <span>karyawan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=member">
          <i class="fas fa-fw fa-table"></i>
          <span>member</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=pelanggan">
          <i class="fas fa-fw fa-table"></i>
          <span>pelanggan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=supplier">
          <i class="fas fa-fw fa-table"></i>
          <span>supplier</span></a>
      </li>
      <!-- <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=Kategori">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kategori</span></a>
            </li> -->
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=produk">
          <i class="fas fa-fw fa-table"></i>
          <span>produk</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=pembelian">
          <i class="fas fa-fw fa-table"></i>
          <span>pembelian</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexx.php?halaman=laporan_pembelian">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <h3 class="text-center fw-bold" style="margin-left: 60px !important;">Selamat Datang <?php echo $result['nama_lengkap'] ?></h3>





          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->


            <!-- Nav Item - Alerts -->


            <!-- Nav Item - Messages -->


            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="../profile.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $result['nama_lengkap'] ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->

            </li>
          </ul>


        </nav>




        <section>
          <div class="container">
            <?php
            if (isset($_GET['halaman'])) {

              if ($_GET['halaman'] == 'pemilik') {
                include 'pemilik.php';
              } elseif ($_GET['halaman'] == 'member') {
                include 'member.php';
              } elseif ($_GET['halaman'] == 'karyawan') {
                include 'karyawan.php';
              } elseif ($_GET['halaman'] == 'pelanggan') {
                include 'pelanggan.php';
              } elseif ($_GET['halaman'] == 'pembelian') {
                include 'pembelian.php';
              } elseif ($_GET['halaman'] == 'produk') {
                include 'produk.php';
              } elseif ($_GET['halaman'] == 'supplier') {
                include 'supplier.php';
              } elseif ($_GET['halaman'] == 'detail') {
                include 'detail_pembelian.php';
              } elseif ($_GET['halaman'] == 'pembayaran') {
                include 'pembayaran.php';
              } elseif ($_GET['halaman'] == 'laporan_pembelian') {
                include 'laporan_pembelian.php';
              } elseif ($_GET['halaman'] == 'detail_produk') {
                include 'detail_produk.php';
                // }elseif($_GET['halaman'] == 'download_laporan'){
                //     include 'download_laporan.php';
              }
            } else {
              // include 'index.php';
            }
            ?>

          </div>

        </section>




      </div>
      <!-- End of Main Content -->



      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script src="../vendor/boostrap/js/bootstrap.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>