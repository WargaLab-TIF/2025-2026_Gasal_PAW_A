<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Reporting Penjualan</title>
</head>
<body>
<h2>Filter Laporan Penjualan</h2>
<!-- <link rel="stylesheet" href="style.css"> -->


<form action="laporan.php" method="GET">
    <label>Dari Tanggal</label>
    <input type="date" name="dari" required>

    <label>Sampai Tanggal</label>
    <input type="date" name="sampai" required>

    <button type="submit">Tampilkan</button>
</form>



</body>
</html>
