<?php
include 'connect.php';
$username = $_POST['username'];
$password = $_POST['password'];

$cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

$user_valid = mysqli_fetch_array($cek_user);

// uji jika username terdaftar
if ($user_valid) {
  if ($password == $user_valid['password'] && $id_status = $user_valid['id_status']) {
    session_start();
    $_SESSION['id_pembeli'] = $user_valid['id_pembeli'];
    $_SESSION['identitas'] = $user_valid;
    $setJSON = array(
      'status' => true,
      'id_status' => $id_status,
      'icon' => 'success',
      'title' => 'Login Berhasil!',
      'text' => 'You will be redirected in 3 seconds.'
    );
    header("Content-Type: application/json");
    echo json_encode($setJSON);
  } else {
    $setJSON = [
      'status' => false,
      'icon' => 'error',
      'title' => 'Login Gagal!',
      'text' => 'Maaf, login gagal, password anda tidak sesuai!',
    ];
    header("Content-Type: application/json");
    echo json_encode($setJSON);
  }
  
} else {
  $setJSON = [
    'status' => false,
    'icon' => 'error',
    'title' => 'Login Gagal!',
    'text' => 'Maaf, login gagal, user tidak ditemukan!'
  ];
  header("Content-Type: application/json");
  echo json_encode($setJSON);
}
// else {
//     echo "<script>alert('Maaf, login gagal, password anda tidak sesuai!'); document.location='login.php'</script>";
//   }
// } else {
//   echo "<script>alert('Maaf, login gagal, username anda tidak terdaftar'); document.location='login.php'</script>";
// }
