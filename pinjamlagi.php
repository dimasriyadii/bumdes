<?php
if (isset($_POST['contactFrmSubmit'])){
    include 'koneksi.php';
    $id_peminjam = $_POST['id_peminjam'];
    $peminjaman_ke = $_POST['peminjaman_ke'];
    $jumlahpinjaman = $_POST['jumlahpinjaman'];
    $durasiangsuran = $_POST['durasiangsuran'];
    $tanggal = date('Y-m-d');
    $query = 'INSERT INTO permohonan_pinjaman (id_peminjam, peminjaman_ke, jumlah_pinjam, durasi_angsuran, tanggal) VALUES ("'.$id_peminjam.'","'.$peminjaman_ke.'","'.$jumlahpinjaman.'", "'.$durasiangsuran.'", "'.$tanggal.'") ';     
    $proses = $koneksi->query($query);
    if($proses){
        $status = 'ok';
    }else{
        $status = 'err';
    }
    echo $status;
}
?>