<?php
$id_pemeliharaan = $_GET['id_pemeliharaan'];
$checked = $_GET['checklist'];
$checked_ex = explode(",", $checked);
$sql2 = $koneksi->query("select * from pemeliharaan where id_pemeliharaan = '$id_pemeliharaan'");
$tampil = $sql2->fetch_assoc();

$a = explode(',', $tampil['checklist']);
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ubah Pemeliharaan Mesin</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Id Pemeliharaan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="id_pemeliharaan" value="<?php echo $tampil['id_pemeliharaan']; ?>" class="form-control" readonly />
							</div>
						</div>

						<label for="">Tanggal Masuk</label>
						<div class="form-group">
							<div class="form-line">
								<input type="date" name="tanggal" class="form-control" value="<?php echo $tampil['tanggal']; ?>" />
							</div>
						</div>


						<label for="">Kode Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="kode_barang" value="<?php echo $tampil['kode_barang']; ?>" class="form-control" id="kode_mesin" readonly />
							</div>
						</div>

						<label for="">Nama Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="nama_mesin" value="<?php echo $tampil['nama_mesin']; ?>" class="form-control" readonly />
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
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa perangkat keras yang longgar" <?php in_array('Periksa perangkat keras yang longgar', $a) ? print 'checked' : ' ' ?>/>
												<label class="form-check-label" for="checklist">
												Periksa perangkat keras yang longgar
												</label>
											</div>
											<div class="form-line">
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa adaptor retak atau rusak"  <?php in_array('Periksa adaptor retak atau rusak', $a) ? print 'checked' : ' ' ?>/>
												<label class="form-check-label" for="checklist">
												Periksa adaptor retak, atau rusak
												</label>
											</div>
											<div class="form-line">
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa pengukur tekanan dan selang yang rusak"  <?php in_array('Periksa pengukur tekanan dan selang yang rusak', $a) ? print 'checked' : ' ' ?>/>
												<label class="form-check-label" for="checklist">
												Periksa pengukur tekanan dan selang yang rusak
												</label>
											</div>
											<div class="form-line">
												<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Membersihkan mesin dari kotoran minyak dan pasir"  <?php in_array('Membersihkan mesin dari kotoran minyak dan pasir', $a) ? print 'checked' : ' ' ?>/>
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
													<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Periksa Kompresor Pegas untuk memastikannya tidak rusak." <?php in_array('Periksa Kompresor Pegas untuk memastikannya tidak rusak.', $a) ? print 'checked' : ' ' ?>/>
													<label class="form-check-label" for="checklist">
													Periksa Kompresor Pegas untuk memastikannya tidak rusak.
													</label>
												</div>
												<div class="form-line">
													<input type="checkbox" name="checklist[]" class="form-check-input" id="checklist[]" value="Bersihkan kolom geser dan lap menggunakan sedikit oli transmisi." <?php in_array('Bersihkan kolom geser dan lap menggunakan sedikit oli transmisi.', $a) ? print 'checked' : ' ' ?>/>
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

						<br>

						<label for="">Catatan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="catatan" value="<?php echo $tampil['catatan']; ?>" class="form-control" />
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

						$id = $_POST['id'];
						$id_pemeliharaan = $_POST['id_pemeliharaan'];
						$tanggal = $_POST['tanggal'];
						$kode_barang = $pecah_barang[0];
						$nama_barang = $pecah_barang[1];
						$checklist = $_POST['checklist'];
						$allchecklist = implode(",", $checklist);
						$catatan = $_POST['catatan'];
						$jumlah = $_POST['jumlah'];
						$nama_mesin = $_POST['nama_mesin'];
						$petugas = $_POST['petugas'];

						#$sql = $koneksi->query("UPDATE `pemeliharaan` SET `id`='$id',`id_pemeliharaan`='$id_pemeliharaan',`tanggal`='$tanggal',`kode_barang`='$kode_barang',`nama_barang`='$nama_barang',`checklist`='$allchecklist',`catatan`='$catatan',`jumlah`='$jumlah',`nama_mesin`='$nama_mesin' WHERE id_pemeliharaan='$id_pemeliharaan");
						$sql = $koneksi->query("update pemeliharaan set tanggal='$tanggal', checklist='$allchecklist', catatan='$catatan', petugas='$petugas' where id_pemeliharaan = '$id_pemeliharaan'");
						#print_r($id_pemeliharaan);

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