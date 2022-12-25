<?php

require '../connect.php';
// session_start();
// if (empty($_SESSION['id_pembeli'])) {
//     echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='../login.php'</script>";
// }

// $query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
// $query_select = mysqli_query($koneksi, $query);
// $result = mysqli_fetch_array($query_select);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ongkir</title>
</head>

<body>

  <div class="container-fluid mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Ongkir</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah data
      </button>

      <!-- Modal -->
      <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Ongkir</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama Daerah</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Daerah" name="nama_daerah" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Tarif</label>
                  <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Tarif" name="tarif" required>
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
    <table id="ongkir" class="table table-striped w-100 nowrap" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Daerah</th>
          <th>Tarif</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include '../connect.php';
        $no = 1;
        $ongkir = mysqli_query($koneksi, "SELECT * FROM ongkir Order by id_ongkir DESC");
        while ($row = mysqli_fetch_array($ongkir)) {
          $id_ongkir = $row['id_ongkir'];
          $nama_daerah = $row['nama_daerah'];
          $tarif = $row['tarif'];
        ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $nama_daerah ?></td>
            <td><?php echo $tarif ?></td>
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
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Ongkir</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    <input type="hidden" name="id_ongkir" id="id_ongkir" value="<?php echo $id_ongkir ?>">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Nama Daerah</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Daerah" name="nama_daerah" value="<?php echo $nama_daerah ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Tarif</label>
                      <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Tarif" name="tarif" value="<?php echo $tarif ?>" required>
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
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Ongkir</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    <input type="hidden" name="id_ongkir" id="id_ongkir" value="<?php echo $id_ongkir ?>">
                    <h5 class="text-center">Apakah anda yakin ingin menghapus data ini ? <br>
                      <span class="text-danger"><?= $row['nama_daerah'] ?> - <?= $row['tarif'] ?></span>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <?php
    if (isset($_POST['bsimpan'])) {
      $nama_daerah = $_POST['nama_daerah'];
      $tarif = $_POST['tarif'];

      $query = "INSERT INTO ongkir (nama_daerah,tarif) VALUES ('$nama_daerah','$tarif')";

      $result = mysqli_query($koneksi, $query);

      // header('location: index.php?halaman=supplier');
      if ($result) {
        $success = "Data Berhasil Disimpan";
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: ' $success',
        }).then((result) => {
            window.location.href = 'indexx.php?halaman=pelanggan';
        })
              </script>";
      } else {
        // echo $error = "Data Gagal Diinputkan !";
        echo "<script>
            alert ('Gagal tambah data');
            document.location = 'indexx.php?halaman=ongkir';
            </script>";
      }
    }


    if (isset($_POST['bUbah'])) {
      $ubah = mysqli_query($koneksi, "UPDATE ongkir SET
        nama_daerah = '$_POST[nama_daerah]',
        tarif = '$_POST[tarif]'
         WHERE id_ongkir = '$_POST[id_ongkir]'
        ");

      if ($ubah) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Ubah data berhasil',
            }).then((result) => {
                window.location.href = 'indexx.php?halaman=pelanggan';
            })
    </script>";
      } else {
        echo "<script>
            alert ('gagal ubah data');
            document.location = 'indexx.php?halaman=ongkir';
            </script>";
      }
    }

    if (isset($_POST['bhapus'])) {
      $queryHapus = mysqli_query($koneksi, "DELETE FROM ongkir WHERE id_ongkir = '$_POST[id_ongkir]'");

      if ($queryHapus) {
        echo "<script>
            alert ('berhasil hapus data');
            document.location = 'indexx.php?halaman=ongkir';
            </script>";
      } else {
        echo "<script>
            alert ('gagal hapus data');
            document.location = 'indexx.php?halaman=ongkir';
            </script>";
      }
    }
    ?>



    <script>
      $(document).ready(function() {
        $('#ongkir').DataTable();
      });
    </script>
  </div>
</body>

</html>