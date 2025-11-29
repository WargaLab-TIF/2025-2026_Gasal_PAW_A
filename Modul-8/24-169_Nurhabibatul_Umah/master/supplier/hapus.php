<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location:../../login.php");
    exit;
}
require '../../config.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM supplier WHERE id=$id";
    if (mysqli_query($conn, $query)){
        header('Location: index.php');
    }else{
        die('Gagal Menghapus');
    }
}else{
    die("Akses dilarang");
}
?>