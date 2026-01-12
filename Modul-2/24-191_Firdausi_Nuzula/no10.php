<?php
session_start();

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
    $_SESSION['daftar'] = "";
}

if (isset($_POST['menu']) && isset($_POST['jumlah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];
    $harga = 0;
    $nama_menu = "";

    if ($menu == 1) {
        $harga = 10000;
        $nama_menu = "Matcha Latte Ice";
    } elseif ($menu == 2) {
        $harga = 12000;
        $nama_menu = "Matcha Latte Lemon Ice";
    } elseif ($menu == 3) {
        $harga = 15000;
        $nama_menu = "Bundling Matcha Ice + Roti";
    } else {
        echo "<p style='color:red;'>Menu tidak tersedia!</p>";
    }

    if ($harga > 0) {
        $subtotal = $harga * $jumlah;
        $_SESSION['total'] += $subtotal;

        $_SESSION['daftar'] .= "$nama_menu x $jumlah = Rp $subtotal<br>";

        echo "<h3>Ditambahkan:</h3>";
        echo $_SESSION['daftar'];
        echo "<h3>Total Saat Ini: Rp " . $_SESSION['total'] . "</h3>";
        echo "<hr>";
    }
}

if (isset($_POST['selesai'])) {
    echo "<h3>Daftar Belanja:</h3>";
    echo $_SESSION['daftar'];
    echo "<h3>Total Belanja: Rp " . $_SESSION['total'] . "</h3>";
    $_SESSION['total'] = 0;
    $_SESSION['daftar'] = "";
    echo "<hr>";
}
?>

<h3>Menu</h3>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Menu</th>
        <th>Harga</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Matcha Latte Ice</td>
        <td>Rp 10.000</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Matcha Latte Lemon Ice</td>
        <td>Rp 12.000</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Bundling Matcha Ice + Roti</td>
        <td>Rp 15.000</td>
    </tr>
</table>

<br>

<form method="post">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>Pilih Menu (1-3)</td>
            <td><input type="number" name="menu" required></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="number" name="jumlah" required></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="Tambah Lagi">
</form>

<form method="post">
    <button type="submit" name="selesai">Selesai Belanja</button>
</form>

