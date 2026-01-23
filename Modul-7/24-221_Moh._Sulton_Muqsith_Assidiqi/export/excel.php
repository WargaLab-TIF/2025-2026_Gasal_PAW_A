<?php
require_once '../config/database.php';

$tanggal_awal = $_GET['tanggal_awal'] ?? '';
$tanggal_akhir = $_GET['tanggal_akhir'] ?? '';

if (empty($tanggal_awal) || empty($tanggal_akhir)) {
    die('Tanggal awal dan akhir harus diisi');
}

try {
    // Query untuk mendapatkan data per tanggal
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
    
    // Set header
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan_Penjualan.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Output Excel 
    echo "Rekap Laporan Penjualan\n";
    echo "$tanggal_awal sampai $tanggal_akhir\n\n";
    echo "No\tTotal\tTanggal\n";
    
    $no = 1;
    foreach ($data as $row) {
        $tanggal = date('d M Y', strtotime($row['tanggal']));
        echo $no . "\tRP. " . number_format($row['total'], 0, ',', '.') . "\t$tanggal\n";
        $no++;
    }
    
    echo "\n";
    echo "Jumlah Pelanggan\t\tJumlah Pendapatan\n";
    echo $total['total_pelanggan'] . " Orang\t\tRP. " . number_format($total['total_pendapatan'], 0, ',', '.') . "\n";
    
} catch(PDOException $e) {
    die('Error: ' . $e->getMessage());
}
?>

