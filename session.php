<?php 

session_start();


if(!isset($_SESSION['id_pembeli'])){
  
  header("location:login.php");
}


