<br>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

  </div>
  <h3>Selamat Datang !</h3>
  <div class="card text-white bg-danger mb-3 ">
    <div class="card-header bg-danger">Peringatan !</div>
    <div class="card-body">
      <?php
      $sql = $koneksi->query("select * from pemeliharaan where done=0");
      $row  = mysqli_num_rows($sql);
      echo "<h3 style= 'color:white;'> Terdapat " . $row . " pemeliharaan preventif yang harus dilakukan hari ini ! </h3>";
      ?>
      <a href="?page=pemeliharaan" class="btn btn-warning btn-sm">Kegiatan Pemeliharaan</a>
    </div>
  </div>

  <br>
  <!-- Content Row -->
  <div class="row">


    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card text-white bg-success mb-3 w-100 h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <h4 style='color:white'>Total Karyawan</h4>
                </div>
            </div>
            <div class="col-auto">
              <?php
              $sql = $koneksi->query("select * from users ");
              $row  = mysqli_num_rows($sql);
              echo "<h3 style= 'color:white;'>" . $row . "";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card text-white bg-primary mb-3 w-100 h-100 ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <h4 style='color:white'>Total Mesin</h4>
                </div>
            </div>
            <div class="col-auto">
              <?php
              $sql = $koneksi->query("select * from tb_mesin ");
              $row  = mysqli_num_rows($sql);
              echo "<h3 style= 'color:white;'>" . $row . "";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

        
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card text-white bg-warning mb-3 w-100 h-100 ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <h4 style='color:white'>Total Pemeliharaan</h4>
                </div>
            </div>
            <div class="col-auto">
              <?php
              $sql = $koneksi->query("select * from pemeliharaan");
              $row  = mysqli_num_rows($sql);
              echo "<h3 style= 'color:white;'>" . $row . "";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

            
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card text-white bg-danger mb-3 w-100 h-100 ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <h4 style='color:white'>Total Kerusakan</h4>
                </div>
            </div>
            <div class="col-auto">
              <?php
              $sql = $koneksi->query("select * from kerusakan");
              $row  = mysqli_num_rows($sql);
              echo "<h3 style= 'color:white;'>" . $row . "";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="?page=pengguna">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <h4>Data Karyawan</h4>
                </div>

            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-lg text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="?page=mesin">
                <div class="text-xs font-weight-bold align-items-center text-info text-uppercase mb-1">
                  <h4>Data Mesin</h4>
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">

                  </div>
                  <div class="col">

                  </div>
                </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cog fa-lg text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="?page=pemeliharaan">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  <h4>Kegiatan Pemeliharaan</h4>
                </div>

            </div>
            <div class="col-auto">
              <i class="fas fa-history fa-lg text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="?page=kerusakan">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  <h4>Data Kerusakan</h4>
                </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-house-damage fa-lg text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
