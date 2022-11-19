<?php

// panggil koneksi db
require "connect.php";



$password = mysqli_escape_string($koneksi, $_POST['password']);
$pass = password_hash($password, PASSWORD_DEFAULT);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$level = mysqli_escape_string($koneksi, $_POST['level']);

// cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' and level = '$level'");
$user_valid = mysqli_fetch_array($cek_user);

// uji jika email terdaftar
if ($user_valid) {
  //  jika username terdaftar
  // cek password sesuai atau tidak
  if ($password == $user_valid['password']) {

    // jika password sesuai buat session

    session_start();
    $_SESSION['username'] = $user_valid['username'];
    $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
    $_SESSION['level'] = $user_valid['level'];

    //  uji level user
    if ($level == "owner") {
      header('location: Dashboard/index.php');
    } elseif ($level == "karyawan") {
      header('location: Dashboard/index.php');
    } elseif ($level == "member") {
      header('location: home.php');
    } elseif ($level == "pelanggan") {
      header('location: home.php');
    }
  } else {
    echo "<script>alert('Maaf, login gagal, password anda tidak sesuai!'); document.location='login.php'</script>";
  }
} else {
  echo "<script>alert('Maaf, login gagal, username anda tidak terdaftar'); document.location='login.php'</script>";
}
