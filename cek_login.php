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
    $_SESSION['id_pembeli'] = $user_valid['id_pembeli'];
    $_SESSION['identitas'] = $user_valid;
    // echo $success =  "Login berhasil";
    //  uji level user
    if ($id_status == 1) {
      echo "<script>
      Swal.fire({
          icon: 'success',
          title: 'ANDA BERHASIL LOGIN',
          text: 'Semoga Harinya Menyenangkan ❤️'
      }).then((result) => {
          window.location.href = 'Dashboard/index.php'
      })
</script>";
    } elseif ($id_status == 2) {
      header('location: Dashboard/index.php');
    } elseif ($id_status == 3) {
      header('location: home.php');
    } elseif ($id_status == 4) {
      header('location: home.php');
    }
  } else {
    echo $errorr = 'Maaf, login gagal, password anda tidak sesuai!';
    header('login.php');
  }
} else {
  echo $errorr = 'Maaf, login gagal, password anda tidak sesuai!';
  header('login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<?php
if (isset($user_valid)) {  ?>
  <script type="text/javascript" >
    Swal.fire({
                               
                                title: 'ANDA BERHASIL LOGIN',
                               
                                button: "Oke"
                            }).then((result) => {
                                window.location.href = 'Dashboard/index.php'
                            })
  </script>
<?php  } ?>
<?php
if (!isset($user_valid)) {  ?>
  <script>
    swal({
      title: "<?php echo $errorr ?>",
      icon: "error",
      button: "OKE",
    })
  </script>
<?php  } ?>
</html>