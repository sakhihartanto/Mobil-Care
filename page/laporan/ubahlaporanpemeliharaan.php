<?php
$kode_mesin = $_GET['kode_mesin'];
$sql2 = $koneksi->query("select * from tb_mesin where kode_mesin = '$kode_mesin'");
$tampil = $sql2->fetch_assoc();
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ubah Pemeliharaan</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

                    <label for="">Tanggal Pemeliharaan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="date" name="tgl_pelihara" value="<?php echo $tampil['tgl_pelihara']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Kode Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="kode_mesin" value="<?php echo $tampil['kode_mesin']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Nama Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="nama_mesin" value="<?php echo $tampil['nama_mesin']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Merk Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="merk_mesin" value="<?php echo $tampil['merk_mesin']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Tahun</label>
						<div class="form-group">
							<div class="form-line">
								<input type="number" name="tahun" value="<?php echo $tampil['tahun']; ?>" class="form-control" />

							</div>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {
                        $tgl_pelihara = $_POST['tgl_pelihara'];
						$kode_mesin = $_POST['kode_mesin'];
						$nama_mesin = $_POST['nama_mesin'];
						$merk_mesin = $_POST['merk_mesin'];
						$tahun = $_POST['tahun'];


						$sql = $koneksi->query("update tb_mesin set kode_mesin='$kode_mesin', nama_mesin='$nama_mesin', merk_mesin='$merk_mesin', tahun='$tahun' where kode_mesin='$kode_mesin'");

						if ($sql) {
					?>

							<script type="text/javascript">
								alert("Data Berhasil Diubah");
								window.location.href = "?page=laporan_supplier";
							</script>

					<?php
						}
					}



					?>