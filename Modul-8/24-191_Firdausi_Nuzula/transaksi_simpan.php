<?php
session_start();
include 'conn.php';
include 'navbar.php';

// Ambil data dari form
$no_nota = $_POST['no_nota'];
$pelanggan_id = $_POST['pelanggan_id'];
$tanggal = $_POST['tanggal'];
$barang_id = $_POST['barang_id'];
$qty = $_POST['qty'];

// SIMPAN KE TABEL NOTA
$query_nota = "INSERT INTO nota (no_nota, pelanggan_id, tgl_nota, total)
               VALUES ('$no_nota', '$pelanggan_id', '$tanggal', 0)";
mysqli_query($conn, $query_nota);

$id_nota = mysqli_insert_id($conn);

$total = 0;

// LOOP BARANG
for ($i = 0; $i < count($barang_id); $i++) {
    if ($barang_id[$i] == "" || $qty[$i] == "") continue;

    $q = mysqli_query($conn, "SELECT harga, stok FROM barang WHERE id = ".$barang_id[$i]);
    $row = mysqli_fetch_assoc($q);

    $harga = $row['harga'];
    $stok  = $row['stok'];
    $sub   = $harga * $qty[$i];
    $total += $sub;

    if ($stok < $qty[$i]) {
        echo "<script>alert('Stok barang tidak mencukupi!'); window.location.href='transaksi_form.php';</script>";
        exit();
    }

    // INSERT NOTA DETAIL
    mysqli_query($conn, "INSERT INTO nota_detail (id_nota, barang_id, qty, harga, subtotal)
                         VALUES ('$id_nota', '".$barang_id[$i]."', '".$qty[$i]."', '$harga', '$sub')");
    
    // KURANGI STOK
    mysqli_query($conn, "UPDATE barang SET stok = stok - ".$qty[$i]." WHERE id = ".$barang_id[$i]);
}

// UPDATE TOTAL NOTA
mysqli_query($conn, "UPDATE nota SET total = '$total' WHERE id_nota = '$id_nota'");

// INSERT TRANSAKSI
$keterangan = "Transaksi Penjualan No Nota: $no_nota";
mysqli_query($conn, "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
                     VALUES ('$tanggal', '$keterangan', '$total', '$pelanggan_id')");
$id_transaksi = mysqli_insert_id($conn);

// 🔥 INSERT TRANSAKSI DETAIL (BARU DITAMBAH)
for ($i = 0; $i < count($barang_id); $i++) {
    if ($barang_id[$i] == "" || $qty[$i] == "") continue;

    mysqli_query($conn, "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
                         VALUES ('$id_transaksi', '".$barang_id[$i]."', '$harga', '".$qty[$i]."')");
}

echo "<script>alert('Transaksi berhasil disimpan!'); window.location.href='transaksi_form.php';</script>";
exit();
?>
