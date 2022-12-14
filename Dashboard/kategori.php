<?php

require '../connect.php';
// session_start();
// if (empty($_SESSION['id_pembeli'])) {
//     echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='../login.php'</script>";
// }

// $query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
// $query_select = mysqli_query($koneksi, $query);
// $result = mysqli_fetch_array($query_select);

if (isset($_POST['bsimpan'])) {
  $nama = $_POST['nama'];
  $no_telp = $_POST['no_telepon'];
  $alamat = $_POST['alamat'];

  $query = "INSERT INTO supplier (nama_supplier,no_telp,alamat) VALUES ('$nama','$no_telp','$alamat')";

  $result = mysqli_query($koneksi, $query);

  // header('location: index.php?halaman=supplier');
  if ($result) {
    echo "<script>
        alert('simpan data sukses');
        document.location= 'indexx.php?halaman=supplier';
        </script>";
  } else {
    echo "<script>
        alert('simpan data gagal');
        document.location= 'indexx.php?halaman=supplier';
        </script>";
  }
}


if (isset($_POST['bUbah'])) {
  $ubah = mysqli_query($koneksi, "UPDATE supplier SET
    nama_supplier = '$_POST[nama]',
    no_telp = '$_POST[no_telepon]',
    alamat = '$_POST[alamat]' WHERE id_supplier = '$_POST[id_supplier]'
    ");

  if ($ubah) {
    echo "<script>
        alert ('berhasil ubah data');
        document.location = 'indexx.php?halaman=supplier';
        </script>";
  } else {
    echo "<script>
        alert ('gagal ubah data');
        document.location = 'indexx.php?halaman=supplier';
        </script>";
  }
}

if (isset($_POST['bhapus'])) {
  $queryHapus = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier = '$_POST[id_supplier]'");

  if ($queryHapus) {
    echo "<script>
        alert ('berhasil hapus data');
        document.location = 'indexx.php?halaman=supplier';
        </script>";
  } else {
    echo "<script>
        alert ('gagal hapus data');
        document.location = 'indexx.php?halaman=supplier';
        </script>";
  }
}

?>



<div class="container-fluid mt-5">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
      Tambah data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Supplier</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="POST">
            <div class="modal-body">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">No Telepon</label>
                <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan No Telepon" name="no_telepon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" required></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="bsimpan">Simpan</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <table id="supplier" class="table table-striped w-100 nowrap" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Supplier</th>
        <th>Nama</th>
        <th>No Telepon</th>
        <th>Alamat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include '../connect.php';
      $no = 1;
      $supplier = mysqli_query($koneksi, "SELECT * FROM supplier Order by id_supplier DESC");
      while ($row = mysqli_fetch_array($supplier)) {
        $id_supplier = $row['id_supplier'];
        $nama = $row['nama_supplier'];
        $no_telp = $row['no_telp'];
        $alamat = $row['alamat'];
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $id_supplier ?></td>
          <td><?php echo $nama ?></td>
          <td><?php echo $no_telp ?></td>
          <td><?php echo $alamat ?></td>
          <td>
            <a href="#" class="btn btn-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fas fa-trash"></i> </a>
          </td>
        </tr>
        <!-- awal modal ubah -->
        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Supplier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  <input type="hidden" name="id_supplier" id="id_supplier" value="<?php echo $id_supplier ?>">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama" name="nama" value="<?php echo $nama ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">No Telepon</label>
                    <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan No Telepon" name="no_telepon" value="<?php echo $no_telp ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" required><?php echo $alamat ?></textarea>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="bUbah">Ubah</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- akhir modal ubah -->

        <!-- awal modal hapus -->
        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Supplier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  <input type="hidden" name="id_supplier" id="id_supplier" value="<?php echo $id_supplier ?>">
                  <h5 class="text-center">Apakah anda yakin ingin menghapus data ini ? <br>
                    <span class="text-danger"><?= $row['nama_supplier'] ?> - <?= $row['alamat'] ?></span>
                  </h5>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="bhapus">Hapus</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- akhir  modal -->
      <?php
      }
      ?>
    </tbody>
  </table>
  <script>
    $(document).ready(function() {
      $('#supplier').DataTable();
    });
  </script>
</div>