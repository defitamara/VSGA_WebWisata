<?php
session_start();

$_SESSION['id']='';
$_SESSION['nama']='';
$_SESSION['email']='';
$_SESSION['password']='';
$_SESSION['id_role']='';

unset($_SESSION['id']);
unset($_SESSION['nama']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['id_role']);

session_unset();
session_destroy();
header('Location:index.php');
?>