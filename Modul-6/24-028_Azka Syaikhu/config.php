<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjualan";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_autocommit($conn, FALSE);

mysqli_set_charset($conn, "utf8mb4");

function display_alert($message, $type = 'success') {
    $style = ($type === 'success') ? 'background-color: #d4edda; color: #155724;' : 'background-color: #f8d7da; color: #721c24;';
    echo "<div style='{$style} padding: 10px; margin: 10px 0; border-radius: 4px;'>$message</div>";
}
?>