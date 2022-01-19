<?php
$halaman = 'Status Pinjaman & Pelunasan';
include 'global_header.php';
include 'global_navigasi.php';

$nik = "";
$nokk = "";

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
}
if (isset($_GET['nokk'])) {
    $nokk = $_GET['nokk'];
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
function tgl_indo($tanggal)
{
    if($tanggal == '-' || $tanggal == '' || $tanggal == NULL){return $tanggal;};
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
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
                    <div class="card-body markdown">
                        <form action="" method="get" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">No Kartu Keluarga</label>
                                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)"
                                            maxlength="16" name="nokk" placeholder="Masukkan No Kartu Keluarga anda"
                                            required value="<?= $nik; ?>">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">NIK</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control"
                                            name="nik" maxlength="16" placeholder="Masukkan nomor nik" required
                                            value="<?= $nokk; ?>">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Cari Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>


        <div class="row justify-content-center mt-3">
            <div class="col-lg-12 col-xl-12">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="biodata-tab" data-toggle="tab" href="#biodata" role="tab"
                                    aria-controls="biodata" aria-selected="true">BIODATA PEMOHON</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="peminjaman-tab" data-toggle="tab" href="#peminjaman" role="tab"
                                    aria-controls="peminjaman" aria-selected="false">PEMINJAMAN & PELUNASAN</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="biodata" role="tabpanel"
                                aria-labelledby="biodata-tab">
                                <?php
                                    include 'koneksi.php';
                                    $id_peminjam = "";
                                    $data = mysqli_query($koneksi,"SELECT * FROM peminjam WHERE nik = '$nik' AND nokk = '$nokk'");
                                    if($data -> num_rows > 0){
                                    $d = mysqli_fetch_array($data);
                                    $id_peminjam = $d['id_peminjam'];
                                ?>
                                <table class="mt-3" style="width: 90%; ">
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
                                <?php } else { echo "<br>Tidak ada data."; } ?>
                            </div>
                            <div class="tab-pane fade" id="peminjaman" role="tabpanel" aria-labelledby="peminjaman-tab">
                                <?php if ($id_peminjam == '') {
                                    echo "<br>Tidak ada data.";
                                } else {
                                 ?>
                                <button class="btn btn-primary mt-3 mb-2" style="width:100%;" data-toggle="modal" data-target="#exampleModal">Tambah Pinjaman</button>
                                <?php
                                    $peminjaman_ke = 0;
                                    $query2 = "SELECT * FROM permohonan_pinjaman WHERE id_peminjam=". $id_peminjam;
                                    $data2 = mysqli_query($koneksi, $query2);
                                    if($data2 -> num_rows > 0){
                                ?>
                                <table style="width: 100%; font-size: small;" class="table table-bordered table-striped dataTable no-footer dtr-inline mt-2">
                                    <thead>
                                        <tr>
                                            <th>Pengajuan Ke,<br>Tanggal Pengajuan</th>
                                            <th>Jumlah Pinjaman,<br>Durasi Pelunasan</th>
                                            <th>Sisa Pelunasan,<br>Jatuh Tempo Mendatang</th>
                                            <th>Status Pengajuan,<br>Tanggal Persetujuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($d2 = mysqli_fetch_array($data2)){
                                        ?>
                                        <tr>
                                            <td>ke-<?= $peminjaman_ke = $d2['peminjaman_ke']; ?>,<br><?= Tgl_indo($d2['tanggal']); ?></td>
                                            <td><?= rupiah($d2['jumlah_pinjam']); ?>,<br><?= $d2['durasi_angsuran']; ?> Bulan</td>
                                            <?php
                                                $query3 = "SELECT bayar_ke FROM pelunasan_pinjaman WHERE id_permohonan=". $d2['id_permohonan']." AND status='Sudah Bayar' ORDER BY bayar_ke DESC LIMIT 1";
                                                $data3 = mysqli_query($koneksi, $query3);
                                                $hasil = "-";
                                                if($data3 -> num_rows > 0){
                                                $d3 = mysqli_fetch_array($data3);
                                                $kurangin =  ($d2['durasi_angsuran'] - $d3['bayar_ke']);
                                                $hasil = ($kurangin < 1) ? 'LUNAS' : $kurangin." Bulan";
                                                }
                                            ?>
                                            <?php
                                                $query33 = "SELECT tanggal_jatuh_tempo FROM pelunasan_pinjaman WHERE id_permohonan=". $d2['id_permohonan']." AND status='Belum Bayar' ORDER BY tanggal_jatuh_tempo DESC LIMIT 1";
                                                $data33 = mysqli_query($koneksi, $query33);
                                                $tempo = "-";
                                                if($data33 -> num_rows > 0){
                                                $d33 = mysqli_fetch_array($data33);
                                                $tempo = Tgl_indo($d33['tanggal_jatuh_tempo']);
                                                }
                                            ?>
                                            <td><?= $hasil; ?>,<br><?= $tempo; ?></td>
                                            <td><?= $d2['status']; ?>,<br><?= Tgl_indo($d2['tanggal_persetujuan']); ?></td>
                                            <?php $paramss = $peminjaman_ke.','.$d2['id_permohonan']; ?>
                                            <td><button class="btn btn-sm btn-primary" onclick="detailpinjam(<?= $paramss; ?>)" >detail</button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                    } else { echo "<br>Tidak ada data."; }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman</h5>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Peminjaman Ke:</label>
            <input type="text" hidden onkeypress="return hanyaAngka(event)" class="form-control" id="id_peminjam" value="<?= $id_peminjam; ?>" required>
            <input type="text" readonly onkeypress="return hanyaAngka(event)" class="form-control" id="peminjaman_ke" value="<?= $peminjaman_ke +1; ?>" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jumlah Pinjaman:</label>
            <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" id="jumlahpinjaman" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Durasi Pembayaran (Bulan):</label>
            <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" id="durasiangsuran" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Ajukan</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal2Label"></h5>   
      </div>
      <div class="modal-body">
      <div id="tbpelunasan"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closemod()">Tutup</button>
      </div>
    </div>
  </div>
</div>
                                <script>
                                    function detailpinjam(params1, params2) {
                                        $( "#triggerpelunasan" ).remove();
                                        $.ajax({
                                                type: "GET",
                                                url: "tbpelunasan.php",
                                                data: {id_permohonan : params2},
                                                }).done(function (data) {    
                                                    $('#exampleModal2').modal('show');	
                                                    $('#exampleModal2Label').text('Detail Pelunasan Peminjaman Ke-'+params1)	
                                                    $("#tbpelunasan" ).append(data);
                                        });
                                    }
                                    function closemod() {
                                        $('#exampleModal2').modal('hide');	
                                    }
                                </script>




    </div>
</div>



<script>
function submitContactForm(){
    // var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    
    
    var id_peminjam = $('#id_peminjam').val();
    var peminjaman_ke = $('#peminjaman_ke').val();
    var jumlahpinjaman = $('#jumlahpinjaman').val();
    var durasiangsuran = $('#durasiangsuran').val();
    
    
    if(jumlahpinjaman.trim() == '' ){
        alert('Masukan jumlah pinjaman');
        $('#jumlahpinjaman').focus();
        return false;
    }else if(durasiangsuran.trim() == '' ){
        alert('masukan durasi pembayaran');
        $('#durasiangsuran').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'pinjamlagi.php',
            data:'contactFrmSubmit=1&id_peminjam='+id_peminjam+'&peminjaman_ke='+peminjaman_ke+'&jumlahpinjaman='+jumlahpinjaman+'&durasiangsuran='+durasiangsuran,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#jumlahpinjaman').val('');
                    $('#durasiangsuran').val('');
                    alert('Berhasil input tambah pinjaman');
                    location.reload();
                }else{
                    alert('Gagal input tambah pinjaman');
                    location.reload();
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>

<?php
include 'global_footer.php';
?>