<?php
include 'koneksi.php';

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

// ==================== QUERY DATA GRAFIK ====================
$q_grafik = mysqli_query($koneksi, "
    SELECT DATE(waktu_bayar) AS tanggal, SUM(total) AS total_harian
    FROM pembayaran
    WHERE DATE(waktu_bayar) BETWEEN '$dari' AND '$sampai'
    GROUP BY DATE(waktu_bayar)
");

$tanggal = [];
$total = [];

while ($row = mysqli_fetch_assoc($q_grafik)) {
    $tanggal[] = $row['tanggal'];
    $total[] = $row['total_harian'];
}

// ==================== QUERY REKAP ====================
$q_rekap = mysqli_query($koneksi, "
    SELECT p.id, p.waktu_bayar, p.total, t.pelanggan_id
    FROM pembayaran p
    JOIN transaksi t ON p.transaksi_id = t.id
    WHERE DATE(p.waktu_bayar) BETWEEN '$dari' AND '$sampai'
");

// ==================== TOTAL KUMULATIF ====================
$q_total = mysqli_query($koneksi, "
    SELECT COUNT(*) AS jumlah_transaksi, SUM(total) AS total_semua
    FROM pembayaran
    WHERE DATE(waktu_bayar) BETWEEN '$dari' AND '$sampai'
");
$totalData = mysqli_fetch_assoc($q_total);
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>

<!-- CDN Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

<h2>Laporan Penjualan (<?= $dari ?> s/d <?= $sampai ?>)</h2>

<!-- <a href="export_excel.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>">Export Excel</a>
<button onclick="window.print()">Print</button> -->
<button onclick="window.print()" class="no-print">Cetak</button>
<button onclick="window.location='export_excel.php'">Export to Excel</button>
<style>
        @media print{
            .no-print{
                display: none;
            }
        }
    </style>

<hr>

<!-- ====================== GRAFIK ====================== -->
<h3>Grafik Pendapatan</h3>
<canvas class="grafik-n" id="grafik" width="600" height="250"></canvas>



<script>
var ctx = document.getElementById('grafik').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($tanggal) ?>,
        datasets: [{
            label: 'Pendapatan Harian',
            data: <?= json_encode($total) ?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});

window.addEventListener('beforeprint', () => {
    const canvas = document.getElementById('grafik');
    const img = document.createElement('img');
    img.src = canvas.toDataURL();
    img.id = "chart-print";

    canvas.style.display = "none";
    canvas.after(img);
});

window.addEventListener('afterprint', () => {
    const canvas = document.getElementById('grafik');
    const img = document.getElementById('chart-print');

    if (img) img.remove();
    canvas.style.display = "block";
});

</script>

<hr>

<!-- ====================== REKAP ====================== -->
<h3>Rekap Transaksi</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Pelanggan</th>
    </tr>

<?php while ($r = mysqli_fetch_assoc($q_rekap)) { ?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?= $r['waktu_bayar'] ?></td>
    <td><?= number_format($r['total']) ?></td>
    <td><?= $r['pelanggan_id'] ?></td>
</tr>
<?php } ?>

</table>

<hr>

<!-- ====================== TOTAL ====================== -->
<h3>Total Kumulatif</h3>
<p><b>Jumlah Transaksi:</b> <?= $totalData['jumlah_transaksi'] ?></p>
<p><b>Total Pendapatan:</b> Rp <?= number_format($totalData['total_semua']) ?></p>

</body>
</html>
