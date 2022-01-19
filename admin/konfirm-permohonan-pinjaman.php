<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION["username"])){
  echo "<script> document.location.href='../login-admin'; </script>";
}




if (isset($_GET['id']) && isset($_GET['konfir'])) {
    $tgl = date('Y-m-d', strtotime('+30 days'));
    if($_GET['konfir'] == 1){
        mysqli_query($koneksi, "UPDATE permohonan_pinjaman SET status = 'Sudah Disetujui', tanggal_persetujuan = '". date('Y-m-d')."' WHERE id_permohonan =".$_GET['id']);
        $cek = mysqli_query($koneksi, "SELECT * FROM pelunasan_pinjaman WHERE id_permohonan  =".$_GET['id']);
        $row = $cek->num_rows;
        if ($row < 1 ){
            mysqli_query($koneksi, "INSERT INTO  pelunasan_pinjaman (id_permohonan ,  bayar_ke ,  tanggal_jatuh_tempo ,  tanggal_dibayarkan ,  status ) VALUES (".$_GET['id'].",'1','$tgl',NULL,'Belum Bayar')");
        }
    }
    if($_GET['konfir'] == 0){
        mysqli_query($koneksi, "UPDATE permohonan_pinjaman SET status = 'Tidak Disetujui', tanggal_persetujuan = '". date('Y-m-d')."' WHERE id_permohonan =".$_GET['id']);
        mysqli_query($koneksi, "DELETE FROM pelunasan_pinjaman WHERE id_permohonan =".$_GET['id']);
    }
}
