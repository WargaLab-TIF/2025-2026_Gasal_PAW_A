<?php
session_start();
require "conn.php";
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $sql="DELETE FROM user WHERE id_user = $id_user";

    if (mysqli_query($conn,$sql)) {
    } else {
        echo "Error: Gagal menghapus data. " . mysqli_error($conn);
    }

}

header("Location: index.php");
exit;

?>