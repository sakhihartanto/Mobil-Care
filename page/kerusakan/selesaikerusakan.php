<?php

	$id_pemeliharaan = $_GET['id_kerusakan'];
	$sql = $koneksi->query("update kerusakan set done=true where id_kerusakan = '$id_kerusakan'");

	if ($sql) {

	?>


 	<script type="text/javascript">
 		alert("Data Kerusakan Sudah Berhasil Diselesaikan");
 		window.location.href = "?page=kerusakan";
 	</script>

 <?php

	}

	?> 