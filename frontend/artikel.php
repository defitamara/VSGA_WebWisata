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

            <!-- Menghubungkan ke database -->
            <?php 
            include "../koneksi.php";
            $query = "SELECT * from artikel";
            $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
            $nomor = 1;
            
            while($data = mysqli_fetch_array($query_mysql)){
            ?>

            <div class="col-sm-3">
                <div class="thumbnail">
                    <a href="#"><img src="../backend/images/artikel/<?php echo $data['gambar'] ?>" width="250px" alt="gambar"></a>
                    <div class="caption">
                        <h5><?php echo $data['judul'] ?></h5>
                        <p><?php echo(str_word_count($data['isi']) > 60 ? substr($data['isi'],0,100)."..." : $data['isi']) ?></p>
                        <p><a href="detailArtikel.php?id_artikel=<?php echo $data['id_artikel'] ?>" class="btn btn-light btn-block" role="button">Selengkapnya</a></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'layout/footer.php'; ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>