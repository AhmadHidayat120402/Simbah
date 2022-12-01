<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "db_simbah";
$koneksi = mysqli_connect($server, $username, $password, $db);
//  or die(mysqli_error($koneksi));

if (!$koneksi) {
  die("koneksi gagal");
}
