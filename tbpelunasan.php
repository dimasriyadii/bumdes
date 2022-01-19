<div id="triggerpelunasan">
                                <?php
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
                                    include "koneksi.php";
                                    $id_permohonan = $_GET['id_permohonan'];
                                    $data3 = mysqli_query($koneksi,"SELECT * FROM pelunasan_pinjaman WHERE id_permohonan=". $id_permohonan ." ORDER BY bayar_ke DESC");
                                    if($data3 -> num_rows > 0){
                                ?>
                                <table style="width: 100%; font-size: small;" class="table table-bordered table-striped dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Pelunasan</th>
                                            <th>Tanggal Jatuh Tempo</th>
                                            <th>Tanggal Dibayarkan</th>
                                            <th>Status Pelunasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($d3 = mysqli_fetch_array($data3)){
                                        ?>
                                        <tr>
                                            <td>ke-<?= $d3['bayar_ke']; ?></td>
                                            <td><?= tgl_indo($d3['tanggal_jatuh_tempo']); ?></td>
                                            <td><?= tgl_indo($d3['tanggal_dibayarkan']); ?></td>
                                            <td><?= $d3['status']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                    } else { echo "<br>Tidak ada data."; }
                                ?>
</div>