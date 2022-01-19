<?php
$halaman = 'Pelunasan Pinjaman';
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
        include '../koneksi.php';
        ?>

        <?php
        //menampilkan pesan jika ada pesan
        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
        $pesan = $_SESSION['pesan'];
        echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
        }
        $_SESSION['pesan'] = '';
        ?>

        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Halaman <?= $halaman ?></h3>
                            <div class="table-responsive">

                            <?php
                                    $peminjaman_ke = 0;
                                    $query2 = "SELECT a.*, b.peminjaman_ke, c.nik, c.nokk, c.nama FROM pelunasan_pinjaman a LEFT JOIN permohonan_pinjaman b ON b.id_permohonan = a.id_permohonan LEFT JOIN peminjam c ON c.id_peminjam = b.id_peminjam;";
                                    $data2 = mysqli_query($koneksi, $query2);
                                    if($data2 -> num_rows > 0){
                                ?>
                                <table id="example1" class="table table-responsive table-striped">

                                    <thead>
                                        <tr>
                                            <td>Peminjaman</td>
                                            <td>Pembayaran</td>
                                            <td>Tanggal Jatuh Tempo</td>
                                            <td>Tanggal Dibayarkan</td>
                                            <td>Status Pelunasan</td>
                                            <td>No KK</td>
                                            <td>NIK</td>
                                            <td>Nama Pemohon</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($d2 = mysqli_fetch_array($data2)){
                                        ?>
                                        <tr>
                                            <td>ke-<?= $peminjaman_ke = $d2['peminjaman_ke']; ?></td>
                                            <td>ke-<?= $d2['bayar_ke']; ?></td>
                                            <td><?= $d2['tanggal_jatuh_tempo']; ?></td>
                                            <td><?= $d2['tanggal_dibayarkan']; ?></td>
                                            <td><?= $d2['status']; ?></td>
                                            <td><?= $d2['nokk']; ?></td>
                                        <td><?= $d2['nik']; ?></td>
                                        <td><?= $d2['nama']; ?></td>
                                            <td></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                    } else { echo "<br>Tidak ada data."; }
                                ?>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php include 'global_footer.php'; ?>