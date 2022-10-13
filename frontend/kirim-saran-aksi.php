<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$komentar = $_POST['komentar'];

$input = "INSERT INTO kotak_saran VALUES(null,'$nama','$kontak','$komentar',null)";

if(mysqli_query($koneksi, $input)){
    // header("location:../index.php");
    echo "<script> alert('Terima kasih, saran anda berhasil dikirimkan!')</script>";
    echo "<script> window.location.href = '../index.php' </script>";
} else{
	echo "ERROR: Could not able to execute $input. " . mysqli_error($koneksi);
}

?>