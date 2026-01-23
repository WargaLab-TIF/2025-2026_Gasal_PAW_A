<?php 
session_start();
require "conn.php";
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}
$tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : '2023-09-01';
$tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : '2023-09-27';

$query = "
    SELECT 
        DATE(t.waktu_transaksi) as tanggal_harian, 
        SUM(td.harga) as total_pendapatan
    FROM 
        transaksi as t 
    JOIN 
        transaksi_detail as td ON t.id = td.transaksi_id
    WHERE
        DATE(t.waktu_transaksi) BETWEEN '$tgl_awal' AND '$tgl_akhir'
    GROUP BY 
        tanggal_harian
    ORDER BY
        tanggal_harian ASC
";

$execute = mysqli_query($conn, $query);
$data_rekap = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$query_total = "
    SELECT 
        COUNT(DISTINCT t.id) as total_pelanggan, 
        SUM(td.harga) as total_pendapatan_kumulatif
    FROM 
        transaksi as t 
    JOIN 
        transaksi_detail as td ON t.id = td.transaksi_id
    WHERE
        DATE(t.waktu_transaksi) BETWEEN '$tgl_awal' AND '$tgl_akhir'
";
$execute_total = mysqli_query($conn, $query_total);
$total_data = mysqli_fetch_assoc($execute_total);

header('Content-Type: application/vnd.ms-excel; charset=utf-8 ');
header("Content-Disposition: attachment; filename=Rekap_Penjualan_$tgl_awal_sd_$tgl_akhir.xls");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekap Penjualan</title>
    <style>
        .judul { font-weight: bold; font-size: 16pt; }
    </style>
</head>
<body>
    <div class="judul">Rekap Laporan Penjualan <?= $tgl_awal ?> sampai <?= $tgl_akhir ?></div>
    <br>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Total Transaksi (RP)</th>
        </tr>
        <?php $no= 0; ?>
        <?php foreach($data_rekap as $key => $value): ?>
            <?php $no++ ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= date('d-M-Y', strtotime($value['tanggal_harian'])) ?></td>
                <td><?= $value['total_pendapatan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td colspan="2">Jumlah Pelanggan</td>
            <td><?= $total_data['total_pelanggan'] ?> Orang</td>
        </tr>
        <tr>
            <td colspan="2">Jumlah Pendapatan</td>
            <td>RP. <?= number_format($total_data['total_pendapatan_kumulatif'],2,',','.'); ?></td>
        </tr>
    </table>
</body>
</html>