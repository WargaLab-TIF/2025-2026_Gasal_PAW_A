<?php
session_start();
require "conn.php";

$mulai = isset($_GET['mulai']) ? $_GET['mulai'] : '';
$selesai = isset($_GET['selesai']) ? $_GET['selesai'] : '';

$query = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian
          FROM transaksi
          WHERE DATE(waktu_transaksi) BETWEEN '$mulai' AND '$selesai'
          GROUP BY DATE(waktu_transaksi)
          ORDER BY tanggal ASC";

$execute = mysqli_query($conn, $query);
$rekap = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$q_total = "SELECT COUNT(*) AS jml_pelanggan, SUM(total) AS total_semua
            FROM transaksi
            WHERE DATE(waktu_transaksi) BETWEEN '$mulai' AND '$selesai'";

$get_total = mysqli_query($conn, $q_total);
$total = mysqli_fetch_assoc($get_total);

header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header("Content-Disposition: attachment; filename=rekap_penjualan.xls");

?>

<table>
    <tr>
        <td colspan="3"><h2>Rekap Laporan Penjualan</h2></td>
    </tr>
    <tr>
        <td colspan="3"><?= $mulai ?> sampai <?= $selesai ?></td>
    </tr>
</table>

<br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php 
    $no = 1; 
    foreach($rekap as $r){ ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>Rp <?= $r['total_harian'] ?></td>
            <td><?= $r['tanggal'] ?></td> 
        </tr>
    <?php } ?>
</table>

<br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
        <td><?= $total['jml_pelanggan'] ?> Orang</td>
        <td>Rp <?= $total['total_semua']?></td>
    </tr>
</table>
