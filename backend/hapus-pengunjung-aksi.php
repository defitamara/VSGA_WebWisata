<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$id = $_GET['id_pengunjung'];

mysqli_query($koneksi,"DELETE FROM pengunjung WHERE id_pengunjung='$id'");
 
header("location:dataPengunjung.php?pesan=hapus");

?>