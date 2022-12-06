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

    $nama_lengkap = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telepon'];
    $passVall = $_POST['password'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $id_status = $_POST['id_status'];

    $query = "INSERT INTO users (nama_lengkap,username,email,no_telp,password,jk,alamat,id_status) VALUES ('$nama_lengkap','$username','$email','$no_telp','$passVall','$jk','$alamat','3')";

    $result = mysqli_query($koneksi, $query);
    // header('location: index.php?halaman=pembelian');

    if ($result) {
        echo "<script>
        alert('simpan data sukses');
        document.location= 'index.php?halaman=pembelian';
        </script>";
    } else {
        echo "<script>
        alert('simpan data gagal');
        document.location= 'index.php?halaman=pembelian';
        </script>";
    }
}

if (isset($_POST['bUbah'])) {

    $ubah = mysqli_query($koneksi, "UPDATE users SET 
        nama_lengkap = '$_POST[nama]',
        username = '$_POST[username]',
        email = '$_POST[email]',
        no_telp = '$_POST[no_telepon]',
        password = '$_POST[password]',
        jk = '$_POST[jenis_kelamin]',
        alamat = '$_POST[alamat]'
        WHERE id_pembeli = '$_POST[id_pembeli]'
    ");
    // header('location: member.php');

    if ($ubah) {
        echo "<script>
        alert('ubah data sukses');
        document.location= 'index.php?halaman=pembelian';
        </script>";
    } else {
        echo "<script>
        alert('ubah data gagal');
        document.location= 'index.php?halaman=pembelian';
        </script>";
    }
}

if (isset($_POST['bhapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM users
        WHERE id_pembeli = '$_POST[id_pembeli]'
    ");

    // header('location: member.php');

    if ($hapus) {
        echo "<script>
        alert('hapus data sukses');
        document.location= 'index.php?halaman=pembelian';
        </script>";
    } else {
        echo "<script>
        alert('hapus data gagal');
        document.location= 'index.php?halaman=pembelian';
        </script>";
    }
}



?>
<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pembelian</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">No Telepon</label>
                                <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan No Telepon" name="no_telepon">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                    <option value="Laki">Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"></textarea>
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
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../connect.php';
                $no = 1;
                $member = mysqli_query($koneksi, "SELECT * FROM users  JOIN pembelian ON pembelian.id_pembeli = users.id_pembeli Order by id_pembelian DESC");
                while ($row = mysqli_fetch_array($member)) {
                    $id = $row['id_pembelian'];
                    $id_pembeli = $row['id_pembeli'];
                    $nama = $row['nama_lengkap'];
                    $tanggal_pembelian = $row['tanggal_pembelian'];
                    $total = $row['total_pembelian'];


                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $tanggal_pembelian ?></td>
                        <td><?php echo $total ?></td>
                        <td>
                            <a href="#" class="btn btn-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fas fa-trash"></i> </a>
                            <a href="index.php?halaman=detail&id=<?= $row['id_pembelian']; ?>" class="btn btn-primary rounded-pill">Detail</a>
                        </td>
                    </tr>

                    <!-- awal modal ubah -->
                    <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Pembelian</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">

                                    <div class="modal-body">
                                        <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?= $id_pembeli  ?>">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama" name="nama" value="<?= $nama ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username" name="username" value="<?= $username ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email" name="email" value="<?= $email ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">No Telepon</label>
                                            <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan No Telepon" name="no_telepon" value="<?= $no_telp ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Password" name="password" value="<?= $password ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                                <option value="<?= $jenis_kelamin  ?>">
                                                    <?= $jenis_kelamin ?></option>
                                                <option value="Laki">Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"><?= $alamat ?></textarea>
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
                    <!-- awal modal detail -->
                    <div class="modal fade" id="modalDetail<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Detail Pelanggan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">

                                    <div class="modal-body">
                                        <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?= $id_pembeli  ?>">

                                        <strong><?php echo $row['username'] ?></strong> <br>
                                        <p>
                                            <?php echo $row['no_telp'] ?> <br>
                                            <?php echo $row['email'] ?>
                                        </p>
                                        <p>
                                            <?php echo $row['tanggal_pembelian'] ?> <br>
                                            <?php echo $row['total_pembelian'] ?>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir modal detail -->
                    <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Pembelian</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?= $id_pembeli  ?>">
                                        <h5 class="text-center">Apakah anda yakin akan menghapus data ini ? <br>
                                            <span class="text-danger"><?= $row['username'] ?> - <?= $row['email']  ?></span>
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
            $('#member').DataTable();
        });
    </script>
</div>