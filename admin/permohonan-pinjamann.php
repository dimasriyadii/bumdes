<?php
$halaman = 'Permohonan Pinjaman';
include 'global_header.php';
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="assets/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
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
                $_SESSION['pesan'] = '';
                ?>
        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Halaman Edit <?= $halaman ?></h3>
                            <div class="table-responsive">
                                <table id="example1" class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>No Kartu Keluarga</th>
                                            <th>No HP</th>
                                            <th>Jumlah Ajuan</th>
                                            <th>Foto Usaha</th>
                                            <th>Surat Keterangan Usaha</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $koneksi->query("SELECT * FROM permohonan_pinjaman");
                                        $nomor = 1;
                                        foreach ($query as $data): ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['nik'] ?></td>
                                            <td><?= $data['nokk']; ?></td>
                                            <td><?= $data['nohp']; ?></td>
                                            <td><?= $data['jmlpengajuan']; ?></td>
                                            <td><a href="../img/fotousaha/<?= $data['fotousaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                            <td><a href="../img/fotoketeranganusaha/<?= $data['fotoketusaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                            <td><?= $data['alamat']; ?></td>
                                            <td><?= $data['email']; ?></td>
                                            <td><?= $data['tanggal'];?></td>
                                            <td>
                                            <a class="icon" href="hapuspermohonanpinjaman?id=<?= $data['id_perpinjaman']; ?>"
                                                    onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><svg
                                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <line x1="4" y1="7" x2="20" y2="7" />
                                                        <line x1="10" y1="11" x2="10" y2="17" />
                                                        <line x1="14" y1="11" x2="14" y2="17" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></a>

                                            <!-- Tombol untuk menampilkan modal-->
	                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buka Modal</button>
                                            </td>


                                            <!-- Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- konten modal-->
                                                    <div class="modal-content">
                                                        <!-- heading modal -->
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Bagian heading modal</h4>
                                                        </div>
                                                        <!-- body modal -->
                                                        <div class="modal-body">
                                                            <p>bagian body modal.</p>
                                                        </div>
                                                        <!-- footer modal -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </tr>
                                        <?php $nomor++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php include 'global_footer.php'; ?>