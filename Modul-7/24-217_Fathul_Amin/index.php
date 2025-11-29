<?php
include 'config.php';

function format_rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

$query = "SELECT t.id, t.waktu_transaksi, p.nama AS nama_pelanggan, t.total 
          FROM transaksi t 
          LEFT JOIN pelanggan p ON t.pelanggan_id = p.id 
          ORDER BY t.waktu_transaksi DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>DATA TRANSAKSI</h2>

        <form action="rentang_laporan.php" method="GET" class="filter-form">

            <table class="filter-table">
                <tr>
                    <td><label>Mulai Tanggal:</label></td>
                </tr>
                <tr>
                    <td><input type="date" name="start_date" required></td>
                </tr>

                <tr>
                    <td><label>Hingga Tanggal:</label></td>
                </tr>
                <tr>
                    <td><input type="date" name="end_date" required></td>
                </tr>

                <tr>
                    <td>
                        <button type="submit">Lihat Laporan</button>
                    </td>
                </tr>
            </table>

        </form>

        <h3>Riwayat Transaksi</h3>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal & Waktu</th>
                    <th>Pelanggan</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date("d/m/Y H:i", strtotime($row['waktu_transaksi'])); ?></td>
                    <td><strong><?= !empty($row['nama_pelanggan']) ? $row['nama_pelanggan'] : '-'; ?></strong></td>
                    <td><?= format_rupiah($row['total']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</body>
</html>