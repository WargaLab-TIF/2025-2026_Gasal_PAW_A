<?php
// Menggunakan header untuk ekspor data
require 'config.php';

// Ambil semua data yang relevan untuk laporan
$sql = "
    SELECT 
        t.id AS TransaksiID, 
        t.waktu_transaksi, 
        p.nama AS NamaPelanggan, 
        t.total,
        t.keterangan
    FROM 
        transaksi t
    JOIN 
        pelanggan p ON t.pelanggan_id = p.id
    ORDER BY 
        t.waktu_transaksi DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

// --- 1. SET HEADER UNTUK EKSPOR EXCEL (CSV) ---
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan_" . date('Ymd_His') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

// --- 2. OUTPUT DATA CSV ---
$output = fopen('php://output', 'w');

// Tulis Header Kolom
$headers = ['ID Transaksi', 'Waktu', 'Pelanggan', 'Total Penjualan', 'Keterangan'];
fputcsv($output, $headers, "\t"); // Gunakan tab (\t) sebagai delimiter

// Tulis Data Baris
while ($row = mysqli_fetch_assoc($result)) {
    // Konversi nilai total menjadi format numerik tanpa koma (agar Excel membacanya sebagai angka)
    $outputRow = [
        $row['TransaksiID'],
        $row['waktu_transaksi'],
        $row['NamaPelanggan'],
        $row['total'], // Biarkan angka mentah
        $row['keterangan']
    ];
    fputcsv($output, $outputRow, "\t");
}

fclose($output);
mysqli_close($conn);
exit;
?>