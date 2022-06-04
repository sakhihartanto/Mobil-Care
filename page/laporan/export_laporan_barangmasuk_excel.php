<?php
if (isset($_POST['submit'])) { ?>

	<?php



	$koneksi = new mysqli("sql107.epizy.com", "root", "", "inventori");

	header('Content-type: application/pdf');
	header("Content-Disposition: attachment; filename=Laporan_Pemeliharaan_mesin (" . date('d-m-Y') . ").pdf");
	readfile("Laporan_Pemeliharaan_mesin (" . date('d-m-Y') . ").pdf");
	$bln = $_POST['bln'];
	$thn = $_POST['thn'];

	?>

	<body>
		<center>
			<h2>Laporan Barang Masuk Bulan <?php echo $bln; ?> Tahun <?php echo $thn; ?></h2>
		</center>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Id Transaksi</th>
				<th>Tanggal Masuk</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Pengirim</th>
				<th>Jumlah Masuk</th>
				<th>Satuan Barang</th>
			</tr>


			<?php

			$no = 1;
			$sql = $koneksi->query("select * from pemeliharaan where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
			while ($data = $sql->fetch_assoc()) {

			?>

				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['id_pemeliharaan'] ?></td>
					<td><?php echo $data['tanggal'] ?></td>
					<td><?php echo $data['kode_barang'] ?></td>
					<td><?php echo $data['nama_mesin'] ?></td>
					<td><?php echo $data['checklist'] ?></td>
					<td><?php echo $data['catatan'] ?></td>
					<td><?php echo $data['petugas'] ?></td>


				</tr>
			<?php } ?>
		</table>
	</body>

<?php
}
?>

<?php

$koneksi = new mysqli("sql107.epizy.com", "root", "", "inventori");


$bln = $_POST['bln'];
$thn = $_POST['thn'];
?>

<?php
if ($bln == 'all') {
?>
	<div class="table-responsive">

		<table class="display table table-bordered" id="pemeliharaan">

			<thead>
				<tr>
					<th>No</th>
					<th>Id Transaksi</th>
					<th>Tanggal Masuk</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Pengirim</th>
					<th>Jumlah Masuk</th>
					<th>Satuan Barang</th>


				</tr>
			</thead>
			<tbody>


				<?php
				$no = 1;
				$sql = $koneksi->query("select * from pemeliharaan where YEAR(tanggal) = '$thn'");
				while ($data = $sql->fetch_assoc()) {

				?>


					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['id_pemeliharaan'] ?></td>
						<td><?php echo $data['tanggal'] ?></td>
						<td><?php echo $data['kode_barang'] ?></td>
						<td><?php echo $data['nama_barang'] ?></td>

						<td><?php echo $data['nama_mesin'] ?></td>


						<td><?php echo $data['jumlah'] ?></td>
						<td><?php echo $data['satuan'] ?></td>


					</tr>
				<?php
				}
				?>

			</tbody>
		</table>
	</div>


<?php
} else { ?>
	<div class="table-responsive">

		<table class="display table table-bordered" id="transaksi">

			<thead>
				<tr>
					<th>No</th>
					<th>Id Transaksi</th>
					<th>Tanggal Masuk</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Pengirim</th>
					<th>Jumlah Masuk</th>
					<th>Satuan Barang</th>

				</tr>
			</thead>
			<tbody>


				<?php
				$no = 1;
				$sql = $koneksi->query("select * from pemeliharaan where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
				while ($data = $sql->fetch_assoc()) {

				?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['id_pemeliharaan'] ?></td>
						<td><?php echo $data['tanggal'] ?></td>
						<td><?php echo $data['kode_barang'] ?></td>
						<td><?php echo $data['nama_barang'] ?></td>
						<td><?php echo $data['nama_mesin'] ?></td>
						<td><?php echo $data['jumlah'] ?></td>
						<td><?php echo $data['satuan'] ?></td>



					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>

<?php

}

?>