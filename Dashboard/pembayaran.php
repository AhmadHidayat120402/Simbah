<h2>Data Pembayaran</h2>


<!-- mendapatkan id pembelian dari url-->
<?php
include '../connect.php';
$id_pembelian = $_GET['id'];

// mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query(" SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
$detail = $ambil->fetch_assoc();


// echo "<pre>";
// print_r($detail);
// echo "</pre>"

?>

<div class="row">
  <div class="col-md-6">
    <table class="table">
      <tr>
        <th>Nama</th>
        <td><?php echo $detail['nama'] ?></td>
      </tr>
      <tr>
        <th>Bank</th>
        <td><?php echo $detail['bank'] ?></td>
      </tr>
      <tr>
        <th>Jumlah</th>
        <td> Rp <?php echo number_format($detail['jumlah']); ?></td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td><?php echo $detail['tanggal']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <img src="../bukti_pembayaran/<?php echo $detail['bukti']; ?>" alt="image" class="img-thumbnail rounded">
  </div>
</div>


<form action="" method="post">
  <div class="form-group">
    <label for="resi">No Resi Pengiriman</label>
    <input type="text" name="resi" id="resi" class="form-control" placeholder="masukkan nomor resi pengiriman">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-select" style="background-color: white !important;" aria-label="Default select example">
      <option value="">Pilih Status</option>
      <option value="pending">pending</option>
      <option value="lunas">lunas</option>
      <option value="barang dikirim">barang dikirim</option>
      <option value="dibatalkan">dibatalkan</option>
      <option value="sudah mengirim pembayaran">sudah mengirim pembayaran</option>
      <option value="belum dibayar">belum dibayar</option>
      <option value="barang sudah sampai">barang sudah sampai</option>
    </select>
  </div>
  <button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST['proses'])) {
  $resi = $_POST['resi'];
  $status = $_POST['status'];
  $koneksi->query("UPDATE pembelian SET resi_pengiriman = '$resi', status_pembayaran = '$status' WHERE id_pembelian = '$id_pembelian'");

  echo "<script>alert('data pembelian terupdate');</script>";
  echo "<script>location='indexx.php?halaman=pembelian';</script>";
}


?>