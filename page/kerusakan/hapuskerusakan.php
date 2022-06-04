 <?php

	$id_kerusakan = $_GET['id_kerusakan'];
	$sql = $koneksi->query("delete from kerusakan where id_kerusakan = '$id_kerusakan'");

	if ($sql) {
		
	?>
 	<script type="text/javascript">
 		alert("Data Berhasil Dihapus");
 		window.location.href = "?page=barangkeluar";
 	</script>

 <?php

	}

	?>