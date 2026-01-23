<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "praktikumdatabase");

if (!isset($_SESSION['kasir'])) {
    header("Location: index.php");
    exit;
}

/* ============================================================
   1. BUAT TRANSAKSI BARU
   ============================================================ */
$id_transaksi = null;

if (isset($_POST['buat_transaksi'])) {
    $tgl    = $_POST['tgl_transaksi'];
    $id_pel = $_POST['pelanggan'];

    mysqli_query($conn, "
        INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
        VALUES ('$tgl 00:00:00', '', 0, '$id_pel')
    ");

    $id_transaksi = mysqli_insert_id($conn);
}

/* ============================================================
   2. JIKA SUDAH ADA TRANSAKSI (SETELAH BUAT HEADER)
   ============================================================ */
if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
}

/* ============================================================
   3. INPUT BARANG (FUNGSI MIRIP nota_detail)
   ============================================================ */
if ($id_transaksi && isset($_POST['simpan_item'])) {
    $id_brg = $_POST['barang'];
    $qty    = $_POST['jumlah'];

    // cek harga & stok
    $cek_brg = mysqli_query($conn, "SELECT harga, stok FROM barang WHERE id='$id_brg'");
    $d_brg = mysqli_fetch_assoc($cek_brg);

    if ($d_brg['stok'] < $qty) {
        echo "<script>alert('Stok tidak cukup!');</script>";
    } else {
        $subtotal = $d_brg['harga'] * $qty;

        // simpan detail
        mysqli_query($conn, "
            INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
            VALUES ('$id_transaksi', '$id_brg', '{$d_brg['harga']}', '$qty')
        ");

        // KURANGI STOK
        mysqli_query($conn, "UPDATE barang SET stok = stok - $qty WHERE id='$id_brg'");

        // UPDATE TOTAL
        mysqli_query($conn, "
            UPDATE transaksi SET total =
                (SELECT SUM(harga * qty) FROM transaksi_detail WHERE transaksi_id='$id_transaksi')
            WHERE id='$id_transaksi'
        ");
    }
}

/* ============================================================
   4. HAPUS BARANG (fungsi sama dengan nota_detail)
   ============================================================ */
if ($id_transaksi && isset($_GET['hapus'])) {
    $id_brg = $_GET['hapus'];

    // ambil qty untuk mengembalikan stok
    $cek_det = mysqli_query($conn, "
        SELECT qty FROM transaksi_detail 
        WHERE transaksi_id='$id_transaksi' AND barang_id='$id_brg'
    ");
    $det = mysqli_fetch_assoc($cek_det);

    // hapus item
    mysqli_query($conn, "
        DELETE FROM transaksi_detail
        WHERE transaksi_id='$id_transaksi' AND barang_id='$id_brg'
    ");

    // KEMBALIKAN STOK
    mysqli_query($conn, "
        UPDATE barang SET stok = stok + {$det['qty']} WHERE id='$id_brg'
    ");

    // UPDATE TOTAL
    mysqli_query($conn, "
        UPDATE transaksi SET total =
            (SELECT IFNULL(SUM(harga * qty),0) FROM transaksi_detail WHERE transaksi_id='$id_transaksi')
        WHERE id='$id_transaksi'
    ");

    header("Location: transaksi_satu_halaman.php?id=$id_transaksi");
    exit;
}

/* ============================================================
   5. DATA HEADER TRANSAKSI
   ============================================================ */
$data = null;
if ($id_transaksi) {
    $q = mysqli_query($conn, "
        SELECT transaksi.*, pelanggan.nama 
        FROM transaksi 
        LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
        WHERE transaksi.id='$id_transaksi'
    ");
    $data = mysqli_fetch_assoc($q);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Satu Halaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="kasir">Kasir: <?= $_SESSION['kasir'] ?></div>

    <?php if (!$id_transaksi) { ?>
        <!-- ==================== FORM BUAT TRANSAKSI ==================== -->
        <h2>Buat Transaksi Baru</h2>

        <form method="POST">
            <label>Tanggal:</label>
            <input type="date" name="tgl_transaksi" value="<?= date('Y-m-d') ?>" required>

            <label>Pelanggan:</label>
            <select name="pelanggan" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php
                $pel = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama ASC");
                while ($p = mysqli_fetch_assoc($pel)) {
                    echo "<option value='{$p['id']}'>{$p['nama']}</option>";
                }
                ?>
            </select>

            <button type="submit" name="buat_transaksi">Mulai Isi Barang</button>
        </form>

    <?php } else { ?>

        <!-- ====================== INPUT BARANG ======================= -->
        <h3>Transaksi ID: <?= $data['id'] ?> | Pelanggan: <?= $data['nama'] ?></h3>
        <h4>Tanggal: <?= $data['waktu_transaksi'] ?></h4>
        <hr>

        <form method="POST" class="form-inline">
            <select name="barang" required>
                <option value="">-- Pilih Barang --</option>
                <?php
                $q_brg = mysqli_query($conn, "SELECT * FROM barang WHERE stok > 0 ORDER BY nama_barang ASC");
                while ($b = mysqli_fetch_assoc($q_brg)) {
                    echo "<option value='{$b['id']}'>{$b['nama_barang']} (Stok: {$b['stok']}) - Rp " . number_format($b['harga']) . "</option>";
                }
                ?>
            </select>

            <input type="number" name="jumlah" min="1" placeholder="Qty" required>

            <button type="submit" name="simpan_item" class="btn-add">+ Tambah</button>
        </form>

        <!-- ====================== DETAIL TRANSAKSI ======================= -->
        <table>
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $qdet = mysqli_query($conn, "
                SELECT transaksi_detail.*, barang.nama_barang
                FROM transaksi_detail
                JOIN barang ON transaksi_detail.barang_id = barang.id
                WHERE transaksi_id='$id_transaksi'
            ");

            while ($r = mysqli_fetch_assoc($qdet)) {
                $sub = $r['harga'] * $r['qty'];

                echo "<tr>
                    <td>{$r['nama_barang']}</td>
                    <td>" . number_format($r['harga']) . "</td>
                    <td>{$r['qty']}</td>
                    <td>" . number_format($sub) . "</td>
                    <td><a href='?id=$id_transaksi&hapus={$r['barang_id']}' class='btn-del'>Hapus</a></td>
                </tr>";
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan='3' style='text-align:right;'>Total:</th>
                    <th colspan='2'>Rp <?= number_format($data['total']) ?></th>
                </tr>
            </tfoot>
        </table>

        <a href="transaksi_satu_halaman.php" class="btn-done">Selesai / Transaksi Baru</a>

    <?php } ?>
</div>

</body>
</html>
