<?php
require 'koneksi.php';

// Fungsi penyimpanan otomatis ke dua tabel (master & detail)
if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $pelanggan_id = $_POST['pelanggan_id'];
    $pegawai_id = $_POST['pegawai_id'];
    $barang_id = $_POST['barang_id'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Hitung subtotal & total
    $subtotal = $jumlah * $harga;
    $total = $subtotal;

    // Simpan ke tabel transaksi (MASTER)
    $sql_transaksi = "INSERT INTO transaksi (tanggal, pelanggan_id, pegawai_id, total)
                      VALUES ('$tanggal', '$pelanggan_id', '$pegawai_id', '$total')";
    mysqli_query($conn, $sql_transaksi);

    // Ambil ID transaksi terakhir
    $transaksi_id = mysqli_insert_id($conn);

    // Simpan ke tabel transaksi_detail (DETAIL)
    $sql_detail = "INSERT INTO transaksi_detail (transaksi_id, barang_id, jumlah, harga, subtotal)
                   VALUES ('$transaksi_id', '$barang_id', '$jumlah', '$harga', '$subtotal')";
    mysqli_query($conn, $sql_detail);

    echo "<script>alert('Transaksi berhasil disimpan!');</script>";
}

// Ambil data dari tabel untuk dropdown
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$pegawai = mysqli_query($conn, "SELECT * FROM pegawai");
$barang = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Transaksi (Nota & Barang)</title>
<style>
    body { font-family: Arial; margin: 40px; background-color: #f8f8f8; }
    form { background: #fff; padding: 20px; border-radius: 10px; width: 400px; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
    h2 { color: #333; }
    label { display: block; margin-top: 10px; }
    input, select { width: 100%; padding: 8px; margin-top: 5px; }
    button { margin-top: 15px; padding: 10px; background-color: #1e90ff; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background-color: #0078e7; }
</style>
</head>
<body>

<h2>Form Transaksi Penjualan</h2>

<form method="POST">
    <label>Tanggal:</label>
    <input type="date" name="tanggal" required>

    <label>Pelanggan:</label>
    <select name="pelanggan_id" required>
        <option value=""> Pilih Pelanggan </option>
        <?php while ($p = mysqli_fetch_assoc($pelanggan)) { ?>
            <option value="<?= $p['pelanggan_id'] ?>"><?= $p['nama_pelanggan'] ?></option>
        <?php } ?>
    </select>

    <label>Pegawai (Kasir):</label>
    <select name="pegawai_id" required>
        <option value=""> Pilih Pegawai </option>
        <?php while ($k = mysqli_fetch_assoc($pegawai)) { ?>
            <option value="<?= $k['pegawai_id'] ?>"><?= $k['nama_pegawai'] ?></option>
        <?php } ?>
    </select>

    <label>Barang:</label>
    <select name="barang_id" required>
        <option value=""> Pilih Barang </option>
        <?php while ($b = mysqli_fetch_assoc($barang)) { ?>
            <option value="<?= $b['barang_id'] ?>"><?= $b['nama_barang'] ?></option>
        <?php } ?>
    </select>

    <label>Jumlah:</label>
    <input type="number" name="jumlah" required>

    <label>Harga (per item):</label>
    <input type="number" name="harga" required>

    <button type="submit" name="simpan">Simpan Transaksi</button>
</form>

</body>
</html>
