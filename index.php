<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();



$koneksi = new mysqli("localhost", "root", "", "inventori");
if (empty($_SESSION['staf'])) {

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

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <img src="img/logo1.png" width="117" height="38"></img>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <?php
      if ($_SESSION['staf']) {
        $user = $_SESSION['staf'];
      }
      $sql = $koneksi->query("select * from users where id='$user'");
      $data = $sql->fetch_assoc();
      ?>



      <!--sidebar start-->

      <li class="d-flex align-items-center justify-content-center">
        <a class="nav-link">
          <img src="img/<?php echo $data['foto'] ?>" class="img-circle" width="80" alt="User" /></a>
      <li class="d-flex align-items-center justify-content-center">
      </li>
      </li>
      <li class="nav-item ">
        <a class="nav-link">
          <div class="d-flex align-items-center justify-content-center" class="name"> <?php echo  $data['nama']; ?></div>
          </font>
          <div class="d-flex align-items-center justify-content-center" class="email"><strong> <?php echo $data['jabatan']; ?></strong></div>
        </a>
      </li>




      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="?page=home">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pilih Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item active">
        <a class="nav-link" href="?page=pengguna">
          <i class="fas fa-fw fa-home"></i>
          <span>Data Karyawan</span></a>
      </li>


      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="?page=mesin">Data Mesin</a>
          </div>
        </div>
      </li>


      <!--
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Kegiatan Pemeliharaan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="?page=pemeliharaan">Planned Maintenance</a>
            <a class="collapse-item" href="?page=kerusakan">Unplanned Maintenance</a>


          </div>
        </div>
      </li>
    -->



      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>



      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Laporan:</h6>
            <a class="collapse-item" href="?page=laporan_barangmasuk">Laporan Pemeliharaan</a>
            <a class="collapse-item" href="?page=laporan_kerusakan">Laporan Kerusakan</a>
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
              if ($aksi == "ubahsatuan") {
                include "page/satuanbarang/ubahsatuan.php";
              }

              if ($aksi == "hapussatuan") {
                include "page/satuanbarang/hapussatuan.php";
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
              include "home.php";
            }
            if ($page == "home") {
              include "home.php";
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
      $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
          type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'page/pemeliharaan/get_satuan.php', // File yang akan memproses data
          data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
          success: function(data) { // Jika berhasil
            $('.tampung1').html(data); // Berikan hasil ke id kota
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


  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(function() {
        $('#Myform2').submit(function() {
          $.ajax({
            type: 'POST',
            url: 'page/laporan/export_laporan_kerusakan_excel.php',
            data: $(this).serialize(),
            success: function(data) {
              $(".tampung2").html(data);
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