<?php
$halaman = 'Kegiatan';
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

        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <?php
                        $query = $koneksi->query("SELECT * FROM kegiatan WHERE id_kegiatan = '$_GET[id]'");
                        foreach ($query as $data): ?>
                        <div class="markdown">
                            <div class="d-flex mb-10">
                                <h1><?= $data['judul']; ?></h1>
                            </div>
                            Tanggal Kegiatan ini <span><?= $data['tanggal']; ?></span>
                            <br>
                            <img src="./admin/img/kegiatan/<?= $data['gambar']; ?>" width="50%" height="50%"
                                style="display: block; margin: auto;" alt="">
                            <br>
                            <?= $data['isi']; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'global_footer.php'; ?>