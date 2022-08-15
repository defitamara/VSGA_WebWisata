<?php 

// Memanggil koneksi.php
include '../koneksi.php';

date_default_timezone_set('Asia/Jakarta');
$code = date('His');
$id_artikel = "ART$code";
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$penulis = $_POST['penulis'];
// $gambar = $_POST['gambar'];
$isi = $_POST['isi'];

$lokasiGbr = $_FILES['gambar']['tmp_name'];
$namaGbr = $_FILES['gambar']['name'];

if($lokasiGbr==""){
    echo "<script>alert(' Anda harus memasukkan gambar, silahkan ulangi input data.');
    header('location:tambahDatArtikel.php');</script>";
}else{
    // $ambilGambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
    move_uploaded_file($lokasiGbr, 'images/artikel/'.$namaGbr);
    $sql = "INSERT INTO artikel VALUES ('$id_artikel', '$tanggal', '$penulis', '$judul', '$namaGbr', '$isi', null)";
    if(mysqli_query($koneksi, $sql)){
        header("location:dataArtikel.php?pesan=input");
    } 
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
        }
}

?>