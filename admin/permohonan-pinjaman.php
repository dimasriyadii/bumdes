<?php
$halaman = 'Permohonan Pinjaman';
include 'global_header.php';
?>

<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="assets/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> -->

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
                            <h3 class="card-title">Halaman Edit <?= $halaman ?></h3>
                            <div class="table-responsive">
                                <table id="example1" class="table table-responsive table-striped" style="width:100%">
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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $query = $koneksi->query("SELECT * FROM permohonan_pinjaman");
                                    $nomor = 1;
                                    while ($row = mysqli_fetch_assoc($query)) 
                                    // foreach ($query as $row): 
                                    { ?>

                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['nik'] ?></td>
                                            <td><?= $row['nokk']; ?></td>
                                            <td><?= $row['nohp']; ?></td>
                                            <td><?= $row['jmlpengajuan']; ?></td>
                                            <td><a href="../img/fotousaha/<?= $row['fotousaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                            <td><a href="../img/fotoketeranganusaha/<?= $row['fotoketusaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                            <td><?= $row['alamat']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['tanggal'];?></td>
                                            <td><?= $row['statuss'];?></td>
                                            
                                            <td>
                                            <a class="icon" href="hapuspermohonanpinjaman?id=<?= $row['id_perpinjaman']; ?>"
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



                                            <!-- <a class="icon" data-toggle="modal" data-target="#myModal"?>
                                                
                                        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                            </svg> -->
                                            
	                                        <!-- <button type="icon" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buka Modal</button> -->
                                                                                        
                                            <!-- tombol menampilkan modal edit -->
                                            <a class="icon" href="#" data-toggle="modal" data-target="#myModal <?php echo $row['id_perpinjaman']; ?>"?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">                                                    
                                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                            </svg></a>
                                            </td>


                                                        <!-- Modal -->
                                                        <div id="myModal <?php echo $row['id_perpinjaman'];?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                        <!-- konten modal-->
                                                        <div class="modal-content">
                                                        
                                                        <!-- heading modal -->
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- body modal -->
                                                        <div class="modal-body">
                                                        <form action="../permohonanedit.php?act=updateuser" method="post" role="form">

                                                        <?php
                                                        $id_perpinjaman = $row['id_perpinjaman']; 
                                                        $query_edit = "SELECT * FROM permohonan_pinjaman WHERE id_perpinjaman='$id_perpinjaman'";
                                                        $result = mysqli_query($koneksi, $query_edit);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>

                                                        <input type="hidden" name="id_perpinjaman" value="<?php echo $row['id_perpinjaman']; ?>">

                                                        <!-- <div class="form-group">
                                                        <label>Status</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-user"></i>
                                                                </div>
                                                                <select name="alamat" class="form-control">
                                                                <option value='Disetujui'>Disetujui</option>
                                                                <option value='Tidak Disetujui'>Tidak Disetujui</option>
                                                                </select>
                                                            </div>
                                                         </div>
                                                        </div> -->

                                                        <!-- <form> -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                            <label for="exampleFormControlInput1">Status</label>
                                                            <input type="text" class="form-control" value="<?php echo $row['statuss']; ?>">
                                                        </div>
                                                        </form>
                                                        </div>
                                                        <!-- footer modal -->
                                                        <div class="modal-footer">
                                                        <button type="submit" name="submit"class="btn btn-success" value="Update"></button>
                                                        <!-- <input type="submit" name="submit" class="btn btn-primary" value="Update"> -->
                                                        </div>
                                                        <?php 
                                                        }
                                                        //mysql_close($host);
                                                        ?> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                                        </script>
                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
                                        </script> -->
                                        <script>
                                            $(document).ready(function() {
                                            $('.datatab').DataTable();
                                        </script>
                                        </tr>
                                        <?php               
                                        } 
                                        ?>
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