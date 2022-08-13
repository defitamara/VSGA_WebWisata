<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$id = $_GET['id_artikel'];

mysqli_query($koneksi,"DELETE FROM artikel WHERE id_artikel='$id'");
 
header("location:dataArtikel.php?pesan=hapus");

?>