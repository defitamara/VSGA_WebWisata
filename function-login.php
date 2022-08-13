<?php

include 'koneksi.php';

// Function Login
function loginUser($data){
    global $koneksi;

    $email = $data['email'];
    $password = $data['password'];

    $query = "SELECT * from user WHERE email='$email'";
    $result = mysqli_query($koneksi,$query);
    $row = mysqli_fetch_assoc($result);

    // Mengecek apakah email yang diinputkan terdaftar di database
    if(isset($row['email'])){
        // Validasi email input dan database
        if($email === $row['email']){
            // Validasi password input dan database
            $hash_password = $row['password'];
            if(password_verify($password, $hash_password)){
                if($row['id_role'] == 1) {
                    $_SESSION['user'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['nama'] = $row['nama'];

                    echo "<script> alert('Selamat anda berhasil Login!')</script>";
                    echo "<script> window.location.href = 'backend/dashboard.php' </script>";
                    // header("Location:indexTirta.php");
                    // return;
                } else{
                    // Bukan akun admin
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}