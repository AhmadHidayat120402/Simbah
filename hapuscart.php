<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hapus Cart</title>
</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>

</html>


<?php
include 'session.php';
// session_start();
$id_produk = $_GET['id'];
unset($_SESSION['keranjang'][$id_produk]);

echo "<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text : 'produk berhasil dihapus dari keranjang',
          }).then((result) => {
  window.location.href = 'cart.php';
})
</script>";

// echo "<script> alert('produk berhasil dihapus dari keranjang'); </script>";
// echo "<script>location = 'cart.php'; </script>";
?>