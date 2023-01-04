<?php
include '../connect.php';
$semuadata = [];
$tgl_mulai = "-";
$tgl_selesai = "-";
$status = "";

if (isset($_POST['kirim'])) {
  $tgl_mulai = $_POST['tglm'];
  $tgl_selesai = $_POST['tgls'];
  $status = $_POST['status'];

  $ambil = $koneksi->query("SELECT * FROM users u LEFT JOIN pembelian p ON u.id_pembeli =  p.id_pembeli WHERE status_pembayaran = '$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");

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
        <div class="col-md-3">
          <div class="form-group">
            <label for="tglm">Dari Tanggal</label>
            <input type="date" name="tglm" id="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="tgls">Sampai Tanggal</label>
            <input type="date" name="tgls" id="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="tgls">Status</label>
            <select name="status" id="status" class="form-select">
              <option value="">Pilih Status</option>
              <option value="pending" <?php echo $status == "pending" ? "selected" : ""; ?>>pending</option>
              <option value="lunas" <?php echo $status == "lunas" ? "selected" : ""; ?>>lunas</option>
              <option value="barang dikirim" <?php echo $status == "barang dikirm" ? "selected" : ""; ?>>barang dikirim</option>
              <option value="dibatalkan" <?php echo $status == "dibatalkan" ? "selected" : ""; ?>>dibatalkan</option>
              <option value="sudah mengirim pembayaran" <?php echo $status == "sudah mengirim pembayaran" ? "selected" : ""; ?>>sudah mengirim pembayaran</option>
              <option value="belum dibayar" <?php echo $status == "belum dibayar" ? "selected" : ""; ?>>belum dibayar</option>
              <option value="barang sudah sampai" <?php echo $status == "barang sudah sampai" ? "selected" : ""; ?>>barang sudah sampai</option>

            </select>
          </div>
        </div>
        <div class="col-md-3">
          <label>&nbsp;</label><br>
          <button class="btn btn-primary rounded-pill" name="kirim">Lihat Laporan</button>
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
              <td><?php echo date("d F Y", strtotime($value['tanggal_pembelian'])) ?></td>
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
      <a href="report_penjualan.php?tglm= <?php echo $tgl_mulai ?>&tgls=<?php echo $tgl_selesai ?>&status=<?php echo $status ?>" class="text-decoration-none">Download PDF</a>
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