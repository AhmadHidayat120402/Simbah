<?php

// panggil koneksi db
require "connect.php";


// $pass = password_hash($password, PASSWORD_DEFAULT);
$username = $_POST['username'];
$password = $_POST['password'];
// $id_status = $_POST['id_status'];

// cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' and password = '$password'");

$user_valid = mysqli_fetch_array($cek_user);



// uji jika email terdaftar
if ($user_valid) {
  //  jika username terdaftar
  // cek password sesuai atau tidak
  if ($password == $user_valid['password'] && $id_status = $user_valid['id_status']) {

    // jika password sesuai buat session

    session_start();
    $_SESSION['username'] = $user_valid['username'];
    $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
    $_SESSION['id_status'] = $user_valid['id_status'];

    //  uji level user
    if ($id_status == 1) {
      header('location: Dashboard/index.php');
    } elseif ($id_status == 2) {
      header('location: Dashboard/index.php');
    } elseif ($id_status == 3) {
      header('location: home.php');
    } elseif ($id_status == 4) {
      header('location: home.php');
    }
  } else {
    echo "<script>alert('Maaf, login gagal, password anda tidak sesuai!'); document.location='login.php'</script>";
  }
} else {
  echo "<script>alert('Maaf, login gagal, username anda tidak terdaftar'); document.location='login.php'</script>";
}
