<?php
$halaman = 'Permohonan Pinjaman';
include 'global_header.php';

?>

<div class="content">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Halaman <?= $halaman ?>
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="blmsetuju-tab" data-toggle="tab" href="#blmsetuju" role="tab" aria-controls="blmsetuju" aria-selected="true">BELUM DISETUJUI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sdhsetuju-tab" data-toggle="tab" href="#sdhsetuju" role="tab" aria-controls="sdhsetuju" aria-selected="false">SUDAH DISETUJI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tdksetuju-tab" data-toggle="tab" href="#tdksetuju" role="tab" aria-controls="tdksetuju" aria-selected="false">TIDAK DISETUJI</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="blmsetuju" role="tabpanel" aria-labelledby="blmsetuju-tab">
                                    <div class="table-responsive">
                                        <?php
                                        $peminjaman_ke = 0;
                                        $query2 = "SELECT a.*, b.nik, b.nokk, b.nama FROM permohonan_pinjaman a LEFT JOIN peminjam b ON a.id_peminjam = b.id_peminjam WHERE a.status = 'Belum Disetujui' ORDER BY id_permohonan DESC;";
                                        $data2 = mysqli_query($koneksi, $query2);
                                        if ($data2->num_rows > 0) {?>
                                        <br><table class="example1 table table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th >NIK,<br>Nama Pemohon</th>
                                                            <th >Pengajuan Ke,<br>Tanggal Pengajuan</th>
                                                            <th >Jumlah Pinjaman,<br>Durasi Pelunasan</th>
                                                            <th >Status Pengajuan,<br>Tanggal Persetujuan</th>
                                                            <th >Sisa Pelunasan,<br>Jatuh Tempo Mendatang</th>
                                                            <th >Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($d2 = mysqli_fetch_array($data2)) { ?>
                                                        <tr>
                                                            <td><?= $d2['nik']; ?>,<br><?= $d2['nama']; ?></td>
                                                            <td>Ke-<?= $d2['peminjaman_ke']; ?>,<br><?= tgl_indo($d2['tanggal']); ?></td>
                                                            <td><?= rupiah($d2['jumlah_pinjam']); ?>,<br><?= $d2['durasi_angsuran']; ?> Bulan</td>
                                                            <td><?= $d2['status']; ?>,<br><?= tgl_indo($d2['tanggal_persetujuan']); ?></td>


                                                            <?php
                                                            $query3 = "SELECT bayar_ke FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan'] . " AND status = 'Sudah Bayar'  ORDER BY bayar_ke DESC";
                                                            $query4 = "SELECT tanggal_jatuh_tempo FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan'] . " AND status = 'Belum Bayar'  ORDER BY bayar_ke DESC";
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
                                                            <td><?= $hasil; ?>,<br><?= tgl_indo($tempo); ?></td>
                                                            <td><a href="detail-pinjaman-pelunasan?id=<?= $d2['id_permohonan']; ?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a><button onclick="konfirm(<?= $d2['id_permohonan']; ?>)" class="btn btn-sm btn-secondary mr-1"><i class="fa fa-cog"></i></button><button onclick="hapus(<?= $d2['id_permohonan']; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
                                <div class="tab-pane fade show" id="sdhsetuju" role="tabpanel" aria-labelledby="sdhsetuju-tab">
                                    <div class="table-responsive">
                                        <?php
                                        $peminjaman_ke = 0;
                                        $query2 = "SELECT a.*, b.nik, b.nokk, b.nama FROM permohonan_pinjaman a LEFT JOIN peminjam b ON a.id_peminjam = b.id_peminjam WHERE a.status = 'Sudah Disetujui' ORDER BY id_permohonan DESC;";
                                        $data2 = mysqli_query($koneksi, $query2);
                                        if ($data2->num_rows > 0) { ?>
                                                <br><table class="example1 table table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th >NIK,<br>Nama Pemohon</th>
                                                            <th >Pengajuan Ke,<br>Tanggal Pengajuan</th>
                                                            <th >Jumlah Pinjaman,<br>Durasi Pelunasan</th>
                                                            <th >Status Pengajuan,<br>Tanggal Persetujuan</th>
                                                            <th >Sisa Pelunasan,<br>Jatuh Tempo Mendatang</th>
                                                            <th >Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  while ($d2 = mysqli_fetch_array($data2)) { ?>
                                                        <tr>
                                                            <td><?= $d2['nik']; ?>,<br><?= $d2['nama']; ?></td>
                                                            <td>Ke-<?= $d2['peminjaman_ke']; ?>,<br><?= tgl_indo($d2['tanggal']); ?></td>
                                                            <td><?= rupiah($d2['jumlah_pinjam']); ?>,<br><?= $d2['durasi_angsuran']; ?> Bulan</td>
                                                            <td><?= $d2['status']; ?>,<br><?= tgl_indo($d2['tanggal_persetujuan']); ?></td>


                                                            <?php
                                                            $query3 = "SELECT bayar_ke FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan'] . " AND status = 'Sudah Bayar'  ORDER BY bayar_ke DESC";
                                                            $query4 = "SELECT tanggal_jatuh_tempo FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan'] . " AND status = 'Belum Bayar'  ORDER BY bayar_ke DESC";
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
                                                            <td><?= $hasil; ?>,<br><?= tgl_indo($tempo); ?></td>
                                                            <td><a href="detail-pinjaman-pelunasan?id=<?= $d2['id_permohonan']; ?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a><button onclick="konfirm(<?= $d2['id_permohonan']; ?>)" class="btn btn-sm btn-secondary mr-1"><i class="fa fa-cog"></i></button><button onclick="hapus(<?= $d2['id_permohonan']; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
                                <div class="tab-pane fade show" id="tdksetuju" role="tabpanel" aria-labelledby="tdksetuju-tab">
                                    <div class="table-responsive">
                                        <?php
                                        $peminjaman_ke = 0;
                                        $query2 = "SELECT a.*, b.nik, b.nokk, b.nama FROM permohonan_pinjaman a LEFT JOIN peminjam b ON a.id_peminjam = b.id_peminjam WHERE a.status = 'Tidak Disetujui' ORDER BY id_permohonan DESC;";
                                        $data2 = mysqli_query($koneksi, $query2);
                                        if ($data2->num_rows > 0) {?>
                                                <br><table class="example1 table table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th >NIK,<br>Nama Pemohon</th>
                                                            <th >Pengajuan Ke,<br>Tanggal Pengajuan</th>
                                                            <th >Jumlah Pinjaman,<br>Durasi Pelunasan</th>
                                                            <th >Status Pengajuan,<br>Tanggal Persetujuan</th>
                                                            <th >Sisa Pelunasan,<br>Jatuh Tempo Mendatang</th>
                                                            <th >Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($d2 = mysqli_fetch_array($data2)) { ?>
                                                        <tr>
                                                            <td><?= $d2['nik']; ?>,<br><?= $d2['nama']; ?></td>
                                                            <td>Ke-<?= $d2['peminjaman_ke']; ?>,<br><?= tgl_indo($d2['tanggal']); ?></td>
                                                            <td><?= rupiah($d2['jumlah_pinjam']); ?>,<br><?= $d2['durasi_angsuran']; ?> Bulan</td>
                                                            <td><?= $d2['status']; ?>,<br><?= tgl_indo($d2['tanggal_persetujuan']); ?></td>


                                                            <?php
                                                            $query3 = "SELECT bayar_ke FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan'] . " AND status = 'Sudah Bayar'  ORDER BY bayar_ke DESC";
                                                            $query4 = "SELECT tanggal_jatuh_tempo FROM pelunasan_pinjaman WHERE id_permohonan=" . $d2['id_permohonan'] . " AND status = 'Belum Bayar'  ORDER BY bayar_ke DESC";
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
                                                            <td><?= $hasil; ?>,<br><?= $tempo; ?></td>
                                                            <td><a href="detail-pinjaman-pelunasan?id=<?= $d2['id_permohonan']; ?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a><button onclick="konfirm(<?= $d2['id_permohonan']; ?>)" class="btn btn-sm btn-secondary mr-1"><i class="fa fa-cog"></i></button><button onclick="hapus(<?= $d2['id_permohonan']; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
            </div>
        </div>

        <script>
            function konfirm(idd) {
                Swal.fire({
                    title: 'Konfirmasi persetujuan!',
                    icon: 'warning',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Setujui',
                    denyButtonText: `Tidak Setujui`,
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "konfirm-permohonan-pinjaman?id=" + idd + "&konfir=1",
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
                    } else if (result.isDenied) {
                        $.ajax({
                            url: "konfirm-permohonan-pinjaman?id=" + idd + "&konfir=0",
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

            function hapus(idd) {
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya! Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "hapus-permohonan-pinjaman?id=" + idd,
                        }).done(function() {
                            Swal.fire({
                                title: 'Berhasil dihapus!',
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
        </script>

    </div>
</div>




<?php include 'global_footer.php'; ?>