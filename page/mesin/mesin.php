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
      <h6 class="m-0 font-weight-bold text-primary">Data Mesin</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table-sm table-bordered table-light table-hover table-striped" id="dataTable" >
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Mesin</th>
              <th>Nama Mesin</th>
              <th>Merk Mesin</th>
              <th>Penyimpanan</th>
              <th>Ukuran</th>
              <th>Tahun</th>
              <th>Jumlah</th>
              <th>Fungsi</th>
              <th>Harga</th>
              <th>Aksi</th>
            
            </tr>
          </thead>


          <tbody>
            <?php

            $no = 1;
            $sql = $koneksi->query("select * from tb_mesin");
            while ($data = $sql->fetch_assoc()) {

            ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['kode_mesin'] ?></td>
                <td><?php echo $data['nama_mesin'] ?></td>
                <td><?php echo $data['merk_mesin'] ?></td>
                <td class="align-middle"><?php echo $data['penyimpanan'] ?></td>
                <td><?php echo $data['ukuran'] ?></td>
                <td><?php echo $data['tahun'] ?></td>
                <td><?php echo $data['jumlah'] ?></td>
                <td><?php echo $data['fungsi'] ?></td>
                <td><?php echo $data['harga'] ?></td>
                <td>
                  <a href="?page=mesin&aksi=ubahdatamesin&kode_mesin=<?php echo $data['kode_mesin'] ?>" class="btn btn-success">Ubah</a>
                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=mesin&aksi=hapusmesin&id=<?php echo $data['kode_mesin'] ?>" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
        <a href="?page=mesin&aksi=tambahmesin" class="btn btn-primary">Tambah Data Mesin</a>
        </tbody>
        </table>
      </div>
    </div>
  </div>

</div>