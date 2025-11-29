<?php
include 'koneksi.php';

function format_rupiah($angka) {
    return "Rp. " . number_format($angka, 0, ',', '.');
}

$query_semua_data = "
    SELECT 
        t.id, 
        t.waktu_transaksi, 
        p.nama AS nama_pelanggan, 
        t.total 
    FROM 
        transaksi t
    LEFT JOIN 
        pelanggan p ON t.pelanggan_id = p.id
    ORDER BY 
        t.waktu_transaksi DESC, t.id DESC
";

$result_semua_data = mysqli_query($conn, $query_semua_data);

if (!$result_semua_data) {
    die("Query Error: " . mysqli_error($conn) . "<br>Pastikan tabel 'pelanggan' dan kolom 'nama' sudah ada di database.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Laporan & Data Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">Kembali ke Dashboard</a>
    </div>
    </nav>

    <div class="container">

        <div class="filter-box">
            <h2>Filter Laporan Penjualan</h2>
            <form action="laporan.php" method="GET" class="filter-form">
                <div>
                    <label>Dari Tanggal:</label>
                    <input type="date" name="start_date" required>
                </div>
                <div>
                    <label>Sampai Tanggal:</label>
                    <input type="date" name="end_date" required>
                </div>
                <button type="submit">Tampilkan Laporan</button>
            </form>
        </div>

        <div class="data-table-container">
            <h2>Semua Data Transaksi</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Waktu Transaksi</th>
                        <th>Nama Pelanggan</th> <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result_semua_data) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result_semua_data)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo date("d M Y H:i", strtotime($row['waktu_transaksi'])); ?></td>
                            
                            <td><?php echo !empty($row['nama_pelanggan']) ? $row['nama_pelanggan'] : '-'; ?></td>
                            
                            <td><?php echo format_rupiah($row['total']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center;">Belum ada data transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>