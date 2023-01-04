<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../vendor/boostrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../vendor/icons/css/boxicons.min.css">
  <!-- <link rel="stylesheet" href="./../styles/login.css">  -->
  <link rel="shortcut icon" href="Dashboard/img/fruit.png">
  <title>Simbah</title>
</head>

<body>
  <div class="container-fluid p-5">

    <table class="table">
      <thead class="table-dark">

        <tr>
          <th scope="col">No</th>
          <th scope="col">Pelanggan</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include '../connect.php';
        $no = 1;
        $tgl_mulai = $_GET["tglm"];
        $tgl_selesai = $_GET["tgls"];
        $status = $_GET["status"];
        $semuadata = [];
        $ambil = $koneksi->query("SELECT * FROM users u LEFT JOIN pembelian p ON u.id_pembeli =  p.id_pembeli WHERE status_pembayaran = '$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
        while ($ambil_query = mysqli_fetch_array($ambil)) {
        ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $ambil_query['nama_lengkap'] ?></td>
            <td><?php echo $ambil_query['tanggal_pembelian'] ?></td>
            <td>Rp <?php echo number_format($ambil_query['total_pembelian']); ?></td>
            <td><?php echo $ambil_query['status_pembayaran'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  <script src="./../vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

  <script>
    window.print()
  </script>

</body>

</html>