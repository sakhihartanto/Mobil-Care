<script>
	function sum() {
		var stok = document.getElementById('stok').value;
		var jeniskeluar = document.getElementById('jeniskeluar').value;
		var result = parseInt(stok) - parseInt(jeniskeluar);
		if (!isNaN(result)) {
			document.getElementById('total').value = result;
		}
	}
	var rupiah2 = document.getElementById("rupiah2");
	rupiah2.addEventListener("keyup", function(e) {
		rupiah2.value = convertRupiah(this.value, "Rp. ");
	});
	rupiah2.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	function convertRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
	}

	function isNumberKey(evt) {
		key = evt.which || evt.keyCode;
		if (key != 188 // Comma
			&&
			key != 8 // Backspace
			&&
			key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
			&&
			(key < 48 || key > 57) // Non digit
		) {
			evt.preventDefault();
			return;
		}
	}
</script>

<?php


$koneksi = new mysqli("localhost", "root", "", "inventori");$no = mysqli_query($koneksi, "select id_kerusakan from kerusakan order by id_kerusakan desc");
$idtran = mysqli_fetch_array($no);
$kode = $idtran['id_kerusakan'];


$urut = substr($kode, 8, 3);
$tambah = (int) $urut + 1;
$bulan = date("m");
$tahun = date("y");

if (strlen($tambah) == 1) {
	$format = "KRS-" . $bulan . $tahun . "00" . $tambah;
} else if (strlen($tambah) == 2) {
	$format = "KRS-" . $bulan . $tahun . "0" . $tambah;
} else {
	$format = "KRS-" . $bulan . $tahun . $tambah;
}



$tanggal_keluar = date("Y-m-d");


?>

<div class="container-fluid">



	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Kerusakan</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Id Kerusakan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="id_kerusakan" class="form-control" id="id_kerusakan" value="<?php echo $format; ?>" readonly />
							</div>
						</div>

						<label for="">Tanggal Kerusakan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="date" name="tanggal_keluar" class="form-control" id="tanggal_kelauar" />
							</div>
						</div>


						<label for="">Kode Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<select name="barang" id="cmb_barang" class="form-control" />
								<option value="">-- Pilih Kode Mesin --</option>
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
								<select name="nama_mesin" id="cmb_barang" class="form-control" />
								<option value="">-- Pilih Nama Mesin --</option>
								<?php

								$sql = $koneksi->query("select * from tb_mesin order by nama_mesin");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[nama_mesin]'>$data[nama_mesin]</option>";
								}
								?>
								</select>
							</div>
						</div>

						<label for="">Jenis Kerusakan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="jeniskeluar" class="form-control" />
							</div>
						</div>

						<label for="total">Tindakan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="tindakan" class="form-control">
							</div>
						</div>

						<label for="">Catatan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="catatan" class="form-control" />
							</div>
						</div>

						<label for="">Biaya</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="biaya" id="rupiah2" class="form-control" placeholder="Rp" />
							</div>
						</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {
						$id_kerusakan = $_POST['id_kerusakan'];
						$tanggal = $_POST['tanggal_keluar'];

						$barang = $_POST['barang'];
						$pecah_barang = explode(" ", $barang);
						$kode_barang = $pecah_barang[0];
						#$nama_barang = $pecah_barang[1];
						$jenis = $_POST['jeniskeluar'];
						$tindakan = $_POST['tindakan'];
						$nama_mesin = $_POST['nama_mesin'];
						$catatan = $_POST['catatan'];
						$biaya = $_POST['biaya'];
						$sisa2 = $total;
						if ($sisa2 < 0) {
					?>

							<script type="text/javascript">
								alert("Stok Barang Habis, Transaksi Tidak Dapat Dilakukan");
								window.location.href = "?page=barangkeluar&aksi=tambahbarangkeluar";
							</script>

						<?php
						} else {


							$sql = $koneksi->query("insert into kerusakan (id_kerusakan, tanggal, kode_barang, nama_barang, jenis, tindakan, nama_mesin, catatan, biaya) values('$id_kerusakan','$tanggal','$kode_barang','$nama_barang','$jenis', '$tindakan','$nama_mesin','$catatan','$biaya')");
							$sql2 = $koneksi->query("update gudang set jenis=(jenis) where kode_barang='$kode_barang'");
						?>


							<script type="text/javascript">
								alert("Simpan Data Berhasil");
								window.location.href = "?page=barangkeluar";
							</script>
					<?php
						}
					}


					?>