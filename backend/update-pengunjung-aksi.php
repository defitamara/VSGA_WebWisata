<?php 

// Memanggil koneksi.php
include '../koneksi.php';

$id = $_POST['id_pengunjung'];
$nama_pengunjung = $_POST['nama_pengunjung'];
$tanggal = $_POST['tanggal'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jk'];
$usia = $_POST['usia'];
$agama = $_POST['agama'];
$testimoni = $_POST['testimoni'];

if($tanggal == ""){
    mysqli_query($koneksi,"UPDATE pengunjung SET nama_pengunjung='$nama_pengunjung', alamat='$alamat', jenis_kelamin='$jenis_kelamin',
    usia='$usia', agama='$agama', testimoni='$testimoni' WHERE id_pengunjung='$id' ");
    header("location:dataPengunjung.php?pesan=update");
} else {
    mysqli_query($koneksi,"UPDATE pengunjung SET nama_pengunjung='$nama_pengunjung', tanggal='$tanggal', alamat='$alamat', jenis_kelamin='$jenis_kelamin',
    usia='$usia', agama='$agama', testimoni='$testimoni' WHERE id_pengunjung='$id' ");
    header("location:dataPengunjung.php?pesan=update");
}

?>