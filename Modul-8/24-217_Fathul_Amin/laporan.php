<?php 
include "header.php";
include 'config.php';

$start = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$end = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-t');

$sql_chart = "SELECT DATE(waktu_transaksi) as tgl, SUM(total) as omzet 
              FROM transaksi 
              WHERE DATE(waktu_transaksi) BETWEEN ? AND ? 
              GROUP BY tgl ORDER BY tgl ASC";

$stmt = $conn->prepare($sql_chart);
$stmt->bind_param("ss", $start, $end);
$stmt->execute();
$res_chart = $stmt->get_result();

$labels = [];
$data = [];
$table_data = [];
while ($row = $res_chart->fetch_assoc()) {
    $table_data[] = $row;
    $labels[] = date("d M", strtotime($row['tgl']));
    $data[] = $row['omzet'];
}

$sql_total = "SELECT COUNT(DISTINCT pelanggan_id) as jum_cust, SUM(total) as total_uang 
              FROM transaksi 
              WHERE DATE(waktu_transaksi) BETWEEN ? AND ?";

$stmt2 = $conn->prepare($sql_total);
$stmt2->bind_param("ss", $start, $end);
$stmt2->execute();
$summary = $stmt2->get_result()->fetch_assoc();

function rp($x)
{
    return "Rp " . number_format($x, 0, ',', '.');
}


?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan per-periode</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<br>
<body>
    
    <div class="container">
        <h2>LAPORAN PENJUALAN</h2>

        <form action="laporan.php" method="GET" class="filter-form">

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

        <p style="text-align:center; margin-top:-15px; color:#7f8c8d;">
            <?= date("d F Y", strtotime($start)) ?> - <?= date("d F Y", strtotime($end)) ?>
        </p>

        <div class="header-actions">
            <br><br>
            <button onclick="window.print()" class="btn btn-print">Cetak PDF</button>
            <a href="excel.php?start_date=<?= $start ?>&end_date=<?= $end ?>" class="btn btn-excel">Export Excel</a>
            <br><br>
        </div>

        <div class="chart-container">
            <canvas id="reportChart"></canvas>
        </div>

        <table class="summary-table">
            <thead>
                <tr>
                    <th>Total Pendapatan</th>
                    <th>Jumlah Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= rp($summary['total_uang']) ?></td>
                    <td><?= $summary['jum_cust'] ?> Orang</td>
                </tr>
            </tbody>
        </table>

        <h3>Rincian Harian</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1;
                foreach ($table_data as $d): ?>
                    <tr>
                        <td><?= $n++ ?></td>
                        <td><?= date("d F Y", strtotime($d['tgl'])) ?></td>
                        <td><?= rp($d['omzet']) ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($table_data)): ?>
                    <tr>
                        <td colspan="3" style="text-align:center">Tidak ada data.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        const ctx = document.getElementById('reportChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Omzet Harian',
                    data: <?= json_encode($data) ?>,
                    backgroundColor: 'rgba(254, 41, 41, 1)',
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0f0f0'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>