<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location:../../login.php");
    exit;
}
require '../../config.php';

if (isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];

    $query = "DELETE FROM user WHERE id_user=$id_user";
    if (mysqli_query($conn, $query)){
        header('Location: index.php');
    }else{
        die('Gagal Menghapus');
    }
}else{
    die("Akses dilarang");
}
?>