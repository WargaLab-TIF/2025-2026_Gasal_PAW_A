<?php
require 'koneksi.php';

$tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : '';
$tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : '';

$dataTanggal = [];
$dataPendapatan = [];
$dataPelanggan = [];
$totalPendapatan = 0;
$totalPelanggan = 0;

if ($tgl_awal && $tgl_akhir) {
    $query = "SELECT 
                tanggal, 
                SUM(total) AS pendapatan,
                COUNT(DISTINCT pelanggan_id) AS jumlah_pelanggan
              FROM transaksi 
              WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'
              GROUP BY tanggal
              ORDER BY tanggal ASC";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $dataTanggal[]      = $row['tanggal'];
        $dataPendapatan[]   = $row['pendapatan'];
        $dataPelanggan[]    = $row['jumlah_pelanggan'];
        $totalPendapatan   += $row['pendapatan'];
        $totalPelanggan    += $row['jumlah_pelanggan'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendapatan</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    margin: 0;
    padding: 30px 0;
}

.container {
    width: 900px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(151, 55, 114, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 26px;
    font-weight: 600;
    color: #333;
}

form {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-bottom: 25px;
}

input[type="date"] {
    padding: 8px 12px;
    border: 1px solid #ff99d1ff;
    border-radius: 6px;
    outline: none;
    font-size: 14px;
}

.btn {
    padding: 8px 14px;
    background: #ff99d1ff;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.2s;
}

.btn-secondary {
    background: #c6257eff;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 25px;
    border-radius: 6px;
    overflow: hidden;
}

th {
    background: #ff99d1ff;
    color: white;
    padding: 12px;
    font-size: 15px;
}

td {
    padding: 10px;
    font-size: 14px;
    color: #141414ff;
}

tr:nth-child(even) {
    background: #f2f8ff;
}

#grafik {
    background: #f8f8f8;
    padding: 25px;
    border-radius: 10px;
    margin-top: 20px;
    border: 1px solid #ddd;
}

@media print {
    .btn, form {
        display: none;
    }
}
    </style>
</head>
<body>

<div class="container">
    <h2>Laporan Pendapatan</h2>

  
    <form method="GET">
        Dari: <input type="date" name="tgl_awal" required value="<?= $tgl_awal ?>">
        Sampai: <input type="date" name="tgl_akhir" required value="<?= $tgl_akhir ?>">
        <button class="btn" type="submit">Cari</button>
    </form>

    <?php if ($tgl_awal && $tgl_akhir): ?>

   
    <canvas id="grafik" height="120"></canvas>

    <!-- Tabel Rekap -->
    <h3>Rekap Pendapatan</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah Pelanggan</th>
            <th>Pendapatan</th>
        </tr>

        <?php foreach ($dataTanggal as $index => $tgl): ?>
        <tr>
            <td><?= $tgl ?></td>
            <td><?= $dataPelanggan[$index] ?></td>
            <td>Rp <?= number_format($dataPendapatan[$index]) ?></td>
        </tr>
        <?php endforeach; ?>

        <tr>
            <th>Total</th>
            <th><?= $totalPelanggan ?></th>
            <th>Rp <?= number_format($totalPendapatan) ?></th>
        </tr>
    </table>

   
    <div style="text-align:center; margin-top:30px;">
        <button onclick="window.print()" class="btn" style="margin-right:10px;">Print</button>

        <a href="export.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>">
            <button class="btn btn-secondary">Export CSV</button>
        </a>
    </div>

    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = <?= json_encode($dataTanggal) ?>;
const dataPendapatan = <?= json_encode($dataPendapatan) ?>;

const ctx = document.getElementById('grafik');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Pendapatan',
            data: dataPendapatan
        }]
    }
});
</script>

</body>
</html>
