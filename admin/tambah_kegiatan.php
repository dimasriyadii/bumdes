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
                        Tambah <?= $halaman ?>
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

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <div class="mb-6">
                                                <div class="form-label required">Foto Kegiatan</div>
                                                <input type="file" class="form-control" name="fotokegiatan" required>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Tanggal Kegiatan</div>
                                                <input type="date" class="form-control" name="tanggal" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-10">
                                            <div class="mb-6">
                                                <label class="form-label required">Judul Kegiatan</label>
                                                <input type="text" class="form-control" name="judul"
                                                    placeholder="Masukkan judul kegiatan" required>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Isi Kegiatan</div>
                                                <textarea class="ckeditor" id="ckeditor2" name="isikegiatan" rows="7"
                                                    placeholder="Content.."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary " name="tambah" type="submit" value="Simpan">
                                    <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
                                </form>
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
    $tmp = $_FILES['fotokegiatan']['tmp_name'];
    $foto = date('dYHiS').$fotokegiatan;
    $path = "./img/kegiatan/".$foto;

    if (move_uploaded_file($tmp, $path)){
    $query = 'INSERT INTO kegiatan (judul, isi, gambar, tanggal) VALUES ("'.$judul.'","'.$isikegiatan.'","'.$foto.'", "'.$tanggal.'") ';     

    $proses = $koneksi->query($query);
    if ($proses){
        $_SESSION['pesan'] = 'Tambah';
        echo "<script> document.location.href='./kegiatan';</script>";
        exit;
    }
}
}
?>
<?php include 'global_footer.php'; ?>