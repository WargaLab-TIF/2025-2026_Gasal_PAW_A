<?php
require_once '../config/database.php';

header('Content-Type: application/json');

$tanggal_awal = $_GET['tanggal_awal'] ?? '';
$tanggal_akhir = $_GET['tanggal_akhir'] ?? '';

if (empty($tanggal_awal) || empty($tanggal_akhir)) {
    echo json_encode(['error' => 'Tanggal awal dan akhir harus diisi']);
    exit;
}

try {
    // Query untuk mendapatkan data pertanggal
    $sql = "SELECT 
                DATE(tanggal) as tanggal,
                SUM(total) as total,
                SUM(jumlah_pelanggan) as jumlah_pelanggan
            FROM penjualan 
            WHERE tanggal BETWEEN :tanggal_awal AND :tanggal_akhir
            GROUP BY DATE(tanggal)
            ORDER BY tanggal ASC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':tanggal_awal' => $tanggal_awal,
        ':tanggal_akhir' => $tanggal_akhir
    ]);
    
    $data = $stmt->fetchAll();
    
    // Query untuk mendapatkan total 
    $sql_total = "SELECT 
                    SUM(total) as total_pendapatan,
                    SUM(jumlah_pelanggan) as total_pelanggan
                  FROM penjualan 
                  WHERE tanggal BETWEEN :tanggal_awal AND :tanggal_akhir";
    
    $stmt_total = $pdo->prepare($sql_total);
    $stmt_total->execute([
        ':tanggal_awal' => $tanggal_awal,
        ':tanggal_akhir' => $tanggal_akhir
    ]);
    
    $total = $stmt_total->fetch();
    
    echo json_encode([
        'success' => true,
        'data' => $data,
        'total' => $total
    ]);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
}
?>

