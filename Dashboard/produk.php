<?php

require '../connect.php';
// session_start();
// if (empty($_SESSION['id_pembeli'])) {
//     echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu !'); document.location='../login.php'</script>";
// }
// $query = "SELECT * FROM users WHERE id_pembeli = '$_SESSION[id_pembeli]'";
// $query_select = mysqli_query($koneksi, $query);
// $result = mysqli_fetch_array($query_select);
// $check = array(
//     "" => "-",
//     ":" => "",
//     "," => "",
//     "/" => "",
//     "'" => "",
//     '"' => "",
//     "." => "",
//     "-" => ""
// );

// if (isset($_POST['action'])) {

//     $kode_barang = $POST['kode_barang'];
//     $nama_barang = $POST['nama_barang'];
//     // $slug = strtolower(strtr($nama_barang,$check));
//     $harga_beli = $POST['harga_beli'];
//     $harga_jual = $POST['harga_jual'];
//     $stok = $POST['stok'];

//     $image = $_FILES['image']['nama'];
//     $temp = $_FILES['image']['tmp_nama'];
//     $image_files = $image . ".jpg";

//     $id_supplier = $POST['id_supplier'];
//     $nama_supplier = $POST['nama_supplier'];

//     if ($_POST['action'] == 'add') {
//         $query = mysqli_query($koneksi, "INSERT INTO barang set kode_barang = '$kode_barang', nama_barang = '$nama_barang',harga_beli = '$harga_beli',harga_jual = '$harga_jual',stok = '$stok',image = '$image_files'");
//         copy($temp, "../images/images_buah/" . $image_files);
//         header('location:produk.php');
//     } elseif ($_POST['action'] == 'update') {
//     }
// } elseif (isset($_GET['action'])) {
// } else {
//     header('location:produk.php');
// }

if (isset($_POST['bsimpan'])) {

    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    // $slug = strtolower(strtr($nama_barang,$check));
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $berat = $_POST['berat_buah'];
    $stok = $_POST['stok'];

    $image = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];
    // Mendapat extention
    $image_files = $nama_barang . ".jpg";
    $id_supplier = $_POST['id_supplier'];
    $deskripsi = $_POST['deskripsi'];
    // $nama_supplier = $_POST['nama_supplier'];


    $query = mysqli_query($koneksi, "INSERT INTO barang (kode_barang,nama_barang,harga_beli,harga_jual,stok,berat_buah,image,id_supplier,deskripsi) VALUES ('$kode_barang','$nama_barang','$harga_beli','$harga_jual','$stok','$berat','$image_files','$id_supplier','$deskripsi')");

    copy($temp, "../images/images_buah/" . $image_files);
    //         header('location:produk.php');
    // header('location:produk.php');

    if ($query) {
        echo "<script>
    alert('simpan data sukses');
    document.location= 'index.php?halaman=produk';
    </script>";
    } else {
        echo "<script>
    alert('simpan data gagal');
    document.location= 'index.php?halaman=produk';
    </script>";
    }
}

if (isset($_POST['bUbah'])) {

    $id_barang = $_POST['id_barang'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $berat = $_POST['berat_buah'];
    $stok = $_POST['stok'];
    $image = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];
    $image_files = $nama_barang . ".jpg";
    $id_supplier = $_POST['id_supplier'];

    $update_query = mysqli_query($koneksi, "UPDATE barang SET kode_barang ='$kode_barang', nama_barang = '$nama_barang',harga_beli = '$harga_beli',harga_jual = '$harga_jual',stok = '$stok',berat_buah = '$berat',image= '$image_files',id_supplier = '$id_supplier' WHERE id_barang = '$id_barang'");

    // header('location: member.php');
    copy($temp, "../images/images_buah/" . $image_files);

    if ($update_query) {
        echo "<script>
        alert('ubah data sukses');
        document.location= 'index.php?halaman=produk';
        </script>";
    } else {
        echo "<script>
        alert('ubah data gagal');
        document.location= 'index.php?halaman=produk';
        </script>";
    }
}

