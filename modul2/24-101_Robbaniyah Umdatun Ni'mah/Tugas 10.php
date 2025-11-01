<!DOCTYPE html>
<html>
<head>
    <title>Sistem Kasir</title>
</head>
<body>
    <h2>Menu Makanan</h2>
    <form method="POST">
        <select name="menu">
            <option value="Nasi Goreng">Nasi Goreng - 15000</option>
            <option value="Mie Ayam">Mie Ayam - 12000</option>
            <option value="Es Teh">Es Teh - 5000</option>
            <option value="Es Jeruk">Es Jeruk - 7000</option>
        </select>
        <input type="submit" name="add" value="Tambah">
        <input type="submit" name="selesai" value="Selesai">
    </form>

    <?php
    session_start();
    if (!isset($_SESSION['total'])) {
        $_SESSION['total'] = 0;
    }

    $harga_menu = [
        "Nasi Goreng" => 15000,
        "Mie Ayam" => 12000,
        "Es Teh" => 5000,
        "Es Jeruk" => 7000
    ];

    if (isset($_POST['add'])) {
        $item = $_POST['menu'];
        $_SESSION['total'] += $harga_menu[$item];
    }

    if (isset($_POST['selesai'])) {
        echo "<h3>Total Belanja: Rp " . $_SESSION['total'] . "</h3>";
        session_destroy();
    } else {
        echo "<h3>Total Belanja: Rp " . $_SESSION['total'] . "</h3>";
    }
    ?>
</body>
</html>