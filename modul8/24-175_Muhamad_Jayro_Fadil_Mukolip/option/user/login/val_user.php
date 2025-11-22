<?php
require '../conn.php';
require 'vall.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $level = tinkatan($role, $tingkatan);
    $tlp = $_POST['Hp'];
    $almt = $_POST['alamat'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO user (nama, hp, alamat, username, password, level, role) VALUES ('$nama', '$tlp', '$almt', '$username', '$password', '$level', '$role')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>