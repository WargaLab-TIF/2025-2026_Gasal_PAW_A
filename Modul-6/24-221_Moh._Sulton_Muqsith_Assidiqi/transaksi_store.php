<?php
include 'koneksi.php';

$tanggal = $_POST['tanggal'];
$pelanggan = $_POST['pelanggan'];

// Simpan ke tabel nota (master)
$sql_nota = "INSERT INTO nota (tanggal, pelanggan, total) VALUES ('$tanggal', '$pelanggan', 0)";
mysqli_query($conn, $sql_nota) or die(mysqli_error($conn));
$id_nota = mysqli_insert_id($conn);

$total = 0;

// Simpan ke tabel detail_barang (detail)
foreach ($_POST['barang'] as $item) {
    $kode = $item['kode'];
    $nama = $item['nama'];
    $jumlah = $item['jumlah'];
    $harga = $item['harga'];
    $subtotal = $jumlah * $harga;
    $total += $subtotal;

    $sql_detail = "INSERT INTO detail_barang (id_nota, kode_barang, nama_barang, jumlah, harga, subtotal)
                   VALUES ('$id_nota', '$kode', '$nama', '$jumlah', '$harga', '$subtotal')";
    mysqli_query($conn, $sql_detail) or die(mysqli_error($conn));
}

// Update total nota
mysqli_query($conn, "UPDATE nota SET total = '$total' WHERE id_nota = '$id_nota'");

echo "<script>
        alert('Transaksi berhasil disimpan!');
        window.location='index.php';
      </script>";
?>