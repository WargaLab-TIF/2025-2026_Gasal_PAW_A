<?php
require 'config.php';

$sql_table = "
    SELECT 
        t.id AS TransaksiID, 
        t.waktu_transaksi, 
        p.nama AS NamaPelanggan, 
        t.total
    FROM 
        transaksi t
    JOIN 
        pelanggan p ON t.pelanggan_id = p.id
    ORDER BY 
        t.waktu_transaksi DESC
    LIMIT 5";

$result_table = mysqli_query($conn, $sql_table);
$transaksi_terakhir = mysqli_fetch_all($result_table, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan (Modul 7)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f7f9fcac; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #0b1804ff; border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
        .controls { display: flex; gap: 15px; margin-bottom: 20px; }
        .controls a, .controls button { padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold; cursor: pointer; transition: background-color 0.3s; }
        .btn-print { background-color: #0724ffff; color: black; border: none; }
        .btn-export { background-color: #a73b28ff; color: white; border: none; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #eeeeeeff; padding: 10px; text-align: left; }
        th { background-color: #11d6e0ff; }

        @media print {
            .controls, .no-print { display: none !important; }
            body { background: white; }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Laporan Kinerja Penjualan</h2>

    <div class="controls no-print">
        <button class="btn-print" onclick="window.print()">Cetak Laporan (PDF/Kertas)</button>
        <a href="export_excel.php" class="btn-export">Ekspor Data (Excel/XLS)</a>
    </div>

    <div style="width: 80%; margin: 30px auto;">
        <h3>Rekap Laporan Penjualan</h3>
        <canvas id="salesChart"></canvas>
    </div>
    <hr>

    <h3>Transaksi Akhir</h3>
    <table class="table-striped">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Waktu</th>
                <th>Pelanggan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi_terakhir as $t): ?>
            <tr>
                <td><?= $t['TransaksiID']; ?></td>
                <td><?= $t['waktu_transaksi']; ?></td>
                <td><?= htmlspecialchars($t['NamaPelanggan']); ?></td>
                <td>Rp <?= number_format($t['total'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
async function loadChart() {

    const response = await fetch('chart_data.php');
    const data = await response.json();

    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [{
                label: 'Total Penjualan (Rp)',
                data: data.data,
                backgroundColor: 'rgba(12, 144, 232, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

loadChart();
</script>
</body>
</html>
<?php mysqli_close($conn); ?>