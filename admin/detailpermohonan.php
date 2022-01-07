<thead>

			<form method="get">
					<label>PILIH TANGGAL   </label>
					<input type="date" name="tanggalawal">
					<input type="date" name="tanggalakhir">
					<a href="#"><button class="btn btn-warning" type="submit" data-toggle="modal"><i"></i> Filter</button></a>
			</form>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Uang</th>
						<th>Beras</th>
						
					</tr>

				</thead>
				<tbody>
				<?php
					$no=0; //variable no
					if(isset($_GET['tanggalawal']) AND isset($_GET['tanggalakhir'])){
						$tglawal = $_GET['tanggalawal'];
						$tglakhir = $_GET['tanggalakhir'];
						$queryzakat = mysqli_query($connect,"SELECT id_zakatf, tanggal, nama, alamat, uang, beras FROM zakat WHERE tanggal BETWEEN '$tgl_awal' AND '$tglakhir'");
					}else{
						$queryzakat = mysqli_query($connect,"SELECT id_zakatf, tanggal, nama, alamat, uang, beras FROM zakat ");
					}
					while ($zakat = mysqli_fetch_array ($queryzakat)){
						$no++;

						$beras[] =$zakat['beras'];
						$uang[] =$zakat['uang'];

						$angka = $zakat['uang'];
						$angka_format = number_format($angka,2,",",".");
						echo "
						<tr>
							<td>$no</td>
							<td>$zakat[tanggal]</td>
							<td>Rp. $angka_format</td>
							<td>$zakat[beras]</td>
						</tr>";
					}
					$total_beras = array_sum($beras);
					$total_uang = array_sum($uang);
					$format = number_format($total_uang,2,",",".");
					echo "
					<tr>
						<td colspan='2'>Jumlah</td>
						<td>Rp. $format</td>
						<td>$total_beras Kg</td>
					</tr>";
				?>
				</tbody>
