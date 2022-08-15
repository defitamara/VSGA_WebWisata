<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$tiket = $_POST['tiket'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

$input = "INSERT INTO tiket VALUES(null,'$tiket','$harga','$keterangan',null)";

if(mysqli_query($koneksi, $input)){
    header("location:dataTiket.php?pesan=input");
} else{
	echo "ERROR: Could not able to execute $input. " . mysqli_error($koneksi);
}

?>