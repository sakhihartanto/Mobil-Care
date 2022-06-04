<?php

	$id_pemeliharaan = $_GET['id_pemeliharaan'];
	$sql = $koneksi->query("update pemeliharaan set done=true where id_pemeliharaan = '$id_pemeliharaan'");

	if ($sql) {

	?>


 	<script type="text/javascript">
 		alert("Data Sudah Berhasil Diselesaikan");
 		window.location.href = "?page=pemeliharaan";
 	</script>

 <?php

	}

	?> 