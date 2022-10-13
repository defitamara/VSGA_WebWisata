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
    <title>Tirta Agung</title>
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

    <!-- Mengambil data detail dari artikel yang diklik -->
    <?php 
        include '../koneksi.php';
        $id = $_GET['id_kategori'];
        $query = "SELECT * from obyek_wisata WHERE id_kategori='$id'";
        $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
        while($data = mysqli_fetch_array($query_mysql)){
    ?>

    <div class="jumbotron text-center">
        <h1><?php echo $data['nama_obyek']; ?></h1>
        <!-- <p>Kumpulan berita terkini seputar Tirta Agung</p> -->
    </div>

    <div class="container">
      <div class="row">
        
        <div class="col-sm-8">
            <div class="thumbnail">
                <img src="../backend/images/obyekwisata/<?php echo $data['gambar_utama']; ?>" width="100%" alt="gambar">
                <div class="caption">
                    <p><?php echo $data['deskripsi']; ?></p>
                </div>
                <?php } ?>

                <!-- Gambar lainnya -->
                <h6>Gambar Lainnya:</h6>
                <!-- Mengambil data gambar dari tabel galeri dengan kategori sama dengan obyek wisata -->
                <?php 
                    include '../koneksi.php';
                    $id = $_GET['id_kategori'];
                    $query = "SELECT * from galeri WHERE id_kategori='$id'";
                    $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
                    while($data2 = mysqli_fetch_array($query_mysql)){
                ?>
                <a href="../backend/images/galeri/<?php echo $data2['foto']; ?>" target="_blank"><img src="../backend/images/galeri/<?php echo $data2['foto']; ?>" class="img-thumbnail" width="40%" alt="..."></a>
                <?php } ?>

                <br><br>
                <form class="form-horizontal" action="kirim-saran-aksi.php" method="POST">
                    <div class="comment">
                        <label><h2>Kotak Saran</h2></label>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" class="form-control" name="nama" required
                                oninvalid="this.setCustomValidity('Nama harus diisi')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label>Email/No HP:</label>
                            <input type="email" class="form-control" name="kontak" required
                                oninvalid="this.setCustomValidity('Mohon isi kontak yang bisa dihubungi')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="comment">Komentar/Saran/Kritik:</label>
                            <textarea class="form-control" rows="5" name="komentar" required
                                oninvalid="this.setCustomValidity('Masukkan Komentar/Saran/Kritik yang ingin anda sampaikan')" oninput="setCustomValidity('')"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Kirim">
                        </div>
                    </div>
                </form>

            </div>
        </div>
        

        <div class="col-sm-4">
            <div class="row">
                <!-- Mengambil data detail dari artikel selain yang diklik -->
                <?php 
                  include '../koneksi.php';
                  $id = $_GET['id_kategori'];
                  $query = "SELECT * from obyek_wisata WHERE id_kategori!='$id'";
                  $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
                  while($data3 = mysqli_fetch_array($query_mysql)){
                ?>
                <div class="col-sm-12">
                    <div class="caption">
                        <h6><?php echo $data3['nama_obyek']; ?></h6>
                        <div class="row">
                            <div class="col-xl-4">
                                <img src="../backend/images/obyekwisata/<?php echo $data3['gambar_utama']; ?>" width="100%" alt="gambar">
                            </div>
                            <div class="col-sm-8">
                                <p><?php echo(str_word_count($data3['deskripsi']) > 60 ? substr($data3['deskripsi'],0,50)."..." : $data3['isi']) ?></p>
                                <a href="obyekWisata.php?id_kategori=<?php echo $data3['id_kategori'] ?>" class="btn btn-light btn-block" role="button">Selengkapnya</a>
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