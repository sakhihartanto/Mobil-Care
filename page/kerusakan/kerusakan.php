<!-- Begin Page Content -->
<div class="container-fluid">
	<style>
		.has-bg-img {
			background-image: url("https://res.cloudinary.com/website-jtk-cdn/image/upload/v1654576661/Logo_mobil_care_rchcmt.png");
			background-size: 20%;
			/* Here is your opacity */

		}

		table {
			border: 5px solid blue;
		}
	</style>
	<!-- DataTales Example -->
	<div class="card shadow mb-4 has-bg-img">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Kerusakan Mesin</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-light" id="dataTable">
					<thead class="table-dark">
						<tr>
							<th>No</th>
							<th>Id Kerusakan</th>
							<th>Tanggal Keluar</th>
							<th>Kode Mesin</th>
							<th>Nama Mesin</th>
							<th>Jenis Kerusakan</th>
							<th>Tindakan</th>
							<th>Catatan</th>
							<th>Biaya</th>
							<th>Pengaturan</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$no = 1;
						$sql = $koneksi->query("select * from kerusakan where done=0");
						while ($data = $sql->fetch_assoc()) {

						?>

							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data['id_kerusakan'] ?></td>
								<td><?php echo $data['tanggal'] ?></td>
								<td><?php echo $data['kode_barang'] ?></td>
								<td><?php echo $data['nama_mesin'] ?></td>
								<td><?php echo $data['jenis'] ?></td>
								<td><?php echo $data['tindakan'] ?></td>
								<td><?php echo $data['catatan'] ?></td>
								<td><?php echo "Rp " . number_format($data['biaya']) ?></td>


								<td>
									<a href="?page=kerusakan&aksi=ubahkerusakan&id_kerusakan=<?php echo $data['id_kerusakan'] ?>" class="btn btn-success">Ubah</a>
									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=kerusakan&aksi=hapuskerusakan&id_kerusakan=<?php echo $data['id_kerusakan'] ?>" class="btn btn-danger">Hapus</a>
									<a onclick="return confirm('Apakah anda yakin akan menyelesaikan data ini?')" href="?page=kerusakan&aksi=selesaikerusakan&id_kerusakan=<?php echo $data['id_kerusakan'] ?>" class="btn btn-primary">Selesai</a>
								</td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
				<a href="?page=kerusakan&aksi=tambahkerusakan" class="btn btn-primary">Tambah</a>
				</tbody>
				</table>
			</div>
		</div>
	</div>

</div>