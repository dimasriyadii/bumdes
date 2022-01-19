<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION["username"])) {
  echo "<script> document.location.href='../login-admin'; </script>";
}

$user = $_SESSION['username'];
$level = $_SESSION['level'];
$namalengkap = $_SESSION['nama_lengkap'];
$gambar = $_SESSION['gambar'];

$query = $koneksi->query("SELECT * FROM user WHERE username = '$user'");
$row = $query->fetch_array();
//jika akun berlevel peserta mengakses page admin
if ($level === "Karyawan") {
  echo "<script> document.location.href='../user/index'; </script>";
  // echo "<script> alert('anda tidak memiliki akses untuk halaman ini!');window.location= '../user/index';</script>";
}



$tagihan = mysqli_query($koneksi, "SELECT * FROM pelunasan_pinjaman WHERE tanggal_jatuh_tempo <= subdate(current_date, 1) AND STATUS = 'Belum Bayar';");
while ($tg = mysqli_fetch_array($tagihan)) {
  mysqli_query($koneksi, "UPDATE pelunasan_pinjaman SET notif = 'Belum Baca' WHERE id_pelunasan = " . $tg['id_pelunasan']);
}


function rupiah($angka)
{
  $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}
function tgl_indo($tanggal)
{
  if ($tanggal == '-' || $tanggal == '' || $tanggal == NULL) {
    return $tanggal;
  };
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.23
* @link https://tabler.io
* Copyright 2018-2021 The Tabler Authors
* Copyright 2018-2021 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" href="../favicon.ico" type="image/x-icon" />
  <title>Dashboard - SIBUMDES - Sistem Informasi Badan Usaha Milik Desa.</title>
  <!-- CSS files -->
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap-4.0.0/dist/css/bootstrap.css">
  <script type="text/javascript" src="../assets/jquery/jquery.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-4.0.0/dist/js/bootstrap.js"></script>

  <!-- js baru -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"> -->

  <link href="../assets/dist/css/tabler.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-flags.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/demo.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <link href="../assets/fontawesome/css/all.css" rel="stylesheet">
  <!--load all styles -->
</head>

<body class="antialiased">
  <div class="page">
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
          <a href="./index">
            <img src="../img/logo.png" width="150" height="32" alt="Sibumdes" class="navbar-brand-image">
          </a>
        </h1>
        <?php include 'global_navigasi.php'; ?>