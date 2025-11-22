<?php
require 'protect.php';
require 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Transaksi</title>

<style>

body {
    font-family: Arial, sans-serif;
    background: #FDE4F2;
    margin: 0;
    padding: 0;
}


.navbar {
    background: #ff99d1ff;
    padding: 15px;
    margin-bottom: 20px;
    text-align: left;
    font-family: Arial;
}

.navbar a {
    color: #242424ff;        /* warna ungu soft */
    text-decoration: none;
    font-weight: bold;
    padding: 0 8px;
}

.navbar a:hover {
    color: #d20073ff;        /* pink terang saat hover */
}

.navbar b {
    padding: 0 8px;
    color: #333;
}

h2 {
    text-align: center;
    margin-top: 30px;
    color: #6a006e;
}


.table-box {
    width: 90%;
    margin: 30px auto;
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

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


<div class="navbar">
    <a href="home.php">Home</a>
    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>
    |
    <a href="logout.php" style="color:red;">Logout</a>
</div>

<h2>Data Transaksi</h2>

<div class="table-box">
<table>
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Pelanggan</th>
        <th>Pegawai</th>
        <th>Total</th>
    </tr>

<?php
$sql = "SELECT * FROM transaksi ORDER BY transaksi_id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['transaksi_id']}</td>
            <td>{$row['tanggal']}</td>
            <td>{$row['pelanggan_id']}</td>
            <td>{$row['pegawai_id']}</td>
            <td>Rp " . number_format($row['total']) . "</td>
        </tr>";
}
?>
</table>
</div>

</body>
</html>
