<?php

// include 'session.php';
include 'connect.php';

session_start();

// mendapatkan id produk dari url
$id_produk = $_GET['id'];

// if (isset($_GET['id'])) {
//   $insert = mysqli_query($koneksi, "INSERT INTO cart");
// }
// $keranjang[$id_produk] = 1

// jika sudah ada produk dikeranjang maka produk itu jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_produk])) {
  $_SESSION['keranjang'][$id_produk] += 1;

  // jika belum dikeranjang maka produk itu dianggap beli
} else {
  $_SESSION['keranjang'][$id_produk] = 1;
}

// larikan halaman ke cart.php jika berhasil maka akan menuju ke halaman keranjang

echo "<script>alert('produk telah masuk ke keranjang'); </script>";
echo "<script>location='cart.php'</script>";
