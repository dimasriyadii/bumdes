<?php
$halaman = 'Bendahara';
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
            $query = $koneksi->query("SELECT * FROM laporan WHERE id_laporan = '6'");
            foreach ($query as $data):
            
            echo $data['isilaporan'];
            endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
include 'global_footer.php';
?>