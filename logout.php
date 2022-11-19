<?php
// inisialisasi session
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_lengkap']);
unset($_SESSION['level']);

session_destroy();
echo "<script>
  alert('anda telah keluar dari halaman utama');document.location='index.php'
</script>";
