<?php
require 'config.php';

header('Content-Type: application/json');

// Query untuk menghitung total penjualan (SUM(total)) per tanggal
$sql = "
    SELECT 
        DATE(waktu_transaksi) AS tanggal, 
        SUM(total) AS total_penjualan
    FROM 
        transaksi
    GROUP BY 
        tanggal
    ORDER BY 
        tanggal ASC
    LIMIT 7"; // Ambil data 7 hari terakhir

$result = mysqli_query($conn, $sql);
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data['labels'][] = $row['tanggal'];
    $data['data'][] = (int)$row['total_penjualan'];
}

echo json_encode($data);

mysqli_close($conn);
?>