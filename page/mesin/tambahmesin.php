<script>
	function sum() {
		var stok = document.getElementById('stok').value;
		var jumlahkeluar = document.getElementById('jumlahkeluar').value;
		var result = parseInt(stok) - parseInt(jumlahkeluar);
		if (!isNaN(result)) {
			document.getElementById('total').value = result;
		}
	}
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<?php



$koneksi = new mysqli("localhost", "root", "", "inventori");$no = mysqli_query($koneksi, "select kode_mesin from tb_mesin order by kode_mesin desc");
$kdsupplier = mysqli_fetch_array($no);
$kode = $kdsupplier['kode_mesin'];
$urut = substr($kode, 8, 3);
$tambah = (int) $urut + 1;
$bulan = date("m");
$tahun = date("y");

if(strlen($tambah) == 1){
	$format = "MSN-".$bulan.$tahun."00".$tambah;
} else if(strlen($tambah) == 2){
	$format = "MSN-".$bulan.$tahun."0".$tambah;
	
} else{
	$format = "MSN-".$bulan.$tahun.$tambah;

}


?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Supplier</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Kode Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="kode_mesin" class="form-control" />
							</div>
						</div>

						<label for="">Nama Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="nama_mesin" class="form-control" />
							</div>
						</div>


						<label for="">Merk Mesin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="merk_mesin" class="form-control" />

							</div>
						</div>

						<label for="">Tempat Penyimpanan</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="penyimpanan" class="form-control" />
							</div>
						</div>

						<label for="">Ukuran</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="ukuran" class="form-control" />
							</div>
						</div>

						<label for="">Tahun</label>
						<div class="form-group">
							<div class="form-line">
								<input type="number" name="tahun" class="form-control" />
							</div>
						</div>

						<label for="">Jumlah</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="jumlah" class="form-control" />
							</div>
						</div>

						<label for="">Fungsi</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="fungsi" class="form-control" />
							</div>
						</div>

						<label for="">Harga</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="harga" id="dengan-rupiah" class="form-control" />
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


						$sql = $koneksi->query("insert into tb_mesin (kode_mesin, nama_mesin, merk_mesin, penyimpanan, ukuran, tahun, jumlah, fungsi, harga) values('$kode_mesin','$nama_mesin','$merk_mesin', '$penyimpanan', '$ukuran','$tahun', '$jumlah','$fungsi', '$harga')");

						if ($sql) {
					?>

							<script type="text/javascript">
								alert("Data Berhasil Disimpan");
								window.location.href = "?page=mesin";
							</script>

					<?php
						}
					}


					?>