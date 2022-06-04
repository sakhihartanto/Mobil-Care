 <?php

	$kode_mesin = $_GET['id'];
	$sql = $koneksi->query("delete from tb_mesin where kode_mesin = '$kode_mesin'");

	if ($sql) {

	?>


 	<script type="text/javascript">
 		alert("Data Berhasil Dihapus");
 		window.location.href = "?page=mesin";
 	</script>

 <?php

	}

	?>