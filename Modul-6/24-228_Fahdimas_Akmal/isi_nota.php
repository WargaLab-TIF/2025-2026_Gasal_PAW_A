<?php
$conn = mysqli_connect("localhost", "root", "", "Tugas_Pendahuluan_6");
// Kalau tidak ada id_nota, kembali ke tambah_nota.php
if (!isset($_GET['id_nota'])) { header("Location: tambah_nota.php"); exit; }
$id_nota = $_GET['id_nota'];

// --- PROSES TAMBAH BARANG (STOK BERKURANG) ---
if (isset($_POST['tambah'])) {
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];
    
    $cek = mysqli_query($conn, "SELECT harga, stok FROM barang WHERE id = '$barang_id'");
    $data_barang = mysqli_fetch_assoc($cek);

    // Validasi stok
    if ($data_barang['stok'] < $qty) {
        echo "<script>alert('STOK KURANG! Sisa: {$data_barang['stok']}'); window.location='isi_nota.php?id_nota=$id_nota';</script>";
        exit;
    }

    $harga_jual = $data_barang['harga']; // Asumsi harga di tabel barang adalah harga jual
    $subtotal = $harga_jual * $qty;

    // Masukkan ke nota_detail
    mysqli_query($conn, "INSERT INTO nota_detail (nota_id, barang_id, harga_jual, qty, subtotal) VALUES ('$id_nota', '$barang_id', '$harga_jual', '$qty', '$subtotal')");
    
    // KURANGI STOK
    mysqli_query($conn, "UPDATE barang SET stok = stok - $qty WHERE id = '$barang_id'");
    
    // Update total di tabel nota (opsional tapi bagus)
    mysqli_query($conn, "UPDATE nota SET total_transaksi = (SELECT SUM(subtotal) FROM nota_detail WHERE nota_id = '$id_nota') WHERE id = '$id_nota'");

    header("Location: isi_nota.php?id_nota=$id_nota"); exit;
}

// --- PROSES HAPUS ITEM (STOK KEMBALI) ---
if (isset($_GET['hapus_item'])) {
    $id_detail = $_GET['hapus_item'];
    $cek = mysqli_query($conn, "SELECT barang_id, qty FROM nota_detail WHERE id = '$id_detail'");
    $data = mysqli_fetch_assoc($cek);
  
    mysqli_query($conn, "DELETE FROM nota_detail WHERE id = '$id_detail'");
    // KEMBALIKAN STOK
    mysqli_query($conn, "UPDATE barang SET stok = stok + {$data['qty']} WHERE id = '{$data['barang_id']}'");
    
    // Update total nota lagi
    mysqli_query($conn, "UPDATE nota SET total_transaksi = (SELECT IFNULL(SUM(subtotal),0) FROM nota_detail WHERE nota_id = '$id_nota') WHERE id = '$id_nota'");

    header("Location: isi_nota.php?id_nota=$id_nota"); exit;
}

$master = mysqli_query($conn, "SELECT nota.*, pelanggan.nama as nm_pelanggan FROM nota JOIN pelanggan ON nota.pelanggan_id = pelanggan.id WHERE nota.id = '$id_nota'");
$d_nota = mysqli_fetch_assoc($master);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Isi Detail Nota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="header-nota">
        <h2 style="margin:0 0 10px 0;">Nota: <?= $d_nota['no_nota'] ?></h2>
        <div>Tanggal: <strong><?= $d_nota['tanggal'] ?></strong> &nbsp;|&nbsp; Pelanggan: <strong><?= $d_nota['nm_pelanggan'] ?></strong></div>
    </div>

    <h4>Tambah Barang</h4>
    <form method="POST">
        <div style="display: flex; gap: 5px;">
            <select name="barang_id" required style="flex: 3;">
                <option value="">-- Pilih Barang --</option>
                <?php
                $brg = mysqli_query($conn, "SELECT * FROM barang WHERE stok > 0 ORDER BY nama_barang ASC");
                while ($r = mysqli_fetch_assoc($brg)) {
                    echo "<option value='{$r['id']}'>{$r['nama_barang']} (Stok: {$r['stok']} | Rp ".number_format($r['harga']).")</option>";
                }
                ?>
            </select>
            <input type="number" name="qty" placeholder="Qty" required min="1" style="flex: 1;">
            <button type="submit" name="tambah" class="btn btn-blue">Tambah</button>
        </div>
    </form>

    <h4>Daftar Barang Dibeli:</h4>
    <table>
        <thead><tr style="background-color: #ddd;"><th>No</th><th>Barang</th><th>Harga</th><th>Qty</th><th>Subtotal</th><th>Aksi</th></tr></thead>
        <tbody>
            <?php
            $no = 1; $grand = 0;
            $det = mysqli_query($conn, "SELECT nd.*, b.nama_barang FROM nota_detail nd JOIN barang b ON nd.barang_id = b.id WHERE nota_id = '$id_nota'");
            while ($r = mysqli_fetch_assoc($det)) {
                $grand += $r['subtotal'];
                echo "<tr>
                    <td>".$no++."</td>
                    <td>{$r['nama_barang']}</td>
                    <td>Rp ".number_format($r['harga_jual'])."</td>
                    <td>{$r['qty']}</td>
                    <td>Rp ".number_format($r['subtotal'])."</td>
                    <td><a href='?id_nota=$id_nota&hapus_item={$r['id']}' class='btn-del' style='color:red;' onclick='return confirm(\"Batal beli ini?\")'>[X] Batal</a></td>
                </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr><td colspan="4" align="right"><strong>TOTAL:</strong></td><td colspan="2"><strong>Rp <?= number_format($grand) ?></strong></td></tr>
        </tfoot>
    </table>

    <a href="tambah_nota.php" class="btn btn-green" style="display:block; text-align:center; margin-top:20px; text-decoration:none;"> Selesai & Nota Baru </a>
</div>
</body>
</html>