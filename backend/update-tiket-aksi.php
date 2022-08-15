<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$id = $_POST['id_tiket'];
$tiket = $_POST['tiket'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"UPDATE tiket SET tiket='$tiket', harga='$harga', keterangan='$keterangan' 
WHERE id_tiket='$id' ");

header("location:dataTiket.php?pesan=update");

?>