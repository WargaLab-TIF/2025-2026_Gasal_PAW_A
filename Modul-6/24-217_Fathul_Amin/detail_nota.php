<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "praktikumdatabase");

if (!isset($_SESSION['kasir'])) { 
    header("Location: index.php"); 
    exit; 
}
if (!isset($_GET['id'])) { 
    header("Location: nota.php"); 
    exit; 
}

$id_nota = $_GET['id'];

// tambah item ke nota
if (isset($_POST['simpan_item'])) {
    $id_brg = $_POST['barang'];
    $qty = $_POST['jumlah'];

    // Ambil info barang
    $cek_brg = mysqli_query($conn, "SELECT harga, stok FROM barang WHERE id='$id_brg'");
    $d_brg = mysqli_fetch_assoc($cek_brg);

    // Cek stok
    if ($d_brg['stok'] < $qty) {
        echo "<script>alert('Stok tidak cukup!');</script>";
    } else {
        $subtotal = $d_brg['harga'] * $qty;

        mysqli_query($conn, "INSERT INTO nota_detail (nota_id, barang_id, harga_jual, qty, subtotal)
            VALUES ('$id_nota', '$id_brg', '{$d_brg['harga']}', '$qty', '$subtotal')");
        mysqli_query($conn, "UPDATE barang SET stok = stok - $qty WHERE id='$id_brg'");
        mysqli_query($conn, "UPDATE nota SET total_transaksi = 
            (SELECT SUM(subtotal) FROM nota_detail WHERE nota_id='$id_nota') WHERE id='$id_nota'");
    }
}

// hapus item
if (isset($_GET['hapus'])) {
    $id_det = $_GET['hapus'];

    // balikin stok
    $cek_det = mysqli_query($conn, "SELECT barang_id, qty FROM nota_detail WHERE id='$id_det'");
    $d_det = mysqli_fetch_assoc($cek_det);

    mysqli_query($conn, "DELETE FROM nota_detail WHERE id='$id_det'");
    mysqli_query($conn, "UPDATE barang SET stok = stok + {$d_det['qty']} WHERE id='{$d_det['barang_id']}'");

    mysqli_query($conn, "UPDATE nota SET total_transaksi = 
        (SELECT IFNULL(SUM(subtotal),0) FROM nota_detail WHERE nota_id='$id_nota') WHERE id='$id_nota'");
    
    header("Location: detail_nota.php?id=$id_nota");
    exit;
}

// data nota
$q_nota = mysqli_query($conn, "SELECT nota.*, pelanggan.nama FROM nota 
                               JOIN pelanggan ON nota.pelanggan_id=pelanggan.id 
                               WHERE nota.id='$id_nota'");
$d_nota = mysqli_fetch_assoc($q_nota);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Isi Nota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="kasir">
        Kasir: <?= $_SESSION['kasir'] ?>
    </div>

    <h3>Nota: <?= $d_nota['no_nota'] ?> | Pelanggan: <?= $d_nota['nama'] ?></h3>
    <hr>

    <form method="POST" class="form-inline">
        <select name="barang" required>
            <option value="">-- Pilih Barang --</option>
            <?php
            $q_brg = mysqli_query($conn, "SELECT * FROM barang WHERE stok > 0 ORDER BY nama_barang ASC");
            while($b = mysqli_fetch_assoc($q_brg)){
                echo "<option value='{$b['id']}'>{$b['nama_barang']} (Stok: {$b['stok']}) - Rp ".number_format($b['harga'])."</option>";
            }
            ?>
        </select>
        <input type="number" name="jumlah" placeholder="Qty" min="1" required>
        <button type="submit" name="simpan_item" class="btn-add">+ Tambah</button>
    </form>

    <table>
        <thead>
            <tr><th>Barang</th><th>Harga</th><th>Qty</th><th>Subtotal</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php
            $q_det = mysqli_query($conn, "SELECT nota_detail.*, barang.nama_barang 
                                          FROM nota_detail JOIN barang ON nota_detail.barang_id=barang.id 
                                          WHERE nota_id='$id_nota'");
            while($r = mysqli_fetch_assoc($q_det)){
                echo "<tr>
                    <td>{$r['nama_barang']}</td>
                    <td>".number_format($r['harga_jual'])."</td>
                    <td>{$r['qty']}</td>
                    <td>".number_format($r['subtotal'])."</td>
                    <td><a href='?id=$id_nota&hapus={$r['id']}' class='btn btn-del'>Hapus</a></td>

                </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr><th colspan='3' style='text-align:right;'>Total:</th><th colspan='2'>Rp <?= number_format($d_nota['total_transaksi']) ?></th></tr>
        </tfoot>
    </table>

    <a href="nota.php" class="btn-done">Selesai Transaksi</a>
</div>
</body>
</html>