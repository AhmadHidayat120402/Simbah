<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "Simbah";
$koneksi = mysqli_connect($server, $username, "", $db);

if (mysqli_connect_errno()) {
  echo "koneksi gagal : " . mysqli_connect_error();
}
