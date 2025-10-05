<?php
$lanjut = $_POST["lanjut"] ?? "";
$menu = $_POST["menu"] ?? "";
$jumlah = $_POST["jumlah"] ?? 0;

$ayam = 16000;
$sapi = 150000;
$bawang = 120000;
$tomat = 5000;
$esbatu = 10000;

$totalharga = 0;

if ($menu == "ayam") {
    $totalharga = $ayam * $jumlah;
} elseif ($menu == "sapi") {
    $totalharga = $sapi * $jumlah;
} elseif ($menu == "bawang") {
    $totalharga = $bawang * $jumlah;
} elseif ($menu == "tomat") {
    $totalharga = $tomat * $jumlah;
} elseif ($menu == "es batu") {
    $totalharga = $esbatu * $jumlah;
}

if ($lanjut == "tidak") {
    echo "<h1>Terima kasih telah berbelanja!</h1>";
    echo "<h2>Total harga: Rp " .($totalharga) . "</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Sederhana</title>
</head>
<body>

<h1>Selamat datang di kasir sederhana</h1>

<form action="" method="post">
    <label for="menu">Pilih barang yang ingin anda beli:</label><br>
    <input list="menu" name="menu" required>
    <datalist id="menu">
        <option value="ayam">
        <option value="sapi">
        <option value="bawang">
        <option value="tomat">
        <option value="es batu">
    </datalist><br><br>

    <label for="jumlah">Mau beli berapa kg?:</label><br>
    <input type="number" name="jumlah" placeholder="Masukkan jumlah" min="1" required><br><br>

    <p>Apakah anda ingin lanjut berbelanja?</p>
    <input type="radio" id="lanjut" name="lanjut" value="lanjut" required>
    <label for="lanjut">Lanjut</label><br>
    <input type="radio" id="tidak" name="lanjut" value="tidak">
    <label for="tidak">Tidak</label><br><br>

    <input type="submit" value="Kirim">
</form>

<?php

if ($menu && $lanjut == "lanjut") {
    echo "<p>Total harga untuk $jumlah kg $menu adalah: <strong>Rp " . ($totalharga) . "</strong></p>";
}
?>

</body>
</html>
