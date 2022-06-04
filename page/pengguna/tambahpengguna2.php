  <div class="container-fluid">

  	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
  		<div class="card-header py-3">
  			<h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
  		</div>
  		<div class="card-body">
  			<div class="table-responsive">


  				<div class="body">

  					<form method="POST" enctype="multipart/form-data">

  						<label for="">Nama</label>
  						<div class="form-group">
  							<div class="form-line">
  								<input type="text" name="nama" class="form-control" />
  							</div>
  						</div>

  						<label for="">Telepon</label>
  						<div class="form-group">
  							<div class="form-line">
  								<input type="text" name="telepon" class="form-control" />
  							</div>
  						</div>

  						<label for="">Username</label>
  						<div class="form-group">
  							<div class="form-line">
  								<input type="text" name="username" class="form-control" />

  							</div>
  						</div>

  						<label for="">Password</label>
  						<div class="form-group">
  							<div class="form-line">
  								<input type="password" name="password" class="form-control" />


  							</div>
  						</div>

  						<label for="">Jabatan</label>
  						<div class="form-group">
  							<div class="form-line">
  								<select name="jabatan" class="form-control show-tick">
  									<option value="">-- Pilih Jabatan --</option>

  									<option value="admin">Staf Umum</option>
  									<option value="mekanik">Mekanik</option>

  								</select>
  							</div>
  						</div>

  						<label for="">Foto</label>
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
							$password = md5($_POST['password']);
							$jabatan = $_POST['jabatan'];

							$foto = $_FILES['foto']['name'];
							$lokasi = $_FILES['foto']['tmp_name'];
							$upload = move_uploaded_file($lokasi, "img/" . $foto);

							if ($upload) {

								$sql = $koneksi->query("insert into users (nik, nama, telepon, username, password, jabatan, foto) values('$nik','$nama','$telepon','$username','$password','$jabatan','$foto')");

								if ($sql) {
						?>

  								<script type="text/javascript">
  									alert("Data Berhasil Disimpan");
  									window.location.href = "?page=pengguna";
  								</script>

  					<?php
								}
							}
						}
						?>