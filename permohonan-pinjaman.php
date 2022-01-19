<?php
$halaman = 'Permohonan Pinjaman';
include 'global_header.php';
include 'global_navigasi.php';
?>
<div class='content'>
    <div class='container-xl'>
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $halaman?>
                    </h2>
                </div>
            </div>
        </div>

        <?php
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    $pesan = $_SESSION['pesan'];
                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                $_SESSION['pesan'] = '';
                ?>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <h1 class="d-inline">Silahkan isi formulir berikut untuk mengajukan permohonan pinjaman baru.</h1>
                        <p>sudah pernah ajukan peminjaman? <a href="status-pinjaman-pelunasan">klik disini</a> untuk ajukan pinjaman lagi.</p>
                        <br>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukkan nama anda" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">No Kartu Keluarga</label>
                                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)"
                                            maxlength="16" name="nokk" placeholder="Masukkan No Kartu Keluarga anda"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            placeholder="Masukkan Alamat" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Jumlah Pengajuan</label>
                                        <input type="text" class="form-control" name="jmlpengajuan"
                                            placeholder="Masukkan jumlah pengajuan " required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label required">Upload Surat Keterangan Usaha </div>
                                        <input type="file" class="form-control" name="fotoketusaha" required>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">NIK</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control"
                                            name="nik" maxlength="16" placeholder="Masukkan nomor nik" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Masukkan Email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">No HP</label>
                                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)"
                                            maxlength="12" name="nohp" placeholder="Masukkan nomor hp " required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Durasi Angsuran/Tenor (Bulan)</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="drsiangsuran"
                                            placeholder="Masukkan durasi angsuran/tenor " required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label required">Upload Foto Usaha</div>
                                        <input type="file" class="form-control" name="fotousaha" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary " name="upload" type="submit" value="Ajukan Permohonan">
                            <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                onclick="self.history.back()">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
include 'global_footer.php';
?>

    <?php
if(isset($_POST['upload'], $_POST['nik'])){

    $date = date('Y-m-d');
    $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    $nokk = htmlentities(strip_tags(trim($_POST['nokk'])));
    $alamat = htmlentities(strip_tags(trim($_POST['alamat'])));

    $nik = $_POST['nik'];
   
    $query = $koneksi->query("SELECT nik, nokk FROM peminjam WHERE nokk = '$nokk' AND nik = '$nik'");

    // $nik = htmlentities(strip_tags(trim($_POST['nik'])));
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $nohp = htmlentities(strip_tags(trim($_POST['nohp'])));
    $jmlpengajuan = htmlentities(strip_tags(trim($_POST['jmlpengajuan'])));
    $drsiangsuran = htmlentities(strip_tags(trim($_POST['drsiangsuran'])));

    $foto1 = htmlentities(strip_tags(trim($_FILES['fotousaha']['name'])));
    $tmp1 = htmlentities(strip_tags(trim($_FILES['fotousaha']['tmp_name'])));
    $barufoto1 = date('dYHiS').$foto1;
    $path1 = "./img/fotousaha/".$barufoto1;


    $foto2 = htmlentities(strip_tags(trim($_FILES['fotoketusaha']['name'])));
    $tmp2 = htmlentities(strip_tags(trim($_FILES['fotoketusaha']['tmp_name'])));
    $barufoto2 = date('dYHiS').$foto2;
    $path2 = "./img/fotoketeranganusaha/".$barufoto2;

    if (move_uploaded_file($tmp1, $path1)){
        move_uploaded_file($tmp2, $path2);
        if($query -> num_rows > 0){
            echo "<script>alert('NIK sudah terdaftar');</script>";
            echo "<script> document.location.href='./status-pinjaman-pelunasan?nokk=". $nokk. "&nik=". $nik ."';</script>";
            }
            else {
                $query1 = "INSERT INTO peminjam (nama, nokk, alamat, nik, email, nohp, fotousaha, fotoketusaha, tanggal) VALUES ('$nama', '$nokk','$alamat','$nik','$email', '$nohp', '$barufoto1', '$barufoto2', '$date');";
                $proses1 = $koneksi->query($query1);
                $last_id = $koneksi->insert_id;

                $query2 = "INSERT INTO permohonan_pinjaman (id_peminjam, peminjaman_ke, jumlah_pinjam, durasi_angsuran, tanggal) VALUES ('$last_id', 1,'$jmlpengajuan','$drsiangsuran', '$date');";
                $proses2 = $koneksi->query($query2);

               if ($proses1 === TRUE && $proses2 === TRUE){
                    echo "<script>alert('Permohonan Pinjaman Berhasil Diinput');</script>";
                    echo "<script> document.location.href='./status-pinjaman-pelunasan?nokk=". $nokk. "&nik=". $nik ."';</script>";
                }
            }
    }
}
?>