if (isset($_POST['bhapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM barang
        WHERE id_barang = '$_POST[id_barang]'
    ");

    // header('location: member.php');

    if ($hapus) {
        echo "<script>
        alert('hapus data sukses');
        document.location= 'index.php?halaman=produk';
        </script>";
    } else {
        echo "<script>
        alert('hapus data gagal');
        document.location= 'index.php?halaman=produk';
        </script>";
    }
}


?>



<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="action" id="action" value="add">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">kode barang</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kode buah" name="kode_barang" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Nama Buah</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Buah" name="nama_barang" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga Beli</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga Beli" name="harga_beli" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga Jual</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga Jual" name="harga_jual" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Berat Buah</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Berat Buah" name="berat_buah" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Stok Buah" name="stok" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Gambar</label>
                                <div class="letak-input" style="margin-bottom: 10px;">
                                    <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Gambar Buah" name="gambar" accept="image/*" required>
                                </div>
                                <!-- <span class="btn btn-primary btn-tambah"><i class="fas fa-plus"></i></span> -->
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">ID Supplier</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan ID Supplier" name="id_supplier" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan deskripsi produk" name="deskripsi" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="member" class="table table-striped table-bordered w-100 nowrap" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>kode Buah</th>
                    <th>Nama Buah</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../connect.php';
                $no = 1;
                $produk = mysqli_query($koneksi, "SELECT * FROM barang  JOIN supplier ON barang.id_supplier = supplier.id_supplier ");
                while ($row = mysqli_fetch_array($produk)) {

                    $id_barang = $row['id_barang'];
                    $kode_barang = $row['kode_barang'];
                    $nama_barang = $row['nama_barang'];
                    $harga_beli = $row['harga_beli'];
                    $harga_jual = $row['harga_jual'];
                    $berat = $row['berat_buah'];
                    $stok = $row['stok'];
                    $image = $row['image'];
                    $id_supplier = $row['id_supplier'];
                    $nama_supplier = $row['nama_supplier'];
                    $deskripsi = $row['deskripsi'];
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $kode_barang ?></td>
                        <td><?php echo $nama_barang ?></td>
                        <td><?php echo $harga_beli ?></td>
                        <td><?php echo $harga_jual ?></td>
                        <td><?php echo $stok ?></td>
                        <td><img src="../images/images_buah/<?php echo $image ?>" width="100px" class="rounded-circle"></td>

                        <td>
                            <a href="#" class="btn btn-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fas fa-trash"></i> </a>
                            <a href="index.php?halaman=detail_produk&id=<?php echo $id_barang ?>" class="btn btn-primary rounded-pill">Detail</a>
                        </td>
                    </tr>
                    <!-- awal modal ubah -->
                    <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_barang" id="id_barang" value="<?= $id_barang  ?>">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">kode barang</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kode buah" name="kode_barang" value="<?php echo $kode_barang ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Nama Buah</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Buah" name="nama_barang" value="<?php echo $nama_barang ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Harga Beli</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga Beli" name="harga_beli" value="<?php echo $harga_beli ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Harga Jual</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga Jual" name="harga_jual" value="<?php echo $harga_jual ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Berat Buah</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Berat Buah" name="berat_buah" required value="<?= $berat ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Stok</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Stok Buah" name="stok" value="<?php echo $stok ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Gambar</label>
                                            <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Gambar Buah" name="gambar" accept="image/*" required value="<?php echo $image ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">ID Supplier</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan ID Supplier" name="id_supplier" value="<?php echo $id_supplier ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="bUbah">Ubah</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir modal ubah -->

                    <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_barang" id="id_barang" value="<?= $id_barang  ?>">
                                        <h5 class="text-center">Apakah anda yakin akan menghapus data ini ? <br>
                                            <span class="text-danger"><?= $kode_barang ?> - <?= $nama_barang  ?></span>
                                        </h5>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir modal ubah -->
                <?php

                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- akhir modal -->
    <script>
        $(document).ready(function() {
            $('#member').DataTable({
                scrollX: true,
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            $(".btn-tambah").on("click", function() {
                $(".letak-input").append("<input type='file' class='form-control'  name='gambar[]' >");
            })
        })
    </script> -->
</div>
<!-- /.container-fluid -->