<?php 
// Menghubungkan database

$server = "localhost";
$user = "root";
$password ="";
$nama_database = "vsga_tirta_agung";

$koneksi = mysqli_connect($server, $user, $password, $nama_database);
if(!$koneksi){
    die("connection failed: ".mysqli_connect_error());
}
?>