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
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    $total = $_POST['total_pembelian'];


    $query = "INSERT INTO pembelian join users (nama_lengkap,tanggal_pembelian,total_pembelian) VALUES ('$nama','$tanggal_pembelian','$total')";

    $result = mysqli_query($koneksi, $query);
    // header('location: index.php?halaman=pembelian');

    if ($result) {
        echo "<script>
        alert('simpan data sukses');
        document.location= 'indexx.php?halaman=pembelian';
        </script>";
    } else {
        echo "<script>
        alert('simpan data gagal');
        document.location= 'indexx.php?halaman=pembelian';
        </script>";
    }
}

if (isset($_POST['bUbah'])) {

    $ubah = mysqli_query($koneksi, "UPDATE users join pembelian SET 
        nama_lengkap = '$_POST[nama]'
        tanggal_pembelian = '$_POST[tanggal_pembelian]'
        total_pembelian = '$_POST[total_pembelian]'
        WHERE id_pembeli = '$_POST[id_pembeli]' && id_pembelian = '$_POST[id_pembelian]'
    ");
    // header('location: member.php');

    if ($ubah) {
        echo "<script>
        alert('ubah data sukses');
        document.location= 'indexx.php?halaman=pembelian';
        </script>";
    } else {
        echo "<script>
        alert('ubah data gagal');
        document.location= 'indexx.php?halaman=pembelian';
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
        document.location= 'indexx.php?halaman=pembelian';
        </script>";
    } else {
        echo "<script>
        alert('hapus data gagal');
        document.location= 'indexx.php?halaman=pembelian';
        </script>";
    }
}



?>
<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pembelian</h1>

    </div>
    <div class="table-responsive">
        <table id="member" class="table table-striped table-bordered w-100 nowrap" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Status Pembelian</th>
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
                    $status_pembelian = $row['status_pembayaran'];
                    $total = $row['total_pembelian'];
                    $email = $row['email'];


                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $tanggal_pembelian ?></td>
                        <td><?php echo $status_pembelian ?></td>
                        <td><?php echo $total ?></td>
                        <td>
                            <!-- 
                            <a href="#" class="btn btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target="#modalHapus<? //echo $no 
                                                                                                                                ?>"><i class="fas fa-trash"></i> </a> -->
                            <a href="indexx.php?halaman=detail&id_beli=<?= $row['id_pembelian']; ?>" class="btn btn-primary rounded-pill">Detail</a>

                            <?php
                            if ($status_pembelian !== 'pending') { ?>
                                <a href="indexx.php?halaman=pembayaran&id=<?php echo $id ?>" class="btn btn-success rounded-pill">Pembayaran</a>
                            <?php  } ?>
                        </td>
                    </tr>
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
                                            <span class="text-danger"><?= $nama ?></span>
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