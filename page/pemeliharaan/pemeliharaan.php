<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Kegiatan Pemeliharaan</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" >
					<thead class="table-dark">
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>Tanggal Pemeliharaan</th>
							<th>Kode Mesin</th>
							<th>Nama Mesin</th>
							<th>Checklist</th>
							<th>Catatan</th>
							<th>Petugas</th>
							<th>Pengaturan</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$no = 1;
						$sql = $koneksi->query("select * from pemeliharaan where done=0");
						while ($data = $sql->fetch_assoc()) {

						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td width="10%"><?php echo $data['id_pemeliharaan'] ?></td>
								<td><?php echo $data['tanggal'] ?></td>
								<td> <?php echo $data['kode_barang'] ?></td>
								<td width="50%"><?php echo $data['nama_mesin'] ?></td>
								<td width="50%"><?php 
								list($checklist, $checklist2, $checklist3) = explode(",",$data['checklist']);
								echo "1. " . $checklist . "</br>";
								echo "2. " . $checklist2 . "<br>";
								echo "3. " . $checklist3 . "<br>";?></td>
								<td><?php echo $data['catatan'] ?></td>
								<td><?php echo $data['petugas'] ?></td>
								<td>
									<a href="?page=pemeliharaan&aksi=ubahpemeliharaan&id_pemeliharaan=<?php echo $data['id_pemeliharaan'] ?>" class="btn btn-success">Ubah</a>
									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=pemeliharaan&aksi=hapuspemeliharaan&id_pemeliharaan=<?php echo $data['id_pemeliharaan'] ?>" class="btn btn-danger">Hapus</a>
									<a onclick="return confirm('Apakah anda yakin merubah status menjadi selesai?')" href="?page=pemeliharaan&aksi=selesaipemeliharaan&id_pemeliharaan=<?php echo $data['id_pemeliharaan'] ?>" class="btn btn-primary">Selesai</a>
								</td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
				<a href="?page=pemeliharaan&aksi=tambahpemeliharaan" class="btn btn-primary">Tambah</a>
				</tbody>
				</table>
			</div>
		</div>
	</div>

</div>