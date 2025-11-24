<?php 
include "koneksi.php"; 

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$user  = $_SESSION['username'];
$level = $_SESSION['level'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <style>
    .navbar { 
        background: #d63990ff; 
        color:white; 
        padding:14px 25px; 
        display:flex; 
        justify-content:space-between; 
        align-items:center; 
    }
    .menu a { 
        color:white; 
        text-decoration:none; 
        margin-right:25px; 
        font-weight:bold; 
    }
    .menu a:hover { 
        text-decoration:underline; 
    }
    .right { 
        font-weight:bold; 
    }
    body { 
        font-family: garamond; 
        margin: 40px; 
    }
    table { 
        width: 100%; 
        border-collapse: collapse; 
        margin-top: 10px; 
    }
    th, td { 
        border: 1px solid #ddd; 
        padding: 8px; 
        text-align: left; 
    }
    th { 
        background: #d6edf9; 
    }
    tr { 
        background: #f9f9f9; 
    }
    @media print{
        .no-print{
            display: none;
        }
    }
    </style>

<div class="navbar">
    <div class="menu">
        <a href="index.php">Home</a>

        <?php if ($level == 1): ?>
            <a href="data_master.php">Data Master</a>
        <?php endif; ?>

        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    </div>

    <div class="right">
        <?= $user ?> | 
        <a href="logout.php" style="color:blue;">Logout</a>
    </div>
</div>

<h2>Laporan Penjualan</h2>

<form method="GET">
    <input type="date" name="start" class="no-print" value="<?= isset($_GET['start']) ? $_GET['start'] : '' ?>">
    <input type="date" name="end" class="no-print" value="<?= isset($_GET['end']) ? $_GET['end'] : '' ?>">
    <button type="submit" class="no-print" >Tampilkan</button>
</form>

<?php  
// untuk Mengecek apakah tanggal awal dan akhir diisi
if (!empty($_GET['start']) && !empty($_GET['end'])) {

    $start = $_GET['start'];
    $end = $_GET['end'];

    // Query mengambil data dari pembayaran berdasarkan range tanggal
    $query = mysqli_query($conn, "
        SELECT 
            DATE(waktu_bayar) AS tanggal,
            COUNT(id) AS total_pelanggan,
            SUM(total) AS total_pendapatan
        FROM pembayaran
        WHERE DATE(waktu_bayar) BETWEEN '$start' AND '$end'
        GROUP BY DATE(waktu_bayar)
        ORDER BY tanggal ASC
    ");

    $tgl = [];
    $pendapatan = [];
    $sum_pelanggan = 0;
    $sum_pendapatan = 0;

    // Mengambil data dari query
    while ($result = mysqli_fetch_assoc($query)) {
        $tgl[] = $result['tanggal'];
        $pendapatan[] = $result['total_pendapatan'];

        $sum_pelanggan += $result['total_pelanggan'];
        $sum_pendapatan += $result['total_pendapatan'];
    }
?>

<h3>Rekap Laporan penjualan 
    <?= isset($_GET['start']) ? $_GET['start'] : '' ?>
    sampai
    <?= isset($_GET['end']) ? $_GET['end'] : '' ?>
</h3>


<canvas id="chart" height="100"></canvas>

<script>
new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($tgl) ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($pendapatan) ?>,
            borderWidth: 1
        }]
    },
    options: { scales: { y: { beginAtZero: true } } }
});
</script>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

<?php
// Query untuk menampilkan tabel pendapatan per hari

$q2 = mysqli_query($conn, "
    SELECT 
        DATE(waktu_bayar) AS tanggal,
        SUM(total) AS total_pendapatan
    FROM pembayaran
    WHERE DATE(waktu_bayar) BETWEEN '$start' AND '$end'
    GROUP BY DATE(waktu_bayar)
");

$no = 1;
while ($result = mysqli_fetch_assoc($q2)) {
    echo "
    <tr>
        <td>".$no++."</td>
        <td>Rp ".number_format($result['total_pendapatan'])."</td>
        <td>{$result['tanggal']}</td>
    </tr>";
}
?>
</table>
<br>

<table border="1" >
    <tr>
    <th>Jumlah Pelanggan : </th>
    <th>Jumlah Pendapatan : </th>
    </tr>
    <td><?= $sum_pelanggan ?> orang</td>
    <td>Rp <?= number_format($sum_pendapatan) ?></td>
</table>

    <style>
        @media print{
            .no-print{
                display: none;
            }
        }
    </style>
<br>

<button onclick="window.print()" class="no-print">Print</button>
<a href="excel.php?start=<?= $start ?>&end=<?= $end ?>" class="no-print">
    <button>Excel</button>
</a>


<?php } ?>

</body>
</html>