<?php
$kode_mesin = $_GET['kode_mesin'];
$sql2 = $koneksi->query("select * from tb_mesin where kode_mesin = '$kode_mesin'");
$tampil = $sql2->fetch_assoc();
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ubah Data Mesin</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Kode Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="kode_mesin" value="<?php echo $tampil['kode_mesin']; ?>" class="form-control" readonly />

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

						<label for="">Tempat Penyimpanan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="penyimpanan" value="<?php echo $tampil['penyimpanan']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Ukuran</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="ukuran" value="<?php echo $tampil['ukuran']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Tahun</label>
						<div class="form-group">
							<div class="form-line">
								<input type="number" name="tahun" value="<?php echo $tampil['tahun']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Jumlah</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="jumlah" value="<?php echo $tampil['jumlah']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Fungsi</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="fungsi" value="<?php echo $tampil['fungsi']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Harga</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="harga" value="<?php echo $tampil['harga']; ?>" class="form-control" />
							</div>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {

						$kode_mesin = $_POST['kode_mesin'];
						$nama_mesin = $_POST['nama_mesin'];
						$merk_mesin = $_POST['merk_mesin'];
						$penyimpanan = $_POST['penyimpanan'];
						$ukuran = $_POST['ukuran'];
						$tahun = $_POST['tahun'];
						$jumlah = $_POST['jumlah'];
						$fungsi = $_POST['fungsi'];
						$harga = $_POST['harga'];

						$sql = $koneksi->query("update tb_mesin set kode_mesin='$kode_mesin', nama_mesin='$nama_mesin', merk_mesin='$merk_mesin', penyimpanan='$penyimpanan', ukuran='$ukuran', tahun='$tahun', jumlah='$jumlah', harga='$harga' where kode_mesin='$kode_mesin'");

						if ($sql) {
					?>

							<script type="text/javascript">
								alert("Data Berhasil Diubah");
								window.location.href = "?page=mesin";
							</script>

					<?php
						}
					}



					?>