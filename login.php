<?php
require 'function-login.php';
session_start();

// Cek apakah session aktif/sudah ada akun login
if(isset($_SESSION["user"])){
    header('location:backend/dashboard.php');
    exit;
}

// Cek apakah user menekan tombol login
if(isset($_POST['login'])){
    if(loginUser($_POST) == false){
        $error = true;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/bootstrap.css">

    <style>
        body {
            background-image: url("frontend/images/tirta.jpg");
            background-size: cover;
        }
        .card {
            padding:35px;
            margin: 15% 30%;
            width:400px;
            
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
            <h3>Login Admin</h3>
        </div>
        <!-- Script pemberitahuan 2 -->
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger">
                Wrong email or password!
            </div>
        <?php endif; ?>
        <form action="" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email" name="email" required
                    oninvalid="this.setCustomValidity('Email harus valid')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Masukkan password" name="password" required
                    oninvalid="this.setCustomValidity('Password harus diisi')" oninput="setCustomValidity('')">
                </div>
                
                <a href="index.php" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary" name="login">Login</button><br>
                <div class="link">
                    <small>Don't have an account yet? <a href="register.php">Register</a></small>
                </div>
            </form>
        </div>        
    </div>
</body>
</html>

<!-- Email dan password dapat dilihat di akun.txt -->
<!-- Pastikan kita sudah mengimport database yang ada di folder database -->