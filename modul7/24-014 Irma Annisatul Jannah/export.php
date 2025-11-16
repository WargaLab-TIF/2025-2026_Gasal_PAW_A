<?php
require 'koneksi.php';

$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=laporan_pendapatan.csv");

$output = fopen("php://output", "w");


fputcsv($output, ["Tanggal", "Pendapatan"]);

$sql = "SELECT tanggal, SUM(total) AS pendapatan 
        FROM transaksi 
        WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'
        GROUP BY tanggal
        ORDER BY tanggal ASC";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
