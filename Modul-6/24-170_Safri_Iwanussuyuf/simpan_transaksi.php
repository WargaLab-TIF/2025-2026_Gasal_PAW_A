<?php
require "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $pelanggan_id = $_POST['pelanggan_id'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total']; 
    $waktu_transaksi = date('Y-m-d'); 

    $barang_ids = $_POST['barang_id'];
    $hargas = $_POST['harga'];
    $qtys = $_POST['qty'];

    mysqli_begin_transaction($conn);

    $query_master = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) 
                     VALUES ('$waktu_transaksi', '$keterangan', '$total', '$pelanggan_id')";
    
    $simpan_master = mysqli_query($conn, $query_master);

    if ($simpan_master) {

        $transaksi_id = mysqli_insert_id($conn);
        $semua_detail_berhasil = true;
        for ($i = 0; $i < count($barang_ids); $i++) {
            $barang_id = $barang_ids[$i];
            $harga = $hargas[$i];
            $qty = $qtys[$i];

            $query_detail = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) 
                             VALUES ($transaksi_id, $barang_id, $harga, $qty)";
            
            $simpan_detail = mysqli_query($conn, $query_detail);

            if (!$simpan_detail) {
                $semua_detail_berhasil = false;
                break; 
            }
        }

        if ($semua_detail_berhasil) {

            mysqli_commit($conn);
            echo "Transaksi berhasil disimpan!";
            header("Location: form_transaksi.php?status=sukses");
        } else {

            mysqli_rollback($conn);
            echo "Error: Gagal menyimpan data detail. Transaksi dibatalkan.";
            header("Location: form_transaksi.php?status=gagal_detail");
        }

    } else {

        mysqli_rollback($conn);
        echo "Error: Gagal menyimpan data master. Transaksi dibatalkan.";
        header("Location: form_transaksi.php?status=gagal_master");
    }

} 
mysqli_close($conn);
?>