<?php
// inisialisasi session
session_start();
// unset($_SESSION['id_pembeli']);
// unset($_SESSION['username']);
// unset($_SESSION['password']);
// unset($_SESSION['nama_lengkap']);
// unset($_SESSION['id_status']);

session_destroy();
header('location:index.php');
// echo "<script>
//   alert('anda telah keluar dari halaman utama');document.location='index.php'
// </script>";
