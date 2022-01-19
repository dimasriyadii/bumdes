<?php
$halaman = 'Data Pemohon';
include 'global_header.php';
include '../koneksi.php';
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
        $_SESSION['pesan'] = '';
        ?>
        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Halaman <?= $halaman ?></h3>
                            <div class="table-responsive">
                                <br>
                                <table class="example1 table table-responsive table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>No Kartu Keluarga</th>
                                            <th>No HP</th>
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
                                        $query = $koneksi->query("SELECT * FROM peminjam");
                                        $nomor = 1;
                                        foreach ($query as $data) : ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['nik'] ?></td>
                                                <td><?= $data['nokk']; ?></td>
                                                <td><?= $data['nohp']; ?></td>
                                                <td><a href="../img/fotousaha/<?= $data['fotousaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                                <td><a href="../img/fotoketeranganusaha/<?= $data['fotoketusaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                                <td><?= $data['alamat']; ?></td>
                                                <td><?= $data['email']; ?></td>
                                                <td><?= $data['tanggal']; ?></td>
                                                <td style="min-width: 150px;"> <button onclick="hapus(<?= $data['id_peminjam']; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                        <?php $nomor++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script>
            function hapus(idd) {
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "hapus-data-pemohon?id="+idd,
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
        </script>



    </div>
</div>

<?php include 'global_footer.php'; ?>