<?php
require 'config.php';

// Cek method dan pastikan data krusial ada
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['pelanggan_id']) || empty($_POST['total_transaksi']) || empty($_POST['items'])) {
    $msg = 'Error: Data formulir tidak lengkap atau metode salah.';
    header('Location: transaksi_form.php?msg=' . urlencode($msg));
    exit;
}

// Ambil data POST
$pelanggan_id = mysqli_real_escape_string($conn, $_POST['pelanggan_id']);
$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan'] ?? '');
$total_transaksi = (int)$_POST['total_transaksi'];
$cart_data = $_POST['items']; // Data keranjang sudah berupa array PHP

// --- Memulai Proses Transaksional ---
mysqli_begin_transaction($conn);
$final_msg = '';

try {
    // 1. SIMPAN DATA MASTER (TABEL TRANSAKSI)
    $sql_transaksi = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) VALUES (NOW(), ?, ?, ?)";
    $stmt_transaksi = mysqli_prepare($conn, $sql_transaksi);
    if (!$stmt_transaksi) throw new Exception("Prepare Transaksi Gagal: " . mysqli_error($conn));
    
    // mendefinisikan tipe data: s (string), i (integer), s (string)
    mysqli_stmt_bind_param($stmt_transaksi, "sis", $keterangan, $total_transaksi, $pelanggan_id); 
    if (!mysqli_stmt_execute($stmt_transaksi)) throw new Exception("Execute Transaksi Gagal: " . mysqli_stmt_error($stmt_transaksi));
    
    $transaksi_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt_transaksi);

    // 2. SIMPAN DATA DETAIL DAN UPDATE STOK
    $sql_detail = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES (?, ?, ?, ?)";
    $sql_stok = "UPDATE barang SET stok = stok - ? WHERE id = ?";
    
    foreach ($cart_data as $item) {
        // Konversi tipe data yang aman (dari POST/JS ke integer)
        $barang_id = (int) $item['barang_id'];
        $harga = (int) $item['harga'];
        $qty = (int) $item['qty'];
        
        // Simpan Detail
        $stmt_detail = mysqli_prepare($conn, $sql_detail);
        if (!$stmt_detail) throw new Exception("Prepare Detail Gagal: " . mysqli_error($conn));
        
        // Type definition: i (transaksi_id), i (barang_id), i (harga), i (qty)
        mysqli_stmt_bind_param($stmt_detail, "iiii", $transaksi_id, $barang_id, $harga, $qty);
        if (!mysqli_stmt_execute($stmt_detail)) throw new Exception("Execute Detail Gagal: " . mysqli_stmt_error($stmt_detail));
        mysqli_stmt_close($stmt_detail);

        // Update Stok
        $stmt_stok = mysqli_prepare($conn, $sql_stok);
        if (!$stmt_stok) throw new Exception("Prepare Stok Gagal: " . mysqli_error($conn));
        
        // Type definition: i (qty), i (barang_id)
        mysqli_stmt_bind_param($stmt_stok, "ii", $qty, $barang_id);
        if (!mysqli_stmt_execute($stmt_stok)) throw new Exception("Execute Stok Gagal: " . mysqli_stmt_error($stmt_stok));
        mysqli_stmt_close($stmt_stok);
        
        // Cek apakah stok benar-benar berkurang (opsional, untuk debug)
        if (mysqli_affected_rows($conn) == 0) {
             // Jika 0 baris terpengaruh, mungkin ID barang tidak ada (walaupun seharusnya dicegah oleh FK)
             // throw new Exception("Update stok gagal pada Barang ID: " . $barang_id);
        }
    }
    
    // --- COMMIT: Semua berhasil, simpan permanen ---
    mysqli_commit($conn);
    $final_msg = "Transaksi berhasil disimpan dengan ID: $transaksi_id";

} catch (Exception $e) {
    // --- ROLLBACK: Ada error, batalkan semua perubahan ---
    mysqli_rollback($conn);
    $error_message = $e->getMessage();
    $final_msg = 'Error: Transaksi GAGAL disimpan. ' . $error_message;
}

mysqli_close($conn);

// Redirect dengan pesan hasil
header('Location: transaksi_form.php?msg=' . urlencode($final_msg));
exit;
?>