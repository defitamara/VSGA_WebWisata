<!-- Membatasi user yang login, jika sudah login maka tidak bisa mengakses file ini -->
<?php
// Start the session
if( empty(session_id()) && !headers_sent()){
  session_start();
}
// session_start();

if(isset($_SESSION["user"])){
  echo "<script> window.location.href = '../backend/dashboard.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Artikel / Berita</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Style -->
    <style>
      .foto-profil {
        width:35px;
        border-radius:50%;
        margin-left:50px;
      }
      /* Button Login */
      .btn-login {
        margin-left:5px;
      }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include 'layout/navbar.php'; ?>


    <div class="jumbotron text-center">
        <h1>Artikel / Berita</h1>
        <p>Kumpulan berita terkini seputar Tirta Agung</p>
    </div>

    <div class="container">
      <div class="row">
        <!-- Mengambil data detail dari artikel yang diklik -->
        <?php 
          include '../koneksi.php';
          $id = $_GET['id_artikel'];
          $query = "SELECT * from artikel WHERE id_artikel='$id'";
          $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
          while($data = mysqli_fetch_array($query_mysql)){
        ?>

        <div class="col-sm-8">
            <div class="thumbnail">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="artikel.php">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><b><?php echo $data['judul']; ?></b></li>
                    </ol>
                </nav>
                <img src="../backend/images/artikel/<?php echo $data['gambar']; ?>" width="100%" alt="gambar">
                <div class="caption">
                    <br>
                    <p><span class="fa fa-user"></span> <b><?php echo $data['penulis']; ?></b> | <?php echo $data['tanggal']; ?> | Terakhir Diubah: <?php echo $data['updated']; ?></p>
                    <p><?php echo $data['isi']; ?></p>
                    <hr>
                </div>
                <div class="comment">
                    <label><h2>Leave a coment</h2></label>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Kirim Komentar">
                    </div>

                </div>

            </div>
        </div>
        <?php } ?>

        <div class="col-sm-4">
            <div class="row">
                <!-- Mengambil data detail dari artikel selain yang diklik -->
                <?php 
                  include '../koneksi.php';
                  $id = $_GET['id_artikel'];
                  $query = "SELECT * from artikel WHERE id_artikel!='$id'";
                  $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
                  while($data2 = mysqli_fetch_array($query_mysql)){
                ?>
                <div class="col-sm-12">
                    <div class="caption">
                        <h6><?php echo $data2['judul']; ?></h6>
                        <div class="row">
                            <div class="col-xl-4">
                                <img src="../backend/images/artikel/<?php echo $data2['gambar']; ?>" width="100%" alt="gambar">
                            </div>
                            <div class="col-sm-8">
                                <p><?php echo(str_word_count($data2['isi']) > 60 ? substr($data2['isi'],0,50)."..." : $data2['isi']) ?></p>
                                <a href="detailArtikel.php?id_artikel=<?php echo $data2['id_artikel'] ?>" class="btn btn-light btn-block" role="button">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php } ?>
            </div>

        </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'layout/footer.php'; ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>