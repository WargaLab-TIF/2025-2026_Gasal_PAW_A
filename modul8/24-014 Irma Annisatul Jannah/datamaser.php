<?php
require 'protect.php';
require 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Suplier</title>

<style>

body {
    font-family: Arial, sans-serif;
    background: #FDE4F2;
    margin: 0;
    padding: 0;
}

/* NAVBAR */
.navbar {
    background: #ff99d1ff;
    padding: 15px;
    margin-bottom: 20px;
    text-align: left;
}

.navbar a {
    color: #242424ff;
    text-decoration: none;
    font-weight: bold;
    padding: 0 8px;
}

.navbar a:hover {
    color: #d20073ff;
}

.navbar b {
    padding: 0 8px;
    color: #333;
}

/* TITLE */
h2 {
    text-align: center;
    margin-top: 30px;
    color: #6a006e;
}

/* TABLE WRAPPER */
.table-box {
    width: 90%;
    margin: 30px auto;
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* TABLE STYLE */
table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #f8c8e3;
    padding: 12px;
    color: #6a006e;
}

td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

tr:hover {
    background: #ffe9f4;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="home.php">Home</a>
    <a href="transaksi.php">Suplier</a>
    <a href="laporan.php">Laporan</a>
    |
    <a href="logout.php" style="color:red;">Logout</a>
</div>

<h2>Data Suplier</h2>

<div class="table-box">
<table>
    <tr>
        <th>ID Suplier</th>
        <th>Nama Suplier</th>
        <th>Alamat</th>
        <th>No HP</th>
    </tr>

<?php

$sql = "SELECT * FROM supplier ORDER BY supplier_id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['supplier_id']}</td>
            <td>{$row['nama_supplier']}</td>
            <td>{$row['alamat']}</td>
            <td>{$row['telepon']}</td>
        </tr>";
}
?>
</table>
</div>

</body>
</html>
