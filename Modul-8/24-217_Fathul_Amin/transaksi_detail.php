<?php
$conn = mysqli_connect("localhost", "root", "", "praktikumdatabase");

if (!isset($_GET['id'])) { 
    header("Location: transaksi.php"); 
    exit; 
}

$id_trx = $_GET['id'];

// TAMBAH ITEM
if (isset($_POST['simpan_item'])) {
    $id_brg = $_POST['barang'];
    $qty    = $_POST['jumlah'];

    $cek_brg = mysqli_query($conn, "SELECT harga, stok FROM barang WHERE id='$id_brg'");
    $d_brg = mysqli_fetch_assoc($cek_brg);

    if ($d_brg['stok'] < $qty) {
        echo "<script>alert('Stok tidak cukup!');</script>";
    } else {
        mysqli_query($conn, "
            INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
            VALUES ('$id_trx', '$id_brg', '{$d_brg['harga']}', '$qty')
        ");

        mysqli_query($conn, "UPDATE barang SET stok = stok - $qty WHERE id='$id_brg'");

        mysqli_query($conn, "
            UPDATE transaksi 
            SET total = (SELECT SUM(harga * qty) FROM transaksi_detail WHERE transaksi_id='$id_trx')
            WHERE id='$id_trx'
        ");
    }
}

// HAPUS ITEM
if (isset($_GET['hapus'])) {
    $id_brg = $_GET['hapus'];

    $cek_det = mysqli_query($conn, "
        SELECT qty FROM transaksi_detail 
        WHERE transaksi_id='$id_trx' AND barang_id='$id_brg'
    ");
    $d_det = mysqli_fetch_assoc($cek_det);

    mysqli_query($conn, "
        DELETE FROM transaksi_detail 
        WHERE transaksi_id='$id_trx' AND barang_id='$id_brg'
    ");

    mysqli_query($conn, "
        UPDATE barang SET stok = stok + {$d_det['qty']}
        WHERE id='$id_brg'
    ");

    mysqli_query($conn, "
        UPDATE transaksi 
        SET total = (SELECT IFNULL(SUM(harga * qty),0) FROM transaksi_detail WHERE transaksi_id='$id_trx')
        WHERE id='$id_trx'
    ");

    header("Location: transaksi_detail.php?id=$id_trx");
    exit;
}

// DATA TRANSAKSI
$q_trx = mysqli_query($conn, "
    SELECT transaksi.*, pelanggan.nama 
    FROM transaksi 
    LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
    WHERE transaksi.id='$id_trx'
");
$d_trx = mysqli_fetch_assoc($q_trx);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
</head>
<body>

<h3>Transaksi #<?= $d_trx['id'] ?> | Pelanggan: <?= $d_trx['nama'] ?></h3>

<form method="POST">
    <select name="barang" required>
        <option value="">-- Pilih Barang --</option>
        <?php
        $q_brg = mysqli_query($conn, "SELECT * FROM barang WHERE stok > 0 ORDER BY nama_barang ASC");
        while($b = mysqli_fetch_assoc($q_brg)){
            echo "<option value='{$b['id']}'>{$b['nama_barang']} (Stok: {$b['stok']}) - Rp " . number_format($b['harga']) . "</option>";
        }
        ?>
    </select>

    <input type="number" name="jumlah" min="1" required>

    <button type="submit" name="simpan_item">Tambah</button>
</form>

<table border="1" cellpadding="7">
<thead>
<tr>
    <th>Barang</th><th>Harga</th><th>Qty</th><th>Subtotal</th><th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$q_det = mysqli_query($conn, "
    SELECT transaksi_detail.*, barang.nama_barang 
    FROM transaksi_detail
    JOIN barang ON transaksi_detail.barang_id = barang.id
    WHERE transaksi_id='$id_trx'
");
while($r = mysqli_fetch_assoc($q_det)){
    $sub = $r['harga'] * $r['qty'];
    echo "<tr>
        <td>{$r['nama_barang']}</td>
        <td>".number_format($r['harga'])."</td>
        <td>{$r['qty']}</td>
        <td>".number_format($sub)."</td>
        <td><a href='?id=$id_trx&hapus={$r['barang_id']}'>Hapus</a></td>
    </tr>";
}
?>
</tbody>
<tfoot>
<tr>
    <th colspan="3" style="text-align:right;">Total:</th>
    <th colspan="2">Rp <?= number_format($d_trx['total']) ?></th>
</tr>
</tfoot>
</table>

<a href="transaksi.php">Selesai</a>

</body>
</html>