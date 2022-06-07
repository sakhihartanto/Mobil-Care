<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();



$koneksi = new mysqli("localhost", "root", "", "inventori");
if (empty($_SESSION['pimpinan'])) {

  header("location:login.php");
}





?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Inventaris Barang</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top" style="background-color:black" onload="test()">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: white;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php" style="background-color:white ;">
        <img src="img/logo1.png" width="117" height="38"></img>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <?php
      if ($_SESSION['pimpinan']) {
        $user = $_SESSION['pimpinan'];
      }
      $sql = $koneksi->query("select * from users where id='$user'");
      $data = $sql->fetch_assoc();
      ?>



      <!--sidebar start-->

      <li class="d-flex align-items-center justify-content-center">
        <a class="nav-link">
          <img src="img/<?php echo $data['foto'] ?>" class="img-circle" width="80" alt="User" /></a>
      <li class="d-flex align-items-center justify-content-left">
      </li>
      </li>
      <li class="nav-item ">
        <a class="nav-link">
          <div class="d-flex align-items-center justify-content-center" class="name" style="color:black"> <?php echo  $data['nama']; ?></div>
          </font>
          <div class="d-flex align-items-center justify-content-center" class="email" style="color:black"><?php echo $data['jabatan']; ?></div>
        </a>
      </li>




      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="?page=home3">
          <i class="fas fa-fw fa-home" style="color:black"></i>
          <span style="color:black">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <h7 style="color: black;">pilih menu</h7>
      </div>

      <!-- Nav Item - Pages Collapse Menu -->


      <li class="nav-item active">
        <a class="nav-link" href="?page=pengguna">
          <i class="fas fa-user" style="color:black"></i>
          <span style="color:black">Data Karyawan</span></a>
      </li>



      <li class="nav-item active" style="color:black">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData" style="color:black">
          <i class="fas fa-fw fa-folder" style="color:black"></i>
          <span style="color:black">Data Master</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="color:black">
          <div class="bg-dark py-2 collapse-inner rounded" style="color:black">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item " href="?page=mesin" style="color:white">Data Mesin</a>
          </div>
        </div>
      </li>



      <li class="nav-item active">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder" style="color:black"></i>
          <span style="color:black"> Kegiatan Pemeliharaan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="?page=pemeliharaan" style="color:white">Pemeliharaan Preventif</a>
            <a class="collapse-item" href="?page=kerusakan" style="color:white">Data Kerusakan</a>
          </div>
        </div>
      </li>



      <!-- Heading -->
      <div class="sidebar-heading">
        <h7 style="color: black;">laporan</h7>
      </div>



      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
          <i class="fas fa-fw fa-folder" style="color:black"></i>
          <span style="color:black">Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="color:black">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Laporan:</h6>
            <a class="collapse-item" href="?page=laporan_barangmasuk" style="color:white">Laporan Pemeliharaan</a>
            <a class="collapse-item" href="?page=laporan_kerusakan" style="color:white"> Laporan Kerusakan</a>
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <div class="top-menu">
                <ul class="nav pull-right top-menu">
                  <img src="data:image/png;base64,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" width="30" height="40">
                  <img src="data:image/jpeg;base64,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" width="35" height="35">
                  <li>&nbsp;&nbsp;</li>
                  <li><a onclick="return confirm('Apakah anda yakin akan logout?')" class="btn btn-danger" class="logout" href="logout.php">Logout</a></li>
                </ul>
              </div>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <section class="content">


            <?php
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];


            if ($page == "pengguna") {
              if ($aksi == "") {
                include "page/pengguna/pengguna.php";
              }
              if ($aksi == "tambahpengguna") {
                include "page/pengguna/tambahpengguna.php";
              }
              if ($aksi == "ubahpengguna") {
                include "page/pengguna/ubahpengguna.php";
              }

              if ($aksi == "hapuspengguna") {
                include "page/pengguna/hapuspengguna.php";
              }
            }


            if ($page == "mesin") {
              if ($aksi == "") {
                include "page/mesin/mesin.php";
              }
              if ($aksi == "tambahmesin") {
                include "page//mesin/tambahmesin.php";
              }
              if ($aksi == "ubahdatamesin") {
                include "page/mesin/ubahdatamesin.php";
              }

              if ($aksi == "hapusmesin") {
                include "page/mesin/hapusmesin.php";
              }
            }


            if ($page == "jenisbarang") {
              if ($aksi == "") {
                include "page/jenisbarang/jenisbarang.php";
              }
              if ($aksi == "tambahjenis") {
                include "page//jenisbarang/tambahjenis.php";
              }
              if ($aksi == "ubahdatamesin") {
                include "page/mesin/ubahdatamesin.php";
              }

              if ($aksi == "hapusmesin") {
                include "page/mesin/hapusmesin.php";
              }
            }

            if ($page == "satuanbarang") {
              if ($aksi == "") {
                include "page/satuanbarang/satuan.php";
              }
              if ($aksi == "tambahsatuan") {
                include "page//satuanbarang/tambahsatuan.php";
              }
              if ($aksi == "ubahdatamesin") {
                include "page/mesin/ubahdatamesin.php";
              }

              if ($aksi == "hapusmesin") {
                include "page/mesin/hapusmesin.php";
              }
            }


            if ($page == "pemeliharaan") {
              if ($aksi == "") {
                include "page/pemeliharaan/pemeliharaan.php";
              }
              if ($aksi == "tambahpemeliharaan") {
                include "page/pemeliharaan/tambahpemeliharaan.php";
              }
              if ($aksi == "ubahpemeliharaan") {
                include "page/pemeliharaan/ubahpemeliharaan.php";
              }

              if ($aksi == "hapuspemeliharaan") {
                include "page/pemeliharaan/hapuspemeliharaan.php";
              }
              if ($aksi == "selesaipemeliharaan") {
                include "page/pemeliharaan/selesaipemeliharaan.php";
              }
            }


            if ($page == "gudang") {
              if ($aksi == "") {
                include "page/gudang/gudang.php";
              }
              if ($aksi == "tambahgudang") {
                include "page/gudang/tambahgudang.php";
              }
              if ($aksi == "ubahgudang") {
                include "page/gudang/ubahgudang.php";
              }

              if ($aksi == "hapusgudang") {
                include "page/gudang/hapusgudang.php";
              }
            }


            if ($page == "kerusakan") {
              if ($aksi == "") {
                include "page/kerusakan/kerusakan.php";
              }
              if ($aksi == "tambahkerusakan") {
                include "page/kerusakan/tambahkerusakan.php";
              }
              if ($aksi == "ubahkerusakan") {
                include "page/kerusakan/ubahkerusakan.php";
              }

              if ($aksi == "hapuskerusakan") {
                include "page/kerusakan/hapuskerusakan.php";
              }
            }


            if ($page == "laporan_supplier") {
              if ($aksi == "") {
                include "page/laporan/laporan_mesin.php";
              }
            }
            if ($page == "laporan_barangmasuk") {
              if ($aksi == "") {
                include "page/laporan/laporan_barangmasuk.php";
              }
            }

            if ($page == "laporan_gudang") {
              if ($aksi == "") {
                include "page/laporan/laporan_gudang.php";
              }
            }
            if ($page == "laporan_kerusakan") {
              if ($aksi == "") {
                include "page/laporan/laporan_kerusakan.php";
              }
            }



            if ($page == "") {
              include "home3.php";
            }
            if ($page == "home3") {
              include "home3.php";
            }
            ?>


          </section>


        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; 2022 . Sistem Informasi Mobile Care</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page jabatan plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page jabatan custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

  <!--script for this page-->
  <script>
    jQuery(document).ready(function($) {
      $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
          type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'page/pemeliharaan/get_barang.php', // File yang akan memproses data
          data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
          success: function(data) { // Jika berhasil
            $('.tampung').html(data); // Berikan hasil ke id kota
          }


        });
      });
    });
  </script>

  <script>
    jQuery(document).ready(function($) {
      $('#id_mesin').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        var link = ['page/pemeliharaan/get_checklist.php', 'page/pemeliharaan/get_checklist2.php']
        var url1 = 'page/pemeliharaan/get_checklist.php';
        var url2 = 'page/pemeliharaan/get_checklist2.php';
        $.ajax({
          type: 'POST', // Metode pengiriman data menggunakan POST
          url: url1, // File yang akan memproses data
          data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
          success: function(data) {
            $('.tampung1').html(data);
          }
        });
      });
    });
  </script>


  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(function() {
        $('#Myform1').submit(function() {
          $.ajax({
            type: 'POST',
            url: 'page/laporan/export_laporan_pemeliharaan_excel.php',
            data: $(this).serialize(),
            success: function(data) {
              $(".tampung1").html(data);
              $('.table').DataTable();

            }
          });

          return false;
          e.preventDefault();
        });
      });
    });
  </script>







</body>

</html>