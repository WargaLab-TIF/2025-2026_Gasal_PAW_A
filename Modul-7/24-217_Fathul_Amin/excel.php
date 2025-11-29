<?php
include 'config.php';

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

$filename = "laporan Modul 7 PAW" . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

$query_rekap = "SELECT DATE(waktu_transaksi) AS tanggal_harian, SUM(total) AS total_harian 
                FROM transaksi 
                WHERE DATE(waktu_transaksi) BETWEEN ? AND ? 
                GROUP BY tanggal_harian 
                ORDER BY tanggal_harian ASC";
$stmt_rekap = $conn->prepare($query_rekap); 
$stmt_rekap->bind_param("ss", $start_date, $end_date);
$stmt_rekap->execute();
$result_rekap = $stmt_rekap->get_result();

$query_total = "SELECT COUNT(DISTINCT pelanggan_id) AS jumlah_pelanggan, SUM(total) AS total_pendapatan 
                FROM transaksi 
                WHERE DATE(waktu_transaksi) BETWEEN ? AND ?";
$stmt_total = $conn->prepare($query_total); 
$stmt_total->bind_param("ss", $start_date, $end_date);
$stmt_total->execute();
$data_total = $stmt_total->get_result()->fetch_assoc();

function format_rupiah_excel($angka) {
    return "Rp. " . number_format($angka, 0, ',', '.');
}

echo "
<html>
    <head><title>Laporan Penjualan</title></head>
    <body>
        <h3>Rekap Laporan Penjualan</h3>
        <p>Periode: $start_date sampai $end_date</p>
        
        <table border='1'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>";

$no = 1;
while ($row = $result_rekap->fetch_assoc()) {
    echo "
            <tr>
                <td>" . $no++ . "</td>
                <td>" . date("d M Y", strtotime($row['tanggal_harian'])) . "</td>
                <td>" . format_rupiah_excel($row['total_harian']) . "</td>
            </tr>";
}

echo "      </tbody>
        </table>
        <br><br>
        
        <table border='1'>
            <tr>
                <th>Jumlah Pelanggan</th>
                <td>" . $data_total['jumlah_pelanggan'] . " Orang</td>
            </tr>
            <tr>
                <th>Jumlah Pendapatan</th>
                <td>" . format_rupiah_excel($data_total['total_pendapatan']) . "</td>
            </tr>
        </table>
    </body>
</html>";
exit;
?>