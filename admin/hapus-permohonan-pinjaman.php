<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION["username"])){
  echo "<script> document.location.href='../login-admin'; </script>";
}

if (isset($_GET['id'])) {
    mysqli_query($koneksi, "DELETE FROM permohonan_pinjaman WHERE id_permohonan =".$_GET['id']);
}