<?php
require 'config.php';

$tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : '';
$tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : '';

$query = "SELECT t.waktu_transaksi, SUM(td.harga * td.qty) as total_harga FROM transaksi as t 
            JOIN transaksi_detail as td ON t.id = td.transaksi_id";

if ($tgl_awal && $tgl_akhir){
    $query .= " WHERE t.waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir'";
}

$query .= " GROUP BY t.id";

$execute = mysqli_query($conn, $query);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal = [];
$total_harga = [];
$data = [];
foreach ($result as $value){
    $tanggal[] = $value['waktu_transaksi'];
    $total_harga[] = $value['total_harga'];
    $data[] = $value;
}
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header("Content-Disposition: attachment; filename=laporan reporting.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Excel</title>
</head>
<body>
        <h3>Rekap Laporan Penjualan Mulai
            <?php if ($tgl_awal && $tgl_akhir) : ?>
                (<?= date('d F Y', strtotime($tgl_awal)) ?> – <?= date('d F Y', strtotime($tgl_akhir)) ?>)
            <?php endif; ?>
        </h3>
        <table border="1" cellpadding="1" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
            <?php $no=0; ?>
            <?php foreach ($data as $dt => $value): ?>
                <?php $no++; ?>
                <tr>
                    <td><?= $no ; ?></td>
                    <td>Rp. <?=$value['total_harga']; ?></td>
                    <td><?=date('d F Y', strtotime($value['waktu_transaksi'])); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>Jumlah Pelanggan</th>
                <th colspan="2">Jumlah Pendapatan</th>
            </tr>
            <tr>
                <th><?= count($result) ?> Orang</th>
                <th colspan="2">Rp <?= array_sum($total_harga)?></th>
            </tr>
    </table>
</body>
</html>