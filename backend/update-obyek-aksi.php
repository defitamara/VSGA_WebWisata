<?php 

// Memanggil koneksi.php
include '../koneksi.php';

date_default_timezone_set('Asia/Jakarta');
$id_obyek = $_POST['id_obyek'];
$nama_obyek = $_POST['nama_obyek'];
$deskripsi = $_POST['deskripsi'];
$info_tambahan = $_POST['info_tambahan'];

$lokasiGbr = $_FILES['gambar']['tmp_name'];
$namaGbr = $_FILES['gambar']['name'];

if($lokasiGbr==""){
    mysqli_query($koneksi,"UPDATE obyek_wisata SET nama_obyek='$nama_obyek', deskripsi='$deskripsi',
    info_tambahan='$info_tambahan' WHERE id_obyek='$id_obyek' ");
    header("location:dataObyekWisata.php?pesan=update");
}else{
    // $ambilGambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
    move_uploaded_file($lokasiGbr, 'images/obyekwisata/'.$namaGbr);
    $sql = "UPDATE artikel SET nama_obyek='$nama_obyek', deskripsi='$deskripsi', gambar_utama='$namaGbr',
    info_tambahan='$info_tambahan' WHERE id_obyek='$id_obyek' ";
    if(mysqli_query($koneksi, $sql)){
        header("location:dataObyekWisata.php?pesan=update");
    } 
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
        }
}

?>