 <?php

	$koneksi = new mysqli("sql107.epizy.com", "root", "", "inventori");



	header("Content-type: application/pdf");
	header("Content-Disposition: inline; filename=Laporan_Preventif(" . date('d-m-Y') . ").pdf");

	?>

 <h2>Laporan Data Supplier</h2>

 <table border="1">
 	<tr>
 		<th>No</th>
 		<th>Kode Mesin</th>
 		<th>Nama Mesin</th>
 		<th>Merk Mesin</th>
 		<th>Telepon</th>

 	</tr>

 	<?php
		$no = 1;
		$sql = $koneksi->query("select * from tb_mesin");
		while ($data = $sql->fetch_assoc()) {





		?>

 		<tr>
 			<td><?php echo $no++; ?></td>
 			<td><?php echo $data['kode_mesin'] ?></td>
 			<td><?php echo $data['nama_mesin'] ?></td>
 			<td><?php echo $data['merk_mesin'] ?></td>
 			<td><?php echo $data['tahun'] ?></td>

 		</tr>




 	<?php

		}

		?>

 </table>