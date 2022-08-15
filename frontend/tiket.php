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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Tirta Agung</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- CSS Tambahan -->
    <link rel="stylesheet" href="css/web-tirta.css">

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
      .container {
        margin-top:30px;
      }
      /* Ticket */
      .grid-img {
        float:inherit;
        width: 210px;
        height: 250px;
        background-color: white;
        border-radius: 20px;
        padding: 10px;
        color: black;
        text-align: center;
        font-size: 18px;
        /* border: 1px solid black; */
        box-shadow: 2px 2px 5px black;
        margin: 10px;
      }

      .header-img {
        width: 180px;
        border-radius: 20px;
        margin-top: 20px;
      }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'layout/navbar.php'; ?>

    <div class="container">
      <h3>Informasi Harga Tiket Tirta Agung</h3>
      <p>*Belum termasuk fasilitas berbayar </p>

      <br>

      <table>
            <tr>
                <td>
                    <div class="grid-img">
                        <img src="images/tirta.jpg" class="header-img"><br><br>
                        <h6><b>Gazebo diatas Kolam Ikan Hias</b></h6>
                        <!-- <a href="#" class="">[View More]</a> -->
                    </div>
                </td>
                <td>
                    <div class="grid-img">
                        <img src="images/kalasenja.jpg" class="header-img"><br><br>
                        <h6><b>Kala Senja</b></h6>
                    </div>
                </td>
                <td>
                    <div class="grid-img">
                        <img src="images/kolam.jpg" class="header-img"><br><br>
                        <h6><b>Kolam Renang</b></h6>
                    </div>
                </td>
                <td>
                    <div class="grid-img">
                        <img src="images/tirta3.jpg" class="header-img"><br><br>
                        <h6><b>Terasering Persawahan</b></h6>
                    </div>
                </td>
                <td>
                    <div class="grid-img">
                        <img src="images/kolam-ikan.jpg" class="header-img"><br><br>
                        <h6><b>Kolam Ikan</b></h6>
                    </div>
                </td>
            </tr>
        </table>

        <br><br>
        
        <table class="table table-striped">
          <tr>
            <th>No</th>
            <th>Tiket</th>
            <th>Harga</th>
            <th>Keterangan</th>
          </tr>
          <?php 
          include '../koneksi.php';
          $query = "SELECT * from tiket";
          $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
          $nomor = 1;
              
          while($data = mysqli_fetch_array($query_mysql)){
          ?>
          <tr>
            <td><?php echo $nomor++ ?></td>
            <td><?php echo $data['tiket']; ?></td>
            <td><b>Rp.<?php echo $data['harga']; ?>,-</b></td>
            <td><?php echo $data['keterangan']; ?></td>
          </tr>
          <?php } ?>
        </table>
        
    </div>
    <br>

    <!-- Footer -->
    <?php include 'layout/footer.php'; ?>

    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
</body>
</html>