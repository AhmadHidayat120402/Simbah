<h2>Detail Pembelian</h2>
<?php
require '../connect.php';
$query_pembelian = "SELECT * FROM users JOIN pembelian ON pembelian.id_pembeli = users.id_pembeli WHERE pembelian.id_pembelian = '$_GET[id_beli]'";

$hasil_keputusan = mysqli_query($koneksi, $query_pembelian);
$ambil = mysqli_fetch_array($hasil_keputusan);
?>
<!-- <pre><?php //print_r($ambil); 
          ?></pre> -->
<strong><?php echo $ambil['username']; ?></strong> <br>
<p>
  <?php echo $ambil['no_telp']; ?> <br>
  <?php echo $ambil['email']; ?>
</p>
<p>
  Tanggal : <?php echo $ambil['tanggal_pembelian']; ?> <br>
  mendapatkan diskon : <?php echo $ambil['diskon'] ?> % <br>
  Total : Rp <?php echo number_format($ambil['total_pembelian']); ?>
</p>
<div class="table-responsive">
  <table id="detail_pembelian" class="table table-striped table-bordered w-100 nowrap" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <!-- <th>Status</th> -->
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>SubTotal</th>
        <!-- <th>Diskon</th> -->

      </tr>
    </thead>
    <tbody>
      <?php
      require '../connect.php';
      $no = 1;
      $query_produk = mysqli_query($koneksi, "SELECT * FROM pembelian_buah JOIN barang ON pembelian_buah.id_barang =  barang.id_barang WHERE pembelian_buah.id_pembelian ='$_GET[id_beli]'");
      while ($ambil_query = mysqli_fetch_array($query_produk)) { ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $ambil_query['nama_barang']; ?></td>
          <td><?php echo $ambil_query['harga_jual']; ?></td>
          <td><?php echo $ambil_query['jumlah']; ?></td>
          <td>
            <?php echo $ambil_query['harga_jual'] * $ambil_query['jumlah']; ?>
          </td>
        </tr>
      <?php }

      ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#detail_pembelian').DataTable();
  });
</script>