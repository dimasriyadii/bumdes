<?php
include '../koneksi.php';

if($_GET['act']== 'updateuser'){
    $id_perpinjaman = $_POST['id_perpinjaman'];
    $statuss = $_POST['statuss'];

    var_dump($id_perpinjaman);

//query update
$queryupdate = mysqli_query($koneksi, "UPDATE permohonan_pinjaman SET id_perpinjaman='$id_perpinjaman' , statuss='$statuss'  WHERE id_perpinjaman='$id_perpinjaman' ");

if ($queryupdate) {
    # credirect ke page index
    header("permohonan_pinjaman.php");    
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}
mysqli_close($koneksi);
}
?>