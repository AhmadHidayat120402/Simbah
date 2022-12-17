<?php
include '../connect.php';


$id_buah = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM barang JOIN supplier WHERE id_barang = '$id_buah'");
$pecah = $ambil->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <h2 class="fw-bold">Detail Buah <?php echo $pecah['nama_barang'] ?></h2>
    <div class="row mt-5">
      <div class="col-md 6">
        <table class="table ">

          <tr>
            <th>ID Buah </th>
            <td><?php echo $pecah['id_barang'] ?></td>
          </tr>
          <!-- <tr>
            <th>ID Kategori </th>
            <td><?php //echo $pecah['id_kategori'] 
                ?></td>
          </tr> -->
          <tr>
            <th>ID Supplier </th>
            <td><?php echo $pecah['id_supplier'] ?></td>
          </tr>
          <tr>
            <th>Nama Supplier </th>
            <td><?php echo $pecah['nama_supplier'] ?></td>
          </tr>
          <tr>
            <th>Kode Buah </th>
            <td><?php echo $pecah['kode_barang'] ?></td>
          </tr>
          <tr>
            <th>Nama Buah </th>
            <td><?php echo $pecah['nama_barang'] ?></td>
          </tr>
          <tr>
            <th>Harga Beli </th>
            <td>Rp <?php echo number_format($pecah['harga_beli']) ?></td>
          </tr>
          <tr>
            <th>Harga Jual </th>
            <td>Rp <?php echo number_format($pecah['harga_jual']) ?></td>
          </tr>
          <tr>
            <th>Stok Buah </th>
            <td><?php echo $pecah['stok'] ?></td>
          </tr>
          <tr>
            <th>Buah Busuk </th>
            <td><?php echo $pecah['busuk'] ?></td>
          </tr>
          <tr>
            <th>Buah Rusak </th>
            <td><?php echo $pecah['rusak'] ?></td>
          </tr>
          <tr>
            <th>Berat Buah </th>
            <td><?php echo $pecah['berat_buah'] ?></td>
          </tr>
          <tr>
            <th>Deskripsi </th>
            <th></th>
          </tr>
        
            
        
        </table>
      </div>
      <div class="col-md 6">
        <img src="../images/images_buah/<?php echo $pecah['image'] ?>" alt="image" width="450px">
        <?php echo $pecah['deskripsi'] ?>
      </div>
    </div>
  </div>
</body>

</html>