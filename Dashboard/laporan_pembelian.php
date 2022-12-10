<?php
include '../connect.php';
$semuadata = [];
$tgl_mulai = "-";
$tgl_selesai = "-";

if (isset($_POST['kirim'])) {
  $tgl_mulai = $_POST['tglm'];
  $tgl_selesai = $_POST['tgls'];

  $ambil = $koneksi->query("SELECT * FROM users u LEFT JOIN pembelian p ON u.id_pembeli =  p.id_pembeli WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");

  while ($pecah =  $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
  }

  // echo "<pre>";
  // print_r($semuadata);
  // echo "</pre>";
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../vendor/boostrap/css/bootstrap.min.css">
  <title>Laporan Pembelian</title>
</head>

<body>

  <div class="container-fluid mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h1>
    </div>
    <form action="" method="post">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="tglm">Tanggal Mulai</label>
            <input type="date" name="tglm" id="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="tgls">Tanggal Selesai</label>
            <input type="date" name="tgls" id="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
          </div>
        </div>
        <div class="col-md-2">
          <label>&nbsp;</label><br>
          <button class="btn btn-primary rounded-pill" name="kirim">Lihat</button>
        </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-bordered" id="laporan">
        <thead>
          <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
          <?php foreach ($semuadata as $key => $value) : ?>
            <?php $total += $value['total_pembelian']; ?>

            <tr>
              <td><?php echo $key + 1 ?></td>
              <td><?php echo $value['nama_lengkap']; ?></td>
              <td><?php echo $value['tanggal_pembelian']; ?></td>
              <td>Rp <?php echo number_format($value['total_pembelian']); ?></td>
              <td><?php echo $value['status_pembayaran']; ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <th colspan="3">Total</th>
          <th>Rp <?php echo number_format($total); ?></th>
          <th></th>
        </tfoot>
      </table>
    </div>
    <script>
      $(document).ready(function() {
        $('#laporan').DataTable();
      });
    </script>
  </div>

  <script src="../vendor//boostrap/js/bootstrap.min.js"></script>
</body>

</html>