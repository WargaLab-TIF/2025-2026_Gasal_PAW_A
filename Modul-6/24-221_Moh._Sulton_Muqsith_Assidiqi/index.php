<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transaksi</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
        a { text-decoration: none; background: #2b79c2; color: white; padding: 6px 10px; border-radius: 4px; }
        a:hover { background: #1e5a8b; }
    </style>
</head>
<body>

<h2>Daftar Transaksi (Master - Detail)</h2>
<a href="transaksi_create.php">+ Tambah Transaksi</a>

<table>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Pelanggan</th>
        <th>Total</th>
    </tr>
    <?php
    $no = 1;
    $query = mysqli_query($conn, "SELECT * FROM nota ORDER BY id_nota DESC");
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['tanggal']}</td>
                <td>{$row['pelanggan']}</td>
                <td>Rp " . number_format($row['total'], 0, ',', '.') . "</td>
              </tr>";
        $no++;
    }
    ?>
</table>

</body>
</html>