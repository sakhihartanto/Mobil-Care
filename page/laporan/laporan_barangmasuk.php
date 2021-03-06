<?php
  function fetch_data(){
    $output = '';  
    $no = 1;
    $connect = mysqli_connect("localhost", "root", "", "inventori");  
    $sql = "select * from pemeliharaan";  
    $result = mysqli_query($connect, $sql);  
    while($data = mysqli_fetch_array($result)) 
    {
    $output .= '<tr style="color:black">
                  <td>'.$no++.'</td>
                  <td>'.$data["id_pemeliharaan"].'</td>
                  <td>'.$data["tanggal"].'</td>
                  <td>'.$data["kode_barang"].'</td>
                  <td>'.$data["nama_mesin"].'</td>
                  <td>'.$data["checklist"].'</td>
                  <td>'.$data["petugas"].'</td>
                </tr>
                ';  
    }  
    return $output; 
  }
?>


<?php
  if(isset($_POST["create_pdf"]))  
    {  
      echo '<script type="text/javascript">window.open("page/laporan/pdf_barangmasuk.php");</script>';
    }  
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <title>Laporan Pemeliharaan Mesin</title>
</head>

<body>

  <table>
    <tr>
      <td>
        Laporan Pemeliharaan Mesin
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
          <div class="tampung1">
        </form>
      </td>


  </table>

  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>ID</th>
          <th>Tanggal</th>
          <th>Kode</th>
          <th>Nama Mesin</th>
          <th>Checklist</th>
          <th>Petugas</th>
        </tr>
      </thead>


      <tbody>
        <?php
          echo fetch_data();
        ?>
      </tbody>
    </table>

    <form method="post">  
        <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
    </form> 
</div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: 'Bfrtip',
      buttons: [{
        image: 'https://res.cloudinary.com/website-jtk-cdn/image/upload/v1654500591/mobil-care_ykt60f.png',
        extend: 'pdfHtml5',
        orientation: 'potrait',
        pageSize: 'A4',
        title: 'Laporan Pemeliharaan Mesin',
        download: 'open'
      }]
    });
  });
</script> -->