<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$id = $_GET['id_tiket'];

mysqli_query($koneksi,"DELETE FROM tiket WHERE id_tiket='$id'");
 
header("location:dataTiket.php?pesan=hapus");

?>