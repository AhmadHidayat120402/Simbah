<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beli</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  <script src="vendor/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

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

  //   echo "<script>
  // alert('produk telah masuk ke keranjang'); 
  // </script>";
  //   echo "<script>location='cart.php'</script>";
  echo "<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil ',
    text : 'produk telah masuk ke keranjang',
            }).then((result) => {
    window.location.href = 'cart.php';
})
  </script>";
  ?>

</body>

</html>