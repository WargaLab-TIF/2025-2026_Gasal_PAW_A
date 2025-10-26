<?php
session_start();


if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

$menu = [
    "Nasi Goreng" => 15000, "Mie Ayam" => 12000, "Bakso" => 10000,
    "Es Teh" => 5000, "Es Jeruk" => 6000
];




if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $item = $_POST['item'];
    $jumlah = (int)$_POST['jumlah'];
    if ($jumlah > 0 && isset($menu[$item])) { // Pastikan item ada di menu
        
        $_SESSION['keranjang'][$item] = ($_SESSION['keranjang'][$item] ?? 0) + $jumlah;
    }
    
    header("Location: soal10.php");
    exit();
}


if (isset($_GET['aksi']) && $_GET['aksi'] == 'kosongkan') {
    $_SESSION['keranjang'] = [];
    header("Location: soal10.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kasir Warung Sederhana</title>
</head>
<body>
    <h1>Warung Sederhana</h1>
    <hr>

    <?php
 
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'bayar') {
        
 
    ?>
        <h2>Struk Pembayaran</h2>
        
        <?php if (empty($_SESSION['keranjang'])): ?>
            <p>Tidak ada item untuk dibayar. Keranjang kosong.</p>
        <?php else: ?>
            <table border="1" cellpadding="5" cellspacing="0" style="width: 50%;">
                <thead>
                    <tr>
                        <th>Nama Item</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_harga = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $item => $jumlah): ?>
                        <?php
                            $harga_satuan = $menu[$item];
                            $subtotal = $jumlah * $harga_satuan;
                            $total_harga += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo $item; ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp <?php echo number_format($harga_satuan); ?></td>
                            <td>Rp <?php echo number_format($subtotal); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr style="font-weight: bold;">
                        <td colspan="3">Total Tagihan</td>
                        <td>Rp <?php echo number_format($total_harga); ?></td>
                    </tr>
                </tbody>
            </table>
            <p>Terima kasih telah berbelanja!</p>
            
            <?php
                
                $_SESSION['keranjang'] = []; 
            ?>
        <?php endif; ?>
        
        <hr>
        <a href="soal10.php"><button>Buat Pesanan Baru</button></a>

    <?php
    } else {
        
       
    ?>
        <h2>Pilih Menu</h2>
        <form action="soal10.php" method="post">
            <p>
                <label>Menu:</label>
                <select name="item">
                    <?php foreach ($menu as $nama => $harga): ?>
                        <option value="<?php echo $nama; ?>">
                            <?php echo $nama . " (Rp " . number_format($harga) . ")"; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label>Jumlah:</label>
                <input type="number" name="jumlah" value="1" min="1">
            </p>
            <button type="submit" name="tambah">Tambah ke Keranjang</button>
        </form>
        
        <hr>

        <h2>Isi Keranjang Saat Ini</h2>
        <?php if (empty($_SESSION['keranjang'])): ?>
            <p>Keranjang masih kosong.</p>
        <?php else: ?>
            <table border="1" cellpadding="5" style="width: 50%;">
                <tr><th>Nama Item</th><th>Jumlah</th></tr>
                <?php foreach ($_SESSION['keranjang'] as $item => $jumlah): ?>
                    <tr>
                        <td><?php echo $item; ?></td>
                        <td><?php echo $jumlah; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <br>
            <a href="soal10.php?aksi=bayar"><button>Lanjut ke Pembayaran</button></a>
            <a href="soal10.php?aksi=kosongkan" onclick="return confirm('Yakin ingin mengosongkan keranjang?');"><button>Kosongkan Keranjang</button></a>
        <?php endif; ?>
    <?php
    }
    ?>
</body>
</html>