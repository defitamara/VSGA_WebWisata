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
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'layout/navbar.php'; ?>

    <div class="container">
      <h3>Informasi Harga Tiket</h3>
      <p>On Going ..</p>
    </div>

    <!-- Footer -->
    <!-- <?php include 'layout/footer.php'; ?> -->

    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
</body>
</html>