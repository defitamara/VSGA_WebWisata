<?php 

// Memanggil koneksi.php
include '../koneksi.php';

date_default_timezone_set('Asia/Jakarta');
$id_artikel = $_POST['id_artikel'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$isi = $_POST['isi'];

$lokasiGbr = $_FILES['gambar']['tmp_name'];
$namaGbr = $_FILES['gambar']['name'];

if($lokasiGbr==""){
    mysqli_query($koneksi,"UPDATE artikel SET judul='$judul', penulis='$penulis',
    isi='$isi'WHERE id_artikel='$id_artikel' ");
    header("location:dataArtikel.php?pesan=update");
}else{
    // $ambilGambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
    move_uploaded_file($lokasiGbr, 'images/artikel/'.$namaGbr);
    $sql = "UPDATE artikel SET judul='$judul', penulis='$penulis', gambar='$namaGbr',
    isi='$isi'WHERE id_artikel='$id_artikel' ";
    if(mysqli_query($koneksi, $sql)){
        header("location:dataArtikel.php?pesan=update");
    } 
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
        }
}

?>