 <?php

	$id_pemeliharaan = $_GET['id_pemeliharaan'];
	$sql = $koneksi->query("delete from pemeliharaan where id_pemeliharaan = '$id_pemeliharaan'");

	if ($sql) {

	?>


 	<script type="text/javascript">
 		alert("Data Berhasil Dihapus");
 		window.location.href = "?page=pemeliharaan";
 	</script>

 <?php

	}

	?>