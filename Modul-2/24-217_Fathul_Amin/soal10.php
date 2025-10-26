<!DOCTYPE html>
<html>
<head>
    <title>soal 10</title>
</head>
<body>
<h2>Kasir Sederhana</h2>

<?php
$keranjang = $_POST['keranjang'] ?? "";
$totalBayar = (int)($_POST['totalBayar'] ?? 0);

$aksi = $_POST['aksi'] ?? "";

if ($aksi == "tambah") {
    $barang = $_POST['barang'];
    $jumlah = (int)($_POST['jumlah'] ?? 0);



    $nama = "";
    $harga = 0;
    if ($barang == 1) { $nama = "Buku Tulis"; $harga = 8000; }
    elseif ($barang == 2) { $nama = "Bolpen"; $harga = 2000; }
    elseif ($barang == 3) { $nama = "Tip-X"; $harga = 5500; }
    elseif ($barang == 4) { $nama = "Binder"; $harga = 11000; }
    elseif ($barang == 5) { $nama = "Kertas Karton"; $harga = 5000; }
    elseif ($barang == 6) { $nama = "Folio Bergaris"; $harga = 1000; }

    if ($jumlah > 0 && $harga > 0) {
        $totalBarang = $harga * $jumlah;
        $keranjang .= "$nama -- Rp$harga x $jumlah = Rp$totalBarang<br>";
        $totalBayar += $totalBarang;
    }
} elseif ($aksi == "hapus") {
    

    $keranjang = "";
    $totalBayar = 0;
}
?>


<form method="post">
    <label>Pilih Barang:</label>
    <select name="barang">
        <option value="1">Buku Tulis - Rp8000</option>
        <option value="2">Bolpen - Rp2000</option>
        <option value="3">Tip-X - Rp5500</option>
        <option value="4">Binder - Rp11000</option>
        <option value="5">Kertas Karton - Rp5000</option>
        <option value="6">Folio Bergaris - Rp1000</option>
    </select>

    <label>Jumlah:</label>
    <input type="number" name="jumlah" value="1" min="1" required>

    <br><br>
    <button type="submit" name="aksi" value="tambah">Tambahkan</button>
    <button type="submit" name="aksi" value="hapus">Hapus Semua</button>

  
    <input type="hidden" name="keranjang" value="<?= htmlspecialchars($keranjang) ?>">
    <input type="hidden" name="totalBayar" value="<?= $totalBayar ?>">
</form>

<hr>

<h3>Keranjang Belanja</h3>
<?php
if ($keranjang != "") {
    echo $keranjang;
    echo "<b>Total Bayar: Rp$totalBayar</b>";
} else {
    echo "<p>Daftar Keranjang dihapus.</p>";
}
?>
</body>
</html>