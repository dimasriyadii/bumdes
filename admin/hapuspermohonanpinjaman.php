<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$query = "SELECT * FROM permohonan_pinjaman WHERE id_perpinjaman = '$id'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

if (is_file("../img/fotousaha/" . $data['fotousaha']))
    unlink("../img/fotousaha/" . $data['fotousaha']);
    unlink("../img/fotoketeranganusaha/" . $data['fotoketusaha']);
    
$hapus = "DELETE FROM permohonan_pinjaman WHERE id_perpinjaman = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
    // $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //                 <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di hapus</h6></div>';
}
echo "<script> document.location.href='./permohonan-pinjaman';</script>";
die();
