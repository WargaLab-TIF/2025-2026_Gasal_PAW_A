<?php
session_start();
include 'koneksi.php';

if(!isset($_POST['username']) || !isset($_POST['password'])){
    header('location:login.php');
    exit;
}

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$q = mysqli_query($koneksi, "SELECT * FROM usser WHERE username='$username' AND password='$password' LIMIT 1");
$cek = mysqli_num_rows($q);

if($cek > 0){
    $data = mysqli_fetch_assoc($q);

    $_SESSION['username'] = $data['username'];
    $_SESSION['nama']     = $data['nama'];
    $_SESSION['level']    = $data['level'];
    $_SESSION['status']   = "login";

    header("location:index.php");
}else{
    echo "<script>alert('Login gagal! Periksa username/password.');window.location='login.php';</script>";
}
?>
