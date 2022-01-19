<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION["username"])){
  echo "<script> document.location.href='../login-admin'; </script>";
}

if (isset($_GET['id'])) {
   $data = mysqli_query($koneksi, "SELECT * FROM peminjam WHERE id_peminjam =".$_GET['id']);
   $d = mysqli_fetch_array($data);
   
   unlink('../img/fotousaha/'.$d['fotousaha']);
   unlink('../img/fotoketeranganusaha/'.$d['fotoketusaha']);
   mysqli_query($koneksi, "DELETE FROM peminjam WHERE id_peminjam =".$_GET['id']);
}