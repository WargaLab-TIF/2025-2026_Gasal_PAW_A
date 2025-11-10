<?php
$menu = [
    1 => ["nama" => "Nasi Goreng", "harga" => 10000],
    2 => ["nama" => "Mie Ayam", "harga" => 10000],
    3 => ["nama" => "Es Teh", "harga" => 3000],
    4 => ["nama" => "Jus Jeruk", "harga" => 5000],
];

session_start();
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}
$total = 0;

if (isset($_POST['pilih'])) {
    $pilih = (int) $_POST['pilih'];
    $jumlah = (int) $_POST['jumlah'];

    if (isset($menu[$pilih])) {
        $item = $menu[$pilih];
        $_SESSION['keranjang'][] = [
            "nama" => $item["nama"],
            "harga" => $item["harga"],
            "jumlah" => $jumlah,
            "subtotal" => $item["harga"] * $jumlah
        ];
    }
}

foreach ($_SESSION['keranjang'] as $beli) {
    $total += $beli["subtotal"];
}

if (isset($_POST['reset'])) {
    $_SESSION['keranjang'] = [];
    $total = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Kasir Sederhana</title>
</head>
<body>
    <h2>Menu</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
        </tr>
        <?php foreach ($menu as $key => $item): ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $item["nama"] ?></td>
            <td>Rp<?= number_format($item["harga"], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Form Pemesanan</h3>
    <form method="post">
        <table border="1" cellpadding="5">
            <tr>
                <th>Nomor Menu:</th>
                <td><input type="number" name="pilih" required></td>
            </tr>
            <tr>
                <th>Jumlah:</th>
                <td><input type="number" name="jumlah" value="1" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit">Tambah ke Keranjang</button></td>
            </tr>
        </table>
    </form>

    <h3>Keranjang Belanja</h3>
    <?php if (!empty($_SESSION['keranjang'])): ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <?php $no = 1; foreach ($_SESSION['keranjang'] as $beli): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $beli["nama"] ?></td>
                <td>Rp<?= number_format($beli["harga"], 0, ',', '.') ?></td>
                <td><?= $beli["jumlah"] ?></td>
                <td>Rp<?= number_format($beli["subtotal"], 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="4">Total</th>
                <th>Rp<?= number_format($total, 0, ',', '.') ?></th>
            </tr>
        </table>
        <form method="post">
            <button type="submit" name="reset">Reset Belanja</button>
        </form>
    <?php else: ?>
        <p>Keranjang masih kosong.</p>
    <?php endif; ?>
</body>
</html>
