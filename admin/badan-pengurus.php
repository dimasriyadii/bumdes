<?php
$halaman = 'Badan Pengurus';
include 'global_header.php';
?>

<div class="content">
    <div class="container-xl">
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
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {

                    $pesan = $_SESSION['pesan'];

                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                //mengatur session pesan menjadi kosong

                $_SESSION['pesan'] = '';
                // unset($_SESSION['pesan']);
                // $cetak_pesan = '';
                ?>


        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h3 class="card-title">Halaman Edit <?= $halaman ?></h3>

                            <?php
                            $query = $koneksi->query("SELECT * FROM profil WHERE id_profil = '3'");
                            foreach ($query as $data):
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">

                                <textarea class="ckeditor" id="ckeditor2" name="badanpengurus" rows="10"
                                    placeholder="Content.."><?= $data['isiprofil'] ?></textarea>

                                <br>
                                <input class="btn btn-primary" name="tambah" type="submit" value="Update">
                                <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                    onclick="self.history.back()">
                            </form>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                    <div class="card-body">
                        <h3 class="card-title">Upload SK <?= $halaman ?></h3>
                        <input type="file" class="form-control" name="foto" id="foto" accept="doc/pdf"><br><button
                            class="btn btn-primary btn-sm" name="upload" type="submit">Upload</button>
                            </div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
</div>

<?php
if (isset($_POST['tambah'])){
    $badanpengurus = $_POST['badanpengurus'];

$update = $koneksi->query("UPDATE profil SET isiprofil = '".$badanpengurus."' WHERE id_profil = '3'  ");
$_SESSION['pesan'] = 'Ubah';
echo "<script> document.location.href='./badan-pengurus';</script>";

}
?>
<?php
include 'global_footer.php'
?>