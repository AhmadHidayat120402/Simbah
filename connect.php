<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "Simbah";
$koneksi = mysqli_connect($server, $username, "", $db) or die(mysqli_error($koneksi));
