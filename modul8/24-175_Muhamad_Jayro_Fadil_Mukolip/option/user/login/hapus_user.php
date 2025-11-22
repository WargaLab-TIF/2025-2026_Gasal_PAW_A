<?php
require "../conn.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM user WHERE id_user = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>