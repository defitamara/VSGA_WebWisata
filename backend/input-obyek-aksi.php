<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$nama_obyek = $_POST['nama_obyek'];
$id_kategori = $_POST['id_kategori'];
$deskripsi = $_POST['deskripsi'];
$info_tambahan = $_POST['info_tambahan'];

$lokasiGbr = $_FILES['gambar']['tmp_name'];
$namaGbr = $_FILES['gambar']['name'];

if($lokasiGbr==""){
    echo "<script>alert(' Anda harus memasukkan gambar, silahkan ulangi input data.');
    header('location:tambahDataOW.php');</script>";
}else{
    // $ambilGambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
    move_uploaded_file($lokasiGbr, 'images/obyekwisata/'.$namaGbr);
    $sql = "INSERT INTO obyekwisata VALUES (null, '$id_kategori', '$nama_obyek', '$deskripsi', '$namaGbr', '$info_tambahan')";
    if(mysqli_query($koneksi, $sql)){
        header("location:dataObyekWisata.php?pesan=input");
    } 
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
        }
}

?>

<!-- Catatan 13 Oktober 2022 -->
<!-- Tambah data belum ditesting, id kategori belum dikunci.
Harusnya ketika id kategori A sudah terhubung dengan obyek A, maka kategori ini tidak tampil di select 
dan tombol simpan untuk tambah data dinonaktifkan -->