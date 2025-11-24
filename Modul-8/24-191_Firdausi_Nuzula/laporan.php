<?php
session_start(); 
require "conn.php";

$mulai = isset($_GET['mulai']) ? $_GET['mulai'] : "";
$selesai = isset($_GET['selesai']) ? $_GET['selesai'] : "";

include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="laporan.css">
</head>
<body>

<div class="container">

<form method="GET">
    <input type="date" name="mulai" required value="<?= $mulai ?>">
    <input type="date" name="selesai" required value="<?= $selesai ?>">

    <button type="submit">Tampilkan</button>
</form>

<form action="">
    <button type="button" onclick="window.print()">Cetak</button>

    <a href="export_excel.php?mulai=<?= $mulai ?>&selesai=<?= $selesai ?>">
        <button type="button">Excel</button>
    </a>
</form>
<hr>

<?php 
if ($mulai && $selesai) {

    // AMBIL DATA
    $query = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian
              FROM transaksi
              WHERE DATE(waktu_transaksi) BETWEEN '$mulai' AND '$selesai'
              GROUP BY DATE(waktu_transaksi)
              ORDER BY tanggal ASC";

    $result = mysqli_query($conn, $query);
    $rekap = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // TOTAL TRANSAKSI & TOTAL PENDAPATAN
    $q_total = "SELECT COUNT(*) AS jml_pelanggan, SUM(total) AS total_semua
                FROM transaksi
                WHERE DATE(waktu_transaksi) BETWEEN '$mulai' AND '$selesai'";

    $get_total = mysqli_query($conn, $q_total);
    $total = mysqli_fetch_assoc($get_total);

    $label = [];
    $nilai = [];

    foreach ($rekap as $r) {
        $label[] = $r['tanggal'];
        $nilai[] = $r['total_harian'];
    }
?>

<br>
<h3>Grafik Penjualan</h3>
<canvas id="chart"></canvas>

<script>
const ctx = document.getElementById('chart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($label) ?>,
        datasets: [{
            label: 'Total Penjualan',
            data: <?= json_encode($nilai) ?>,
            backgroundColor: 'grey',
            borderColor: 'black',
            borderWidth: 2
        }]
    },
    options: {
        scales: { 
            y: { beginAtZero: true }
        }
    }
});
</script>

<hr>
<br>

<h3>Rekap Penjualan Harian</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php 
    $no = 1;
    foreach ($rekap as $r) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>Rp <?= $r['total_harian'] ?></td>
            <td><?= $r['tanggal'] ?></td>
        </tr>
    <?php } ?>
</table>

<br>
<hr>
<br>

<h3>Total Keseluruhan</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
        <td><?= $total['jml_pelanggan'] ?> Orang</td>
        <td>Rp <?= $total['total_semua'] ?></td>
    </tr>
</table>

<?php } ?>

</body>
</html>
