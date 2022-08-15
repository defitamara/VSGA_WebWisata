<?php
// Start the session
session_start();

if(!isset($_SESSION["user"])){
  echo "<script> alert('Ops, Anda harus login terlebih dahulu!')</script>";
  echo "<script> window.location.href = '../login.php' </script>";
  // header('Location:login.php');
  // exit;
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Tiket</title>

    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/extra-libs/multicheck/multicheck.css"
    />
    <link
      href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
      rel="stylesheet"
    />
    <link href="dist/css/style.min.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      
      <?php include 'sidebar.php'; ?>

      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Tiket</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Data Tiket
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-body">
                  <!-- <h5 class="card-title">Daftar Pengunjung</h5> -->
                    <a class="btn btn-primary" href="tambahDataTiket.php">+ Tambah Data Baru</a>
                    <a class="btn btn-secondary" href="cetakDataTiket.php" target="_blank">Cetak Data Tiket (.pdf)</a>
                    <br><br>

                    <!-- Pesan pemberitahuan -->
                    <?php 
                    if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "input"){ ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Sukses!</strong> Data tiket berhasil disimpan!
                            </div> <?php
                        }else if($pesan == "update"){ ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Sukses!</strong> Data tiket berhasil diupdate!
                            </div> <?php
                        }else if($pesan == "hapus"){ ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Sukses!</strong> Data tiket berhasil dihapus!
                            </div> <?php
                        }else if($pesan == "cetak"){ ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Sukses!</strong> Data tiket berhasil dicetak!
                            </div> <?php
                        }
                    }
                    ?>

                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tiket</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Menghubungkan ke database -->
                        <?php 
                        include "../koneksi.php";
                        $query = "SELECT * from tiket";
                        $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
                        $nomor = 1;
                        
                        // Menghitung jumlah data
                        $jumlah_tiket = mysqli_num_rows($query_mysql);
                        
                        while($data = mysqli_fetch_array($query_mysql)){
                        ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['tiket']; ?></td>
                            <td>Rp.<?php echo $data['harga']; ?>,-</td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td><?php echo $data['updated']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="editDataTiket.php?id_tiket=<?php echo $data['id_tiket']; ?>">
                                    <span class="fa fa-edit"></span></a> 
                                <a class="btn btn-danger" href="hapus-tiket-aksi.php?id_tiket=<?php echo $data['id_tiket']; ?>"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data tiket <?php echo $data['tiket']; ?> ini?')">
                                    <span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Tiket</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>

                    <br>
                    <h6>Jumlah Tiket : <?php echo $jumlah_tiket; ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>

    <!-- Script Alert Faded -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);
    </script>
  </body>
</html>
