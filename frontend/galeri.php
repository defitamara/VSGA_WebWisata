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
    <title>Galeri Foto</title>
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
      .card {
        margin-right:5px;
      }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include 'layout/navbar.php'; ?>


    <div class="jumbotron text-center">
        <h1>Galeri Foto</h1>
        <p>Kumpulan foto-foto Wisata Tirta Agung</p>
    </div>

    <div class="container">
        <div class="row">

            <!-- Menghubungkan ke database -->
            <?php 
            include "../koneksi.php";
            $query = "SELECT * from galeri g INNER JOIN kategori_wisata k WHERE g.id_kategori=k.id_kategori";
            $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
            
            while($data = mysqli_fetch_array($query_mysql)){
            ?>

            <div class="col-sm-3">
            <div class="card" style="width: 15rem;">
              <img src="../backend/images/galeri/<?php echo $data['foto'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['keterangan'] ?></h5>
                <p class="small">Kategori: <?php echo $data['kategori_wisata'] ?></p>
                <a href="../backend/images/galeri/<?php echo $data['foto']; ?>" target="_blank" class="btn btn-primary">Lihat</a>
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