<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Mesin</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table-sm table-bordered" id="dataTable" >
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