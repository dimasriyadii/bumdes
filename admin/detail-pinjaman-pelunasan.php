<?php
$halaman = 'Status Pinjaman & Pelunasan';
include 'global_header.php';
$id = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_GET['read'])){
    mysqli_query($koneksi, "UPDATE pelunasan_pinjaman SET notif = 'Sudah Baca' WHERE id_pelunasan = ".$_GET['read']);
}

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
            <div class="col-lg-12 col-xl-12">
                <div class="card card-lg">
                    <div class="card-body">
                        <h3>Biodata Pemohon</h3>
                        <?php
                        $id_peminjam = "";
                        $datap = mysqli_query($koneksi, "SELECT * FROM permohonan_pinjaman  WHERE id_permohonan=" . $id);
                        if ($datap->num_rows > 0) {
                            $dp = mysqli_fetch_array($datap);
                            $data = mysqli_query($koneksi, "SELECT * FROM peminjam WHERE id_peminjam=" . $dp['id_peminjam']);
                            if ($data->num_rows > 0) {
                                $d = mysqli_fetch_array($data);
                                $id_peminjam = $d['id_peminjam'];
                        ?>
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td>
                                                <?= $d['nama']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No Kartu Keluarga</td>
                                            <td>:</td>
                                            <td> <?= $d['nokk']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td>:</td>
                                            <td> <?= $d['nik']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td> <?= $d['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No HP</td>
                                            <td>:</td>
                                            <td> <?= $d['nohp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Lengkap</td>
                                            <td>:</td>
                                            <td> <?= $d['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Foto Usaha</td>
                                            <td>:</td>
                                            <td> <a href="img/fotousaha/<?= $d['fotousaha']; ?>" target="_blank">Lihat</a></td>
                                        </tr>
                                        <tr>
                                            <td>Surat Keterangan Usaha</td>
                                            <td>:</td>
                                            <td> <a href="img/fotoketeranganusaha/<?= $d['fotoketusaha']; ?>" target="_blank">Lihat</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                        <?php } else {
                                echo "<br>Tidak ada data.";
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-lg-12 col-xl-12">
                <div class="card card-lg">
                    <div class="card-body">
                        <h3>Detail Pinjaman</h3>
                        <div class="table-responsive">
                            <?php
                            $peminjaman_ke = 0;
                            $query2 = "SELECT * FROM permohonan_pinjaman  WHERE id_permohonan=" . $id;
                            $data2 = mysqli_query($koneksi, $query2);
                            if ($data2->num_rows > 0) {
                                $d2 = mysqli_fetch_array($data2);
                            ?>
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>Pengajuan Ke</td>
                                            <td>:</td>
                                            <td>
                                                Ke-<?= $d2['peminjaman_ke']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pengajuan</td>
                                            <td>:</td>
                                            <td><?= tgl_indo($d2['tanggal']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pinjaman</td>
                                            <td>:</td>
                                            <td><?= rupiah($d2['jumlah_pinjam']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Durasi Pelunasan</td>
                                            <td>:</td>
                                            <td><?= $d2['durasi_angsuran']; ?> Bulan</td>
                                        </tr>
                                        <tr>
                                            <td>Status Pengajuan</td>
                                            <td>:</td>
                                            <td><?= $d2['status']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Persetujuan</td>
                                            <td>:</td>
                                            <td><?= tgl_indo($d2['tanggal_persetujuan']); ?></td>
                                        </tr>

                                        <?php
                                        $query3 = "SELECT bayar_ke FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan']." AND status = 'Sudah Bayar'  ORDER BY bayar_ke DESC";
                                        $query4 = "SELECT tanggal_jatuh_tempo FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan']." AND status = 'Belum Bayar'  ORDER BY bayar_ke DESC";
                                        $data3 = mysqli_query($koneksi, $query3);
                                        $data4 = mysqli_query($koneksi, $query4);
                                        $hasil = "-";
                                        $tempo = "-";
                                        if ($data3->num_rows > 0) {
                                            $d3 = mysqli_fetch_array($data3);
                                            $kurangin =  ($d2['durasi_angsuran'] - $d3['bayar_ke']);
                                            $hasil = ($kurangin < 1) ? 'LUNAS' : $kurangin . " Bulan";
                                        }                                   
                                        if ($data4->num_rows > 0) {
                                            $d4 = mysqli_fetch_array($data4);
                                            $tempo = $d4['tanggal_jatuh_tempo'];
                                        }
                                        ?>
                                        <tr>
                                            <td>Sisa Pelunasan</td>
                                            <td>:</td>
                                            <td><?= $hasil; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jatuh Tempo Mendatang</td>
                                            <td>:</td>
                                            <td><?= tgl_indo($tempo); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "<br>Tidak ada data.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-lg-12 col-xl-12">
                <div class="card card-lg">
                    <div class="card-body">
                        <h3>Detail Pelunasan</h3>
                        <?php
                        $data3 = mysqli_query($koneksi, "SELECT * FROM pelunasan_pinjaman WHERE id_permohonan=" . $id . " ORDER BY bayar_ke DESC");
                        if ($data3->num_rows > 0) {
                        ?>
                            <table style="width: 100%; font-size: small;" class="table table-bordered table-striped dataTable no-footer">
                                <thead>
                                    <tr>
                                        <td>Pelunasan</td>
                                        <td>Tanggal Jatuh Tempo</td>
                                        <td>Tanggal Dibayarkan</td>
                                        <td>Status Pelunasan</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($d3 = mysqli_fetch_array($data3)) {
                                    ?>
                                        <tr>
                                            <td>ke-<?= $d3['bayar_ke']; ?></td>
                                            <td><?= tgl_indo($d3['tanggal_jatuh_tempo']); ?></td>
                                            <td><?= tgl_indo($d3['tanggal_dibayarkan']); ?></td>
                                            <td><?= $d3['status']; ?></td>

                                            <?php if ($d3['status'] == 'Belum Bayar') : ?>
                                                <td>
                                                    <?php $text = "Hallo%20Kak..%20" . $d['nama'] . "%0A%0A%0APelunasan%20Ke-%20" . $d3['bayar_ke'] . "%0ATanggal%20Jatuh%20Tempo%20%3A%20" . $d3['tanggal_jatuh_tempo'] . "%0A%0ABelum%20Bayar"; ?>
                                                    <a href="https://wa.me/<?= $d['nohp']; ?>?text=<?= $text; ?>" target="_blank" class="btn btn-sm btn-success mr-1"><i class="fab fa-whatsapp"></i></a>
                                                    <a href="mailto:<?= $d['email']; ?>?body=<?= $text; ?>" target="_blank" class="btn btn-sm btn-warning mr-1"><i class="fa fa-envelope"></i></a>
                                                    <button onclick="konfirm1(<?= $d3['id_pelunasan']; ?>)" class="btn btn-sm btn-primary mr-1"><i class="fa fa-check"></i></button>
                                                </td>
                                            <?php else : ?>
                                                <td>
                                                    <?php $text = "Hallo%20Kak..%20" . $d['nama'] . "%0A%0A%0APelunasan%20Ke-%20" . $d3['bayar_ke'] . "%0ATanggal%20Jatuh%20Tempo%20%3A%20" . $d3['tanggal_jatuh_tempo'] ."%0ATanggal%20Dibayarkan%20%3A%20" . $d3['tanggal_dibayarkan'] . "%0A%0ASudah%20Bayar"; ?>
                                                    <a href="https://wa.me/<?= $d['nohp']; ?>?text=<?= $text; ?>" target="_blank" class="btn btn-sm btn-success mr-1"><i class="fab fa-whatsapp"></i></a>
                                                    <a href="mailto:<?= $d['email']; ?>?body=<?= $text; ?>" target="_blank" class="btn btn-sm btn-warning mr-1"><i class="fa fa-envelope"></i></a>
                                                    <button onclick="konfirm0(<?= $d3['id_pelunasan']; ?>)" class="btn btn-sm btn-danger mr-1"><i class="fa fa-times"></i></button>
                                                </td>
                                            <?php endif; ?>





                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                            echo "<br>Tidak ada data.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function konfirm1(idd) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Sudah Bayar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "konfirm-pelunasan-pinjaman?id=" + idd + "&konfir=1",
                }).done(function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                });
            }
        })
    }

    function konfirm0(idd) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Belum Bayar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "konfirm-pelunasan-pinjaman?id=" + idd + "&konfir=1",
                }).done(function() {
                    $.ajax({
                        url: "konfirm-pelunasan-pinjaman?id=" + idd + "&konfir=0",
                    }).done(function() {
                        Swal.fire({
                            title: 'Berhasil!',
                            icon: 'success',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    });
                });
            }
        })
    }
</script>




</div>
</div>

<?php
include 'global_footer.php';
?>