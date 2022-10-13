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
    <title>Promo</title>
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
        margin-left:30px;
      }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include 'layout/navbar.php'; ?>

    <div class="jumbotron text-center">
        <h1>Promo</h1>
        <p>Promo Spesial Wisata Tirta Agung, Stay Tune!</p>
    </div>

    <div class="container">
        <div class="row">

            <!-- Menghubungkan ke database -->
            <?php 
            include "../koneksi.php";
            $query = "SELECT * from promo";
            $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
            
            while($data = mysqli_fetch_array($query_mysql)){
            ?>

            <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="../backend/images/promo/<?php echo $data['gambar'] ?>" alt="gambar" width="100%">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['nama_promo'] ?></h5>
                    <p class="card-text"><?php echo $data['keterangan'] ?></p>
                    <p class="card-text"><small class="text-muted"><b>Periode :</b> <?php echo date('d F Y', strtotime($data['periode_awal'])) ?> - <?php echo date('d F Y', strtotime($data['periode_akhir'])) ?></small></p>
                </div><br>
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