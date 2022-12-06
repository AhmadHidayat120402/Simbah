<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SiMbah</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="../vendor/boostrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../vendor/boostrap/css/bootstrap.min.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li><a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Home</a></li>
                    <li><a href="index.php?halaman=pemilik"><i class="fa fa-dashboard fa-3x"></i> pemilik</a></li>
                    <li><a href="index.php?halaman=karyawan"><i class="fa fa-dashboard fa-3x"></i> karyawan</a></li>
                    <li><a href="index.php?halaman=member"><i class="fa fa-dashboard fa-3x"></i> member</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-dashboard fa-3x"></i> pelanggan</a></li>
                    <li><a href="index.php?halaman=supplier"><i class="fa fa-dashboard fa-3x"></i> supplier</a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-dashboard fa-3x"></i> produk</a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-dashboard fa-3x"></i> pembelian</a></li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php

                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "pemilik") {
                        include 'pemilik.php';
                    }
                    if ($_GET['halaman'] == "karyawan") {
                        include 'karyawan.php';
                    }
                    if ($_GET['halaman'] == "member") {
                        include 'member.php';
                    }
                    if ($_GET['halaman'] == "pelanggan") {
                        include 'pelanggan.php';
                    }
                    if ($_GET['halaman'] == "supplier") {
                        include 'supplier.php';
                    }
                    if ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    }
                    if ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    }
                } else {
                    include 'home.php';
                }


                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../Dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>

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