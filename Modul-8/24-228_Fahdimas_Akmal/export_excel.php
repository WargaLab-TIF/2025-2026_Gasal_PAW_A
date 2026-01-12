<?php
include 'koneksi.php';

// Ambil tanggal dari URL
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

// Format nama file
$filename = "Laporan_Penjualan_" . $start_date . "_sampai_" . $end_date . ".xls";

// Set header HTTP untuk download file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

// 1. Query untuk Rekap Harian
//    MENGGUNAKAN DATE(waktu_transaksi) dan SUM(total) 
$query_rekap = "
    SELECT 
        DATE(waktu_transaksi) AS tanggal_harian, 
        SUM(total) AS total_harian
    FROM transaksi 
    WHERE DATE(waktu_transaksi) BETWEEN ? AND ?
    GROUP BY tanggal_harian
    ORDER BY tanggal_harian ASC
";
$stmt_rekap = $conn->prepare($query_rekap);
$stmt_rekap->bind_param("ss", $start_date, $end_date);
$stmt_rekap->execute();
$result_rekap = $stmt_rekap->get_result();

// 2. Query untuk Total Kumulatif
//    MENGGUNAKAN DATE(waktu_transaksi) dan SUM(total) 
$query_total = "
    SELECT 
        COUNT(DISTINCT pelanggan_id) AS jumlah_pelanggan,
        SUM(total) AS total_pendapatan
    FROM transaksi
    WHERE DATE(waktu_transaksi) BETWEEN ? AND ?
";
$stmt_total = $conn->prepare($query_total);
$stmt_total->bind_param("ss", $start_date, $end_date);
$stmt_total->execute();
$result_total = $stmt_total->get_result();
$data_total = $result_total->fetch_assoc();

// Format Angka
function format_rupiah_excel($angka) {
    return "Rp. " . number_format($angka, 0, ',', '.');
}

// Mulai output HTML untuk Excel
$output = "
<html>
    <head><title>Laporan Penjualan</title></head>
    <body>
        <h2>Rekap Laporan Penjualan</h2>
        <p>Periode: $start_date sampai $end_date</p>
        
        <table border='1'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
";

$no = 1;
if ($result_rekap->num_rows > 0) {
    while ($row = $result_rekap->fetch_assoc()) {
        $output .= "
            <tr>
                <td>" . $no++ . "</td>
                <td>" . date("d M Y", strtotime($row['tanggal_harian'])) . "</td>
                <td>" . format_rupiah_excel($row['total_harian']) . "</td>
            </tr>
        ";
    }
} else {
    $output .= "
        <tr>
            <td colspan='3'>Tidak ada data.</td>
        </tr>
    ";
}

$output .= "
            </tbody>
        </table>

        <br><br>

        <table border='1'>
            <thead>
                <tr>
                    <th>Jumlah Pelanggan</th>
                    <th>Jumlah Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>" . $data_total['jumlah_pelanggan'] . " Orang</td>
                    <td>" . format_rupiah_excel($data_total['total_pendapatan']) . "</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
";

// Cetak output
echo $output;
exit;
?>