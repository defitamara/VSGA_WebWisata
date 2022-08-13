<?php
require 'koneksi.php';
session_start();

// Cek apakah session aktif/sudah ada akun login
if(isset($_SESSION["user"])){
    header('location:backend/dashboard.php');
    exit;
}

if(isset($_POST['register'])){
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $id_role = $_POST['id_role'];

    $register = "INSERT INTO user VALUES (null,'$nama','$jenis_kelamin','$alamat','$email','$password','$id_role')";
    mysqli_query($koneksi, $register);

    if(mysqli_affected_rows($koneksi) > 0){
        $_SESSION['user'] = true;
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;
        
        echo "<script> alert('Selamat, Registrasi anda berhasil!')</script>";
        echo "<script> window.location.href = 'backend/dashboard.php' </script>";
        // header("location:indexTirta.php");
    } else {
        $error = true;
        return;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/bootstrap.css">

    <style>
        body {
            background-image: url("frontend/images/tirta.jpg");
            background-size: cover;
        }
        .card {
            padding:35px;
            margin: 5% 25%;
            width:600px;
            
        }
        .link {
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
        <div class="card-title">
            <h3>Register Admin</h3>
        </div>
        <!-- Script pemberitahuan 2 -->
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger">
                Sorry, your registration failed!
            </div>
        <?php endif; ?>
        <form action="" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama" name="nama" required
                    oninvalid="this.setCustomValidity('Nama harus diisi')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-control">
                        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
                        <input type="radio" name="jk" value="Perempuan" required> Perempuan
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Masukkan alamat anda" required
                    oninvalid="this.setCustomValidity('Alamat harus diisi')" oninput="setCustomValidity('')"></textarea>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email" name="email" required
                    oninvalid="this.setCustomValidity('Email harus diisi')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Masukkan password" name="password" required
                    oninvalid="this.setCustomValidity('Password harus diisi')" oninput="setCustomValidity('')">
                </div>

                <!-- Register otomatis sebagai admin (role = 1) -->
                <input type="hidden" name="id_role" value="1">
                
                <a href="index.php" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary" name="register">Daftar</button>
                <div class="link">
                    <small>Already have an account? <a href="login.php">Login</a></small>
                </div>
            </form>
        </div>  
    </div>
</body>
</html>