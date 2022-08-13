<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Data Pengunjung</title>

    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/libs/select2/dist/css/select2.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/libs/jquery-minicolors/jquery.minicolors.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/libs/quill/dist/quill.snow.css"
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
              <h4 class="page-title">Tambah Data Pengunjung</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dataPengunjung.php">Data Pengunjung</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Tambah Data Pengunjung
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
                <form class="form-horizontal" action="input-pengunjung-aksi.php" method="POST">
                  <div class="card-body">
                    <!-- <h4 class="card-title">Masukkan Data Pengunjung</h4> -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Pengunjung</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pengunjung" class="form-control" placeholder="Masukkan nama pengunjung" required
                            oninvalid="this.setCustomValidity('Nama pengunjung harus diisi')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal" class="form-control" required
                            oninvalid="this.setCustomValidity('Tanggal harus diisi')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat pengunjung" required
                            oninvalid="this.setCustomValidity('Alamat harus diisi')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
                                <input type="radio" name="jk" value="Perempuan" required> Perempuan
                            </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10">
                            <input type="text" name="usia" class="form-control" placeholder="Masukkan usia pengunjung" required
                            oninvalid="this.setCustomValidity('Usia pengunjung harus diisi')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="agama">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Testimoni</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="testimoni" class="form-control" placeholder="Testimoni pengunjung" required
                            oninvalid="this.setCustomValidity('Testimoni pengunjung harus diisi')" oninput="setCustomValidity('')"></textarea>
                        </div>
                    </div>

                  </div>
                    <div class="border-top">
                    <div class="card-body">
                      <a type="button" href="dataPengunjung.php" class="btn btn-secondary">Batal</a>
                      <button type="reset" class="btn btn-warning">Ulangi</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
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
    <!-- This Page JS -->
    <script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr("data-control") || "hue",
          position: $(this).attr("data-position") || "bottom left",

          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
              console.log(value);
            }
          },
          theme: "bootstrap",
        });
      });
      /*datwpicker*/
      jQuery(".mydatepicker").datepicker();
      jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
      var quill = new Quill("#editor", {
        theme: "snow",
      });
    </script>
  </body>
</html>
