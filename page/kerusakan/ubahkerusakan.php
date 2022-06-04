<?php
$id_kerusakan = $_GET['id_kerusakan'];
$sql2 = $koneksi->query("select * from kerusakan where id_kerusakan = '$id_kerusakan'");
$tampil = $sql2->fetch_assoc();
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ubah Kerusakan Mesin</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Id Kerusakan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="id_kerusakan" value="<?php echo $tampil['id_kerusakan']; ?>" class="form-control" readonly />
							</div>
						</div>

						<label for="">Tanggal</label>
						<div class="form-group">
							<div class="form-line">
								<input type="date" name="tanggal" class="form-control" value="<?php echo $tampil['tanggal']; ?>" />
							</div>
						</div>


						<label for="">Kode Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="kode_barang" value="<?php echo $tampil['kode_barang']; ?>" class="form-control" readonly />
							</div>
						</div>

						<label for="">Nama Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="nama_mesin" value="<?php echo $tampil['nama_mesin']; ?>" class="form-control" readonly />
							</div>
						</div>

						<label for="">Jenis Kerusakan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="jenis" value="<?php echo $tampil['jenis']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Tindakan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="tindakan" value="<?php echo $tampil['tindakan']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Catatan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="catatan" value="<?php echo $tampil['catatan']; ?>" class="form-control" />
							</div>
						</div>

						<label for="">Biaya</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="biaya" value="<?php echo $tampil['biaya']; ?>" class="form-control" placeholder="Rp" />
							</div>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>

					<?php

					if (isset($_POST['simpan'])) {

						$id_kerusakan = $_POST['id_kerusakan'];
						$tanggal = $_POST['tanggal'];
						$kode_barang = $pecah_barang[0];
						#$nama_barang = $pecah_barang[1];
						$nama_mesin = $_POST['nama_mesin'];
						$catatan = $_POST['catatan'];
						$tindakan = $_POST['tindakan'];
						$jenis = $_POST['jenis'];
						$pengirim = $_POST['pengirim'];
						$biaya = $_POST['biaya'];

						#$sql = $koneksi->query("UPDATE `pemeliharaan` SET `id`='$id',`id_pemeliharaan`='$id_pemeliharaan',`tanggal`='$tanggal',`kode_barang`='$kode_barang',`nama_barang`='$nama_barang',`checklist`='$allchecklist',`catatan`='$catatan',`jenis`='$jenis',`pengirim`='$pengirim' WHERE id_pemeliharaan='$id_pemeliharaan");
						$sql = $koneksi->query("update kerusakan set tanggal='$tanggal', jenis='$jenis', tindakan='$tindakan', catatan='$catatan', biaya='$biaya' where id_kerusakan = '$id_kerusakan'");
						#print_r($id_pemeliharaan);
		
						if ($sql) {
					?>
							<script type="text/javascript">
								alert("Simpan Data Berhasil");
								window.location.href = "?page=kerusakan";
							</script>
					<?php
						}
					}

					?>