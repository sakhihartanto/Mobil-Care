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
      <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-light" id="dataTable" width="100%" cellspacing="0">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Username</th>
              <th>Jabatan</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php

            $no = 1;
            $sql = $koneksi->query("select * from users");
            while ($data = $sql->fetch_assoc()) {

            ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['telepon'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['jabatan'] ?></td>
                <td><img src="img/<?php echo $data['foto'] ?>" width="50" height="50" alt=""> </td>

                <td>
                  <a href="?page=pengguna&aksi=ubahpengguna&id=<?php echo $data['id'] ?>" class="btn btn-success">Ubah</a>
                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=pengguna&aksi=hapuspengguna&id=<?php echo $data['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
        <a href="?page=pengguna&aksi=tambahpengguna" class="btn btn-primary">Tambah</a>
        </tbody>
        </table>
      </div>
    </div>
  </div>

</div>