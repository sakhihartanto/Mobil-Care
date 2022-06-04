<?php
$id = $_GET['id'];
$sql2 = $koneksi->query("select * from users where id = '$id'");
$tampil = $sql2->fetch_assoc();

$jabatan = $tampil['jabatan'];


?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ubah User</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Nama</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="nama" value="<?php echo $tampil['nama']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Telepon</label>
						<div class="form-group">
							<div class="form-line">
								<input type="number" name="telepon" value="<?php echo $tampil['telepon']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Username</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="username" value="<?php echo $tampil['username']; ?>" class="form-control" />

							</div>
						</div>

						<label for="">Password</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="password" value="<?php echo $tampil['password']; ?>" class="form-control" />

							</div>
						</div>


						<label for="">Jabatan</label>
						<div class="form-group">
							<div class="form-line">
								<select name="jabatan" class="form-control show-tick">
									<option value="">-- Pilih Jabatan --</option>
									<option value="pimpinan">Pimpinan Divisi</option>
									<option value="admin">Staf Umum</option>
									<option value="mekanik">Mekanik</option>

								</select>
							</div>
						</div>


						<label for="">Foto</label>
						<div class="form-group">
							<div class="form-line">
								<img src="img/<?php echo $tampil['foto']; ?> " width="50" height="50" alt="">

							</div>
						</div>


						<label for="">Ganti Foto</label>
						<div class="form-group">
							<div class="form-line">
								<input type="file" name="foto" class="form-control" />

							</div>
						</div>



						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {

						$nik = $_POST['nik'];
						$nama = $_POST['nama'];
						$telepon = $_POST['telepon'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						$jabatan = $_POST['jabatan'];

						$foto = $_FILES['foto']['name'];
						$lokasi = $_FILES['foto']['tmp_name'];

						if (!empty($lokasi)) {
							$upload = move_uploaded_file($lokasi, "img/" . $foto);



							$sql = $koneksi->query("update users set nik='$nik', nama='$nama', telepon='$telepon', username='$username', jabatan='$jabatan', foto='$foto' where id='$id'");

							if ($sql) {
					?>

								<script type="text/javascript">
									alert("Data Berhasil Diubah");
									window.location.href = "?page=pengguna";
								</script>

							<?php
							}
						} else {

							$sql = $koneksi->query("update users set nik='$nik', username='$username', nama='$nama', telepon='$telepon', jabatan='$jabatan' where id='$id'");

							if ($sql) {
							?>

								<script type="text/javascript">
									alert("Data Berhasil Diubah");
									window.location.href = "?page=pengguna";
								</script>

					<?php
							}
						}
					}
					?>