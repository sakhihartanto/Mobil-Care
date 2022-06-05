  <?php

	$koneksi = new mysqli("localhost", "root", "", "inventori");
	$no = mysqli_query($koneksi, "select id_pemeliharaan from pemeliharaan order by id_pemeliharaan desc");
	$idtran = mysqli_fetch_array($no);
	$kode = $idtran['id_pemeliharaan'];


	$urut = substr($kode, 8, 3);
	$tambah = (int) $urut + 1;
	$bulan = date("m");
	$tahun = date("y");

	if (strlen($tambah) == 1) {
		$format = "PML-" . $bulan . $tahun . "00" . $tambah;
	} else if (strlen($tambah) == 2) {
		$format = "PML-" . $bulan . $tahun . "0" . $tambah;
	} else {
		$format = "PML-" . $bulan . $tahun . $tambah;
	}



	$tanggal_masuk = date("Y-m-d");


	?>

  <div class="container-fluid">

  	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
  		<div class="card-header py-3">
  			<h6 class="m-0 font-weight-bold text-primary">Tambah Pemeliharaan Mesin</h6>
  		</div>
  		<div class="card-body">
  			<div class="table-responsive">


  				<div class="body">

  					<form method="POST" enctype="multipart/form-data">

  						<label for="">Id Pemeliharaan</label>
  						<div class="form-group">
  							<div class="form-line">
  								<input type="text" name="id_pemeliharaan" class="form-control" id="id_pemeliharaan" value="<?php echo $format; ?>" readonly />
  							</div>
  						</div>



  						<label for="">Tanggal Masuk</label>
  						<div class="form-group">
  							<div class="form-line">
  								<input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?php echo date('Y-m-d'); ?>" />
  							</div>
  						</div>


  						<label for="">Kode Mesin</label>
  						<div class="form-group">
  							<div class="form-line">
  								<select name="barang" id="kode_mesin" class="form-control" onchange="test()">
  									<option value="">-- Pilih Mesin --</option>
  									<?php

										$sql = $koneksi->query("select * from tb_mesin order by kode_mesin");
										while ($data = $sql->fetch_assoc()) {
											echo "<option value='$data[kode_mesin]'>$data[kode_mesin] | $data[nama_mesin]</option>";
										}
										?>

  								</select>
  							</div>
  						</div>

  						<label for="">Nama Mesin</label>
  						<div class="form-group">
  							<div class="form-line">
  								<select name="nama_mesin" class="form-control">
  									<option value="">-- Pilih Mesin --</option>
  									<?php

										$sql = $koneksi->query("select * from tb_mesin order by nama_mesin");
										while ($data = $sql->fetch_assoc()) {
											echo "<option value='$data[nama_mesin]'>$data[nama_mesin]</option>";
										}
										?>

  								</select>


  							</div>
  						</div>

  						<p id="tmp1"></p>

  						<script type="text/javascript">
  							function test() {
  								if (document.getElementById("kode_mesin").value == "04.437.001") {
  									document.getElementById("tmp1").innerHTML = `
									  <label>Checklist</label>
										<div class="form-group">
										<div class="form-line">
											<div class="form-check">
											<div class="form-line">
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa perangkat keras yang longgar" />
												<label class="form-check-label" for="checklist">
												Periksa perangkat keras yang longgar
												</label>
											</div>
											<div class="form-line">
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa adaptor retak atau rusak" />
												<label class="form-check-label" for="checklist">
												Periksa adaptor retak, atau rusak
												</label>
											</div>
											<div class="form-line">
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa pengukur tekanan dan selang yang rusak" />
												<label class="form-check-label" for="checklist">
												Periksa pengukur tekanan dan selang yang rusak
												</label>
											</div>
											<div class="form-line">
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Membersihkan mesin dari kotoran minyak dan pasir" />
												<label class="form-check-label" for="checklist">
												Membersihkan mesin dari kotoran, minyak dan pasir
												</label>
											</div>
											</div>
											<br>
											</input>
										</div>
										</div>
									`;
  								} else if (document.getElementById("kode_mesin").value == "04.438.001") {
									document.getElementById("tmp1").innerHTML = `
									<label>Checklist</label>
									<div class="form-group">
										<div class="form-line">
											<div class="form-check">
												<div class="form-line">
													<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa Kompresor Pegas untuk memastikannya tidak rusak." />
													<label class="form-check-label" for="checklist">
													Periksa Kompresor Pegas untuk memastikannya tidak rusak.
													</label>
												</div>
												<div class="form-line">
													<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Bersihkan kolom geser dan lap menggunakan sedikit oli transmisi." />
													<label class="form-check-label" for="checklist">
													Bersihkan kolom geser dan lap menggunakan sedikit oli transmisi.
													</label>
												</div>
											</div>
											<br>
											</input>
										</div>
									</div>
									`;
  								} else {
  									document.getElementById("tmp1").innerHTML = "sisanya";
  								}
  							}
  						</script>
<!-- 
  						<div class="tampung1" id="tmp1"></div>
  						<div class="tampung2" id="tmp2"></div> -->
  						<!--
  						<label for="">Checklist</label>
  						<div class="form-check">
  							<div class="form-line">
  								<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Kebersihan Mesin" />
  								<label class="form-check-label" for="checklist">
  									Kebersihan Mesin
  								</label>
  							</div>
  							<div class="form-line">
  								<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Kesehatan Mesin" />
  								<label class="form-check-label" for="checklist">
  									Kesehatan Mesin
  								</label>
  							</div>
  							<div class="form-line">
  								<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Ganti Canvas Mesin" />
  								<label class="form-check-label" for="checklist">
  									Ganti Canvas Mesin
  								</label>
  							</div>
  						</div>
								-->
  						<br>

  						<label for="">Catatan</label>
  						<div class="form-group">
  							<div class="form-line">
  								<input type="text" name="catatan" class="form-control" />
  							</div>
  						</div>

  						<label for="">Petugas</label>
  						<div class="form-group">
  							<div class="form-line">
  								<select name="petugas" class="form-control" />
  								<option value="">-- Pilih Petugas --</option>
  								<?php

									$sql = $koneksi->query("select * from users order by nama");
									while ($data = $sql->fetch_assoc()) {
										echo "<option value='$data[nama]'>$data[nama]</option>";
									}
									?>

  								</select>
  							</div>
  						</div>

  						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

  					</form>




  					<?php

						if (isset($_POST['simpan'])) {
							$id_pemeliharaan = $_POST['id_pemeliharaan'];
							$tanggal = $_POST['tanggal_masuk'];
							$barang = $_POST['barang'];
							$pecah_barang = explode(" ", $barang);
							$kode_barang = $pecah_barang[0];
							#$nama_barang = $pecah_barang[1];
							$nama_mesin = $_POST['nama_mesin'];
							$checklist = $_POST['checklist'];
							$allchecklist = implode(",", $checklist);
							$catatan = $_POST['catatan'];
							$petugas = $_POST['petugas'];

							$sql = $koneksi->query("insert into pemeliharaan (id_pemeliharaan, tanggal, kode_barang, nama_mesin, checklist, catatan, petugas) values('$id_pemeliharaan','$tanggal','$kode_barang', '$nama_mesin' ,'$allchecklist','$catatan', '$petugas')");
							print_r($petugas);




							if ($sql) {
						?>
  							<script type="text/javascript">
  								alert("Simpan Data Berhasil");
  								window.location.href = "?page=pemeliharaan";
  							</script>
  					<?php
							}
						}


						?>