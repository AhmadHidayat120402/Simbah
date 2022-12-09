<h2>Data Pembayaran</h2>


<!-- mendapatkan id pembelian dari url-->
<?php
include '../connect.php';
$id_pembelian = $_GET['id'];

// mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query(" SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
$detail = $ambil->fetch_assoc();


echo "<pre>";
print_r($detail);
echo "</pre>"

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
        <td> Rp <?php echo $detail['tanggal']; ?></td>
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
      <option value="lunas">Lunas</option>
      <option value="barang dikirim">Barang Dikirim</option>
      <option value="batal">Batal</option>
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
  echo "<script>location='index.php?halaman=pembelian';</script>";
}


?>