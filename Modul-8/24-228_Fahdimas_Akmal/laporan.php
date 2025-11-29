<?php
include 'koneksi.php';


$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-t');


if (isset($_GET['action']) && $_GET['action'] == 'excel') {
    
    $filename = "Laporan_Penjualan_" . $start_date . "_sampai_" . $end_date . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    
    $query_excel = "SELECT DATE(waktu_transaksi) AS tanggal_harian, SUM(total) AS total_harian 
                    FROM transaksi 
                    WHERE DATE(waktu_transaksi) BETWEEN ? AND ? 
                    GROUP BY tanggal_harian ORDER BY tanggal_harian ASC";
    $stmt_excel = $conn->prepare($query_excel);
    $stmt_excel->bind_param("ss", $start_date, $end_date);
    $stmt_excel->execute();
    $result_excel = $stmt_excel->get_result();

    
    $query_total_ex = "SELECT COUNT(DISTINCT pelanggan_id) AS jumlah_pelanggan, SUM(total) AS total_pendapatan 
                       FROM transaksi 
                       WHERE DATE(waktu_transaksi) BETWEEN ? AND ?";
    $stmt_total_ex = $conn->prepare($query_total_ex);
    $stmt_total_ex->bind_param("ss", $start_date, $end_date);
    $stmt_total_ex->execute();
    $data_total_ex = $stmt_total_ex->get_result()->fetch_assoc();

    
    echo "<h3>Rekap Laporan Penjualan ($start_date s/d $end_date)</h3>";
    echo "<table border='1'><thead><tr><th>No</th><th>Tanggal</th><th>Total</th></tr></thead><tbody>";
    $no = 1;
    while ($row = $result_excel->fetch_assoc()) {
        echo "<tr><td>" . $no++ . "</td><td>" . date("d M Y", strtotime($row['tanggal_harian'])) . "</td><td>Rp " . number_format($row['total_harian'], 0, ',', '.') . "</td></tr>";
    }
    echo "</tbody></table><br>";
    echo "<table border='1'><tr><td>Jml Pelanggan</td><td>" . $data_total_ex['jumlah_pelanggan'] . "</td></tr><tr><td>Total Pendapatan</td><td>Rp " . number_format($data_total_ex['total_pendapatan'], 0, ',', '.') . "</td></tr></table>";
    exit;
}


$query_rekap = "SELECT DATE(waktu_transaksi) AS tanggal_harian, SUM(total) AS total_harian 
                FROM transaksi 
                WHERE DATE(waktu_transaksi) BETWEEN ? AND ? 
                GROUP BY tanggal_harian ORDER BY tanggal_harian ASC";
$stmt_rekap = $conn->prepare($query_rekap);
$stmt_rekap->bind_param("ss", $start_date, $end_date);
$stmt_rekap->execute();
$result_rekap = $stmt_rekap->get_result();

$chart_labels = []; $chart_data = []; $data_rekap = [];
while ($row = $result_rekap->fetch_assoc()) {
    $data_rekap[] = $row;
    $chart_labels[] = date("d M Y", strtotime($row['tanggal_harian'])); 
    $chart_data[] = $row['total_harian'];
}


$query_total = "SELECT COUNT(DISTINCT pelanggan_id) AS jumlah_pelanggan, SUM(total) AS total_pendapatan 
                FROM transaksi 
                WHERE DATE(waktu_transaksi) BETWEEN ? AND ?";
$stmt_total = $conn->prepare($query_total);
$stmt_total->bind_param("ss", $start_date, $end_date);
$stmt_total->execute();
$data_total = $stmt_total->get_result()->fetch_assoc();

function format_rupiah($angka) { return "Rp. " . number_format($angka, 0, ',', '.'); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Rekap Laporan Penjualan <br><small><?= date("d-m-Y", strtotime($start_date)); ?> s/d <?= date("d-m-Y", strtotime($end_date)); ?></small></h2>
        
        <div class="header-actions">
            <a href="index_laporan.php" class="btn btn-back">Kembali</a>
            <button onclick="window.print()" class="btn btn-print">Cetak</button>
            <a href="laporan.php?action=excel&start_date=<?= $start_date; ?>&end_date=<?= $end_date; ?>" class="btn btn-excel">Excel</a>
        </div>

        <div class="chart-container"><canvas id="myChart"></canvas></div>

        <div class="rekap-table">
            <h3>Rekap Harian</h3>
            <table>
                <thead><tr><th>No</th><th>Tanggal</th><th>Total</th></tr></thead>
                <tbody>
                    <?php if(count($data_rekap) > 0): ?>
                        <?php $no=1; foreach($data_rekap as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date("d M Y", strtotime($row['tanggal_harian'])); ?></td>
                            <td><?= format_rupiah($row['total_harian']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="3" style="text-align:center">Tidak ada data pada rentang tanggal ini.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="total-summary">
            <div><h4>Jumlah Pelanggan</h4><p><?= $data_total['jumlah_pelanggan']; ?> Orang</p></div>
            <div><h4>Jumlah Pendapatan</h4><p><?= format_rupiah($data_total['total_pendapatan']); ?></p></div>
        </div>
    </div>

    <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($chart_labels); ?>,
            datasets: [{ 
                label: 'Total Penjualan', 
                data: <?= json_encode($chart_data); ?>, 
                backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                borderColor: 'rgba(75, 192, 192, 1)', 
                borderWidth: 1 
            }]
        },
        options: { scales: { y: { beginAtZero: true } }, maintainAspectRatio: false }
    });
    </script>
</body>
</html>