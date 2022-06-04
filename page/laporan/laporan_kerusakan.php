<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <title>Laporan Kerusakan Mesin</title>
</head>

<body>

<table>
        <tr>
          <td>
            Laporan Kerusakan Mesin
          </td>
        </tr>
        <tr>
          <td width="50%">


            <form id="Myform1">
              <div class="row form-group">

                <div class="col-md-5">
                  <select class="form-control " name="bln">

                    <option value="all" selected="">ALL</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <?php
                  $now = date('Y');
                  echo "<select name='thn' class='form-control'>";
                  for ($a = 2018; $a <= $now; $a++) {
                    echo "<option value='$a'>$a</option>";
                  }
                  echo "</select>";
                  ?>
                </div>


                <input type="submit" class="" name="submit2" value="Tampilkan">
              </div>
            </form>
          </td>


      </table>

      <div class="tampung1">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="table-dark">
              <tr>
                <th>No</th>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Kode Mesin</th>
                <th>Nama Mesin</th>
                <th>Jenis Kerusakan</th>
                <th>Tindakan</th>
                <th>Catatan</th>
                <th>Biaya</th>
              </tr>
            </thead>


            <tbody>
              <?php

              $no = 1;
              $sql = $koneksi->query("select * from kerusakan");
              while ($data = $sql->fetch_assoc()) {

              ?>

                <tr style="color:black">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['id_kerusakan'] ?></td>
                  <td><?php echo $data['tanggal'] ?></td>
                  <td><?php echo $data['kode_barang'] ?></td>
                  <td><?php echo $data['nama_mesin'] ?></td>
                  <td><?php echo $data['jenis'] ?></td>
                  <td><?php echo $data['tindakan'] ?></td>
                  <td><?php echo $data['catatan'] ?></td>
                  <td><?php echo "Rp" . number_format($data['biaya']) ?></td>
                </tr>
              <?php } ?>

            </tbody>
          </table>

</body>

</html>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
                title: 'Laporan Kerusakan Mesin',
                download: 'open'
            },
        ]
    } );
} );
</script>