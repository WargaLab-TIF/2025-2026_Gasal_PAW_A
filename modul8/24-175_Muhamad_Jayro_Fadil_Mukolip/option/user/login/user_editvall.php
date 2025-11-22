<?php
session_start();
require "../conn.php";
require 'vall.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int) $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $level = tinkatan($role, $tingkatan);
    $tlp = $_POST['Hp'];
    $almt = $_POST['alamat'];
    $password = md5($_POST['password']);


    $sql = "UPDATE user SET nama='$nama', hp='$tlp', alamat='$almt', role='$role', level='$level', password='$password' WHERE id_user=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}