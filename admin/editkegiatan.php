<?php
$halaman = 'Kegiatan';
include 'global_header.php';
?>

<div class="content">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit <?= $halaman ?>
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <div class="card-body markdown">
                                <!-- <h1>Silahkan isi formulir berikut untuk mengajukan permohonan pinjaman</h1> -->
                                <!-- <br> -->
                                <?php
                                $id = $_GET['id'];
                                $query = $koneksi->query("SELECT * FROM kegiatan WHERE id_kegiatan = '$_GET[id]' ");
                                if(is_array($query) || is_object($query)){
                                foreach ($query as $data) {
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <div class="mb-6">
                                                <div class="form-label required">Foto Kegiatan</div>
                                                <input type="file" class="form-control" name="fotokegiatan">
                                            </div>
                                            <br>
                                            <div class="mb-6">
                                                <img src="./img/kegiatan/<?= $data['gambar'];?>" alt="<?= $data['gambar'];?>">
                                            </div>

                                            <div class="mb-6">
                                                <div class="form-label required">Tanggal Kegiatan</div>
                                                <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-10">
                                            <div class="mb-6">
                                                <label class="form-label required">Judul Kegiatan</label>
                                                <input type="text" class="form-control" name="judul"
                                                    placeholder="Masukkan judul kegiatan" value="<?= $data['judul'] ?>" required>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Isi Kegiatan</div>
                                                <textarea class="ckeditor" id="ckeditor2" name="isikegiatan" rows="7"
                                                    placeholder="Content.."><?= $data['isi'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary " name="tambah" type="submit" value="Simpan">
                                    <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
                                </form>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php
if (isset($_POST['tambah'])){
    $judul = $_POST['judul'];
    $isikegiatan = $_POST['isikegiatan'];
    $tanggal = $_POST['tanggal'];

    $fotokegiatan = $_FILES['fotokegiatan']['name'];

    if(empty($fotokegiatan)){
        echo $update = "UPDATE kegiatan SET judul='".$judul."', isi='".$isikegiatan."', tanggal='".$tanggal."' WHERE id_kegiatan = '".$id."' ";

        $sql = mysql_query($koneksi, $update);
        $_SESSION['pesan'] = 'Ubah';
        echo "<script> document.location.href='./kegiatan';</script>";
    }else{
        $query = $koneksi->query("SELECT * FROM kegiatan WHERE id_kegiatan = '$id' ");
        $data = mysqli_fetch_array($query);
        $lokasi = $data['gambar'];
        $hapus_gambar = "./img/kegiatan/".$lokasi;
        unlink($hapus_gambar);

        move_uploaded_file($_FILES['fotokegiatan']['tmp_name'], './img/kegiatan/'.$fotokegiatan);

        echo $update = "UPDATE kegiatan SET  judul='".$judul."', isi='".$isikegiatan."', gambar='".$fotokegiatan."', tanggal='".$tanggal."' WHERE id_kegiatan = '".$id."' ";
        
        $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
        if ($proses){
        $_SESSION['pesan'] = 'Ubah';
        echo "<script> document.location.href='./kegiatan';</script>";
        exit;
    }
    }
}
?>
<?php include 'global_footer.php'; ?>