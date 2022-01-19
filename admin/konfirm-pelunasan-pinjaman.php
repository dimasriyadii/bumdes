<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION["username"])) {
    echo "<script> document.location.href='../login-admin'; </script>";
}


if (isset($_GET['id']) && isset($_GET['konfir'])) {

    $qincre = mysqli_query($koneksi, "SELECT id_permohonan, bayar_ke, tanggal_jatuh_tempo FROM pelunasan_pinjaman WHERE id_pelunasan=" . $_GET['id']);
    $dincre = mysqli_fetch_array($qincre);
    $incre = $dincre['bayar_ke'] + 1;
    $tgl = date('Y-m-d', strtotime('+30 days', strtotime($dincre['tanggal_jatuh_tempo'])));


    $qmaxang = mysqli_query($koneksi, "SELECT durasi_angsuran FROM permohonan_pinjaman WHERE id_permohonan = " . $dincre['id_permohonan']);
    $maxang = mysqli_fetch_array($qmaxang);


    $tglbyr = date('Y-m-d');
    if ($_GET['konfir'] == 1) {
        mysqli_query($koneksi, "UPDATE pelunasan_pinjaman SET status = 'Sudah Bayar', tanggal_dibayarkan = '" . $tglbyr . "' WHERE id_pelunasan =" . $_GET['id']);
        if ($incre <= $maxang['durasi_angsuran']) {
            mysqli_query($koneksi, "INSERT INTO pelunasan_pinjaman(id_permohonan, bayar_ke, tanggal_jatuh_tempo, tanggal_dibayarkan, status) VALUES ('" . $dincre['id_permohonan'] . "','" . $incre . "','" . $tgl . "',NULL,'Belum Bayar')");
        }
    }
    if ($_GET['konfir'] == 0) {
        mysqli_query($koneksi, "UPDATE pelunasan_pinjaman SET status = 'Belum Bayar', tanggal_dibayarkan = NULL WHERE id_pelunasan =" . $_GET['id']);

        $qdecre = mysqli_query($koneksi, "SELECT bayar_ke FROM pelunasan_pinjaman WHERE id_permohonan=" . $dincre['id_permohonan'] . " ORDER BY bayar_ke DESC LIMIT 1");
        $ddecre = mysqli_fetch_array($qdecre);

        for ($i = $incre; $i <= $ddecre['bayar_ke']; $i++) {
            mysqli_query($koneksi, "DELETE FROM pelunasan_pinjaman WHERE id_permohonan = '" . $dincre['id_permohonan'] . "' AND bayar_ke = '" . $i . "'");
        }
    }
}
