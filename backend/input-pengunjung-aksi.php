<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$nama_pengunjung = $_POST['nama_pengunjung'];
$tanggal = $_POST['tanggal'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jk'];
$usia = $_POST['usia'];
$agama = $_POST['agama'];
$testimoni = $_POST['testimoni'];

$input = "INSERT INTO pengunjung VALUES(null,'$nama_pengunjung','$tanggal','$alamat','$jenis_kelamin','$usia','$agama','$testimoni')";

if(mysqli_query($koneksi, $input)){
    header("location:dataPengunjung.php?pesan=input");
} else{
	echo "ERROR: Could not able to execute $input. " . mysqli_error($koneksi);
}

?>