<!-- ngambil data yang relevan untuk laporan (excel) -->
<?php
require 'config.php';

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

// set header untuk dapat ekspor excel (csv)
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan_" . date('Ymd_His') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

// output data untuk csv
$output = fopen('php://output', 'w');

// menulis header kolom
$headers = ['ID Transaksi', 'Waktu', 'Pelanggan', 'Total Penjualan', 'Keterangan'];
fputcsv($output, $headers, "\t"); // Gunakan tab (\t) sebagai delimiter

// menulis data baris
while ($row = mysqli_fetch_assoc($result)) {
    // ubah nilai total menjadi format numerik tanpa koma (agar Excel membacanya sebagai angka)
    $outputRow = [
        $row['TransaksiID'],
        $row['waktu_transaksi'],
        $row['NamaPelanggan'],
        $row['total'],
        $row['keterangan']
    ];
    fputcsv($output, $outputRow, "\t");
}

fclose($output);
mysqli_close($conn);
exit;
?>