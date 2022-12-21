<?php
require '../connect.php';

session_start();
if (empty($_SESSION['id_pembeli'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='../login.php'</script>";
}

$query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
$query_select = mysqli_query($koneksi, $query);
$result = mysqli_fetch_array($query_select);

include '../connect.php';
$produk = mysqli_query($koneksi, "select nama_barang from barang");
$queryy = mysqli_query($koneksi, "select stok from barang");


include('../connect.php');
$label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

for ($bulan = 1; $bulan < 13; $bulan++) {
    $query = mysqli_query($koneksi, "select sum(total_pembelian) as jumlah from pembelian where MONTH(tanggal_pembelian)='$bulan'");
    $row = $query->fetch_array();
    $jumlah_produk[] = $row['jumlah'];
}

// $data_penjualan = mysqli_query($koneksi, "SELECT tanggal_pembelian, SUM(total_pembelian) AS total FROM pembelian GROUP BY tanggal_pembelian");

// $data_tanggal = array();
// $data_total = array();

// while ($data = mysqli_fetch_array($data_penjualan)) {
//     $data_tanggal[] = date('d-m-Y', strtotime($data['tanggal_pembelian'])); // Memasukan tanggal ke dalam array
//     $data_total[] = $data['total']; // Memasukan total ke dalam array
// }


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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../vendor/icons/css/boxicons.min.css">
    <script src="../vendor/boostrap/js/Chart.js/Chart.min.js"></script>



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

            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=pemilik">
                <i class='bx bx-user'></i>
                    <span>pemilik</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=karyawan">
                <i class='bx bx-user-circle'></i>
                    <span>karyawan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=member">
                <i class='bx bxs-user'></i>
                    <span>member</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=pelanggan">
                <i class='bx bxs-user-circle'></i>
                    <span>pelanggan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=supplier">
                <i class='bx bxs-user-rectangle'></i>
                    <span>supplier</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=produk">
                <i class='bx bx-package'></i>
                    <span>produk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=ongkir">
                <i class='bx bx-cycling'></i>
                    <span>ongkir</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=pembelian">
                <i class="bx bx-cart text-white"></i>
                    <span>pembelian</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexx.php?halaman=laporan_pembelian">
                <i class='bx bxs-report'></i>
                    <span>Laporan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                <i class='bx bx-log-out '></i>
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

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <h3 class="text-center fw-bold" style="margin-left: 60px !important; background-color: azure !important;">Selamat Datang <?php echo $result['nama_lengkap'] ?></h3>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Messages -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow gap-5">
                            <a class="nav-link dropdown-toggle" href="../profile.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $result['nama_lengkap'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>


                        </li>
                    </ul>


                </nav>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h3 class="fw-bold">Dashboard</h3>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card border-white text-white bg-primary mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class='bx bx-user'></i> Pemilik</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_baris FROM users WHERE id_status = 2 ");
                                            while ($row = $ambil->fetch_assoc()) {

                                            ?>
                                                <a href="indexx.php?halaman=pemilik" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_baris']; ?> Orang</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-white text-white text-bg-secondary mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class='bx bx-user-circle'></i> Karyawan</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_baris FROM users WHERE id_status = 1");
                                            while ($row = $ambil->fetch_assoc()) {
                                            ?>
                                                <a href="indexx.php?halaman=karyawan" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_baris'] ?> Orang</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-white text-white text-bg-success mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class='bx bxs-user'></i> member</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_baris FROM users WHERE id_status = 4");
                                            while ($row = $ambil->fetch_assoc()) {
                                            ?>
                                                <a href="indexx.php?halaman=member" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_baris'] ?> Orang</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-white text-white text-bg-danger mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class='bx bxs-user-circle'></i> Pelanggan</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_baris FROM users WHERE id_status = 3");
                                            while ($row = $ambil->fetch_assoc()) {
                                            ?>

                                                <a href="indexx.php?halaman=pelanggan" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_baris'] ?> Orang</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h3 cla>Dashboard</h3> -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card border-white text-white text-bg-warning mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class='bx bxs-user-rectangle'></i> Supplier</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_baris FROM supplier");
                                            while ($row = $ambil->fetch_assoc()) {
                                            ?>
                                                <a href="indexx.php?halaman=supplier" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_baris'] ?> Orang</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-white text-white text-bg-info mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class='bx bx-package'></i> Produk</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_produk FROM barang");
                                            while ($row = $ambil->fetch_assoc()) {
                                            ?>
                                                <a href="indexx.php?halaman=produk" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_produk'] ?> Produk</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-white text-white text-bg-primary mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class="bx bx-cart text-white"></i> Pembelian</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_produk FROM pembelian");
                                            while ($row = $ambil->fetch_assoc()) {
                                            ?>
                                                <a href="indexx.php?halaman=pembelian" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_produk'] ?> Pembelian</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-white text-white text-bg-dark mb-3" style="max-width: 18rem;">
                                            <div class="card-body text-white">
                                                <h5 class="card-title"><i class='bx bxs-report'></i> Laporan</h5>
                                            </div>
                                            <?php
                                            include '../connect.php';
                                            $ambil = $koneksi->query("SELECT COUNT(*) as jumlah_produk FROM pembelian");
                                            while ($row = $ambil->fetch_assoc()) {
                                            ?>
                                                <a href="indexx.php?halaman=laporan_pembelian" class="card-footer border-white text-decoration-none"><?php echo $row['jumlah_produk'] ?> Laporan Pembelian</a>
                                            <?php } ?>
                                            <!-- <div class="card-footer border-white"> Orang</div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="fw-bold">Grafik Penjualan Buah</h3>
                                    </div>
                                    <center>
                                        <canvas id="penjualan">

                                        </canvas>
                                    </center>
                                </div>
                            </div>
                            <script>
                                var ctx = document.getElementById('penjualan').
                                getContext('2d');
                                var mychart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: [<?php while ($b = mysqli_fetch_array($produk)) {
                                                        echo '"' . $b['nama_barang'] . '",';
                                                    } ?>],
                                        datasets: [{
                                            label: 'Grafik Penjualan',
                                            data: [<?php while ($p = mysqli_fetch_array($queryy)) {
                                                        echo '"' . $p['stok'] . '",';
                                                    } ?>],
                                            backgroundColor: 'rgba(108, 170, 236, 0.15)',
                                            borderColor: 'blue',
                                            borderWith: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                })
                            </script>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="fw-bold">Grafik Penjualan Buah setiap Bulan</h3>
                                    </div>
                                    <center>
                                        <canvas id="penjualan_perbulan">

                                        </canvas>
                                    </center>
                                </div>
                            </div>
                            <script>
                                var ctx = document.getElementById("penjualan_perbulan").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($label); ?>,
                                        datasets: [{
                                            label: 'Grafik Penjualan',
                                            data: <?php echo json_encode($jumlah_produk); ?>,
                                            backgroundColor: 'rgba(113, 218, 79, 0.15)',
                                            borderColor: 'green',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                            <!-- <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4"> -->
                            <!-- Card Header - Dropdown -->
                            <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Penjualan Buah</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Card Body -->
                            <!-- <div class="card-body"> -->
                            <!-- <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div> -->

                            <!-- </div> -->
                        </div>
                    </div>
                </div>


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
                            } elseif ($_GET['halaman'] == 'ongkir') {
                                include 'ongkir.php';
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
                        <span>Copyright &copy; SiMbah 2022</span>
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