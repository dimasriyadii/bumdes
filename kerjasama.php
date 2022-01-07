<?php
$halaman = 'Kerjasama';
$conn = mysqli_connect('localhost', 'root', '', 'desa');
include 'global_header.php';
include 'global_navigasi.php';

?>

<div class='content'>
    <div class='container-xl'>
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $halaman ?>
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
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <h1>Silahkan isi formulir berikut untuk mengajukan Permohonan Kerjasama</h1>
                        <br>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Kelompok Usaha</label>
                                        <input type="text" class="form-control" name="namausaha"
                                            placeholder="Masukkan nama kelompok usaha">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Proposal Usaha (File Dokumen)</label>
                                        <input type="file" class="form-control" name="proposalusaha">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label required">Upload Kegiatan Usaha (Foto)</div>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Kegiatan Usaha</label>
                                        <input type="text" class="form-control" name="kegiatanusaha"
                                            placeholder="Masukkan kegiatan usaha">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email Usaha</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Masukkan Email Usaha">
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

    <?php include 'global_footer.php'; ?>
    <?php
    
if(isset($_POST['upload'], $_POST['email'], $_POST['namausaha'])){
    $date = date('d-M-Y');
    $namausaha = $_POST['namausaha'];
    $querynamausaha = mysqli_query($conn, "SELECT namausaha FROM kerjasama WHERE namausaha = '$namausaha'");
    // $namausaha = htmlentities(strip_tags(trim($_POST['namausaha'])));
    $kegiatanusaha = htmlentities(strip_tags(trim($_POST['kegiatanusaha'])));
    $email = $_POST['email'];
    $queryemail = mysqli_query($conn, "SELECT email FROM kerjasama WHERE email = '$email'");
    // $query = mysqli_query($conn, "SELECT email, namausaha FROM kerjasama WHERE email = '$email' AND namausaha = '$namausaha'");
   
    //cek email
    // if (isset($_POST['email'])) {
    // $query = mysqli_query($conn, "SELECT email FROM kerjasama WHERE email = '$email'");
    // $email = $_POST['email'];

   
    $proposalusaha = htmlentities(strip_tags(trim($_FILES['proposalusaha']['name'])));
    $tmpproposalusaha = htmlentities(strip_tags(trim($_FILES['proposalusaha']['tmp_name'])));
    $baruproposalusaha = date('dYHiS').$proposalusaha;
    $path1 = "./img/proposalusaha/".$baruproposalusaha;


    $foto = htmlentities(strip_tags(trim($_FILES['foto']['name'])));
    $tmp = htmlentities(strip_tags(trim($_FILES['foto']['tmp_name'])));
    $barufoto = $namausaha.date('dYHiS').$foto;
    $path2 = "./img/proposalusaha/".$barufoto;

    if (move_uploaded_file($tmpproposalusaha, $path1)){
        move_uploaded_file($tmp, $path2);

    if($querynamausaha -> num_rows > 0){
    echo "<script>alert('Nama Usaha Sudah Terdaftar');</script>";
    }
    elseif($queryemail -> num_rows > 0) {
    echo "<script>alert('Email Sudah Terdaftar');</script>";
    }
    else {
    mysqli_query($conn, "INSERT INTO kerjasama (namausaha, proposalusaha, foto, kegiatanusaha, email, tanggal) VALUES ('$namausaha', '$baruproposalusaha','$barufoto','$kegiatanusaha','$email', '$date')");
    echo "<script>alert('Data Berhasil Diinput');</script>";
     }
        }

    // $query = mysqli_query("SELECT email email from kerjasama WHERE email = '$email'")
    // if($query -> num_rows > 0){
    //     echo "<script>alert('Email sudah terdaftar');</script>";
    // }
    // else {
    //     mysqli_query($conn, "INSERT INTO kerjasama (namausaha, proposalusaha, foto, kegiatanusaha, email, tanggal) VALUES ("'.$namausaha.'", "'.$baruproposalusaha.'","'.$barufoto.'","'.$kegiatanusaha.'","'.$email.'", "'.$date.'"");
    // }

    $proses = $conn->query($query);
    if ($proses){
        $_SESSION['pesan'] = 'Tambah';
        echo "<script> document.location.href='./kerjasama';</script>";
    }
    }

?>