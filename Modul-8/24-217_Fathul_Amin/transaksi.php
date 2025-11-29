<?php
include "header.php";
$conn = mysqli_connect("localhost", "root", "", "praktikumdatabase");

date_default_timezone_set("Asia/Jakarta");

if (isset($_GET['hapus_trx'])) {
    $id_hapus = $_GET['hapus_trx'];

    $q_stok = mysqli_query($conn, "
        SELECT barang_id, qty FROM transaksi_detail WHERE transaksi_id='$id_hapus'
    ");

    while ($s = mysqli_fetch_assoc($q_stok)) {
        mysqli_query($conn, "
            UPDATE barang SET stok = stok + {$s['qty']}
            WHERE id='{$s['barang_id']}'
        ");
    }

    mysqli_query($conn, "DELETE FROM transaksi_detail WHERE transaksi_id='$id_hapus'");
    mysqli_query($conn, "DELETE FROM transaksi WHERE id='$id_hapus'");

    header("Location: transaksi.php");
    exit;
}

if (isset($_POST['lanjut_isi'])) {
    $tgl = $_POST['tgl_transaksi'];
    $id_pel = $_POST['pelanggan'];

    $waktu = $tgl; 

    mysqli_query($conn, "
        INSERT INTO transaksi (waktu_transaksi, total, pelanggan_id)
        VALUES ('$waktu', 0, '$id_pel')
    ");

    $id_baru = mysqli_insert_id($conn);
    header("Location: transaksi.php?id=$id_baru");
    exit;
}


$id_trx = $_GET['id'] ?? null;

if ($id_trx) {

    if (isset($_POST['simpan_item'])) {
        $id_brg = $_POST['barang'];
        $qty    = $_POST['jumlah'];

        $cek_brg = mysqli_query($conn, "SELECT harga, stok FROM barang WHERE id='$id_brg'");
        $d_brg = mysqli_fetch_assoc($cek_brg);

        if ($d_brg['stok'] < $qty) {
            echo "<script>alert('Stok tidak cukup!');</script>";
        } else {

            $cek_duplikat = mysqli_query($conn, "
                SELECT qty FROM transaksi_detail
                WHERE transaksi_id='$id_trx' AND barang_id='$id_brg'
            ");

            if (mysqli_num_rows($cek_duplikat) > 0) {
                mysqli_query($conn, "
                    UPDATE transaksi_detail
                    SET qty = qty + $qty
                    WHERE transaksi_id='$id_trx' AND barang_id='$id_brg'
                ");
            } else {
                mysqli_query($conn, "
                    INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
                    VALUES ('$id_trx', '$id_brg', '{$d_brg['harga']}', '$qty')
                ");
            }

            mysqli_query($conn, "
                UPDATE barang SET stok = stok - $qty WHERE id='$id_brg'
            ");

            mysqli_query($conn, "
                UPDATE transaksi 
                SET total = (SELECT IFNULL(SUM(harga * qty), 0) 
                             FROM transaksi_detail WHERE transaksi_id='$id_trx')
                WHERE id='$id_trx'
            ");
        }
    }


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
            SET total = (SELECT IFNULL(SUM(harga * qty),0) 
                         FROM transaksi_detail WHERE transaksi_id='$id_trx')
            WHERE id='$id_trx'
        ");

        header("Location: transaksi.php?id=$id_trx");
        exit;
    }

    $q_trx = mysqli_query($conn, "
        SELECT transaksi.*, pelanggan.nama 
        FROM transaksi 
        LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
        WHERE transaksi.id='$id_trx'
    ");
    $d_trx = mysqli_fetch_assoc($q_trx);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="transaksi-container">

<?php if (!$id_trx): ?>

<h3>Buat Transaksi Baru</h3>

<table class="form-table">
    <form method="POST">
        <tr>
            <td><strong>Tanggal</strong></td>
            <td><input type="date" name="tgl_transaksi" value="<?= date('Y-m-d') ?>" required></td>
        </tr>

        <tr>
            <td><strong>Pelanggan</strong></td>
            <td>
                <select name="pelanggan" required>
                    <option value="">- Pilih Pelanggan -</option>
                    <?php
                    $q = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama ASC");
                    while ($r = mysqli_fetch_assoc($q)) {
                        echo "<option value='{$r['id']}'>{$r['nama']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align:center;">
                <button type="submit" class="btn btn-detail" name="lanjut_isi">LANJUT ISI BARANG</button>
            </td>
        </tr>
    </form>
</table>


<?php else: ?>

<h3>Pelanggan: <?= $d_trx['nama'] ?></h3>

<table class="form-table">
    <form method="POST">
        <tr>
            <td><strong>Pilih Barang</strong></td>
            <td>
                <select name="barang" required>
                    <option value="">-- Pilih Barang --</option>
                    <?php
                    $q_brg = mysqli_query($conn, "SELECT * FROM barang WHERE stok > 0 ORDER BY nama_barang ASC");
                    while ($b = mysqli_fetch_assoc($q_brg)) {
                        echo "<option value='{$b['id']}'>{$b['nama_barang']} (Stok: {$b['stok']}) - Rp " . number_format($b['harga']) . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td><strong>Jumlah</strong></td>
            <td><input type="number" min="1" name="jumlah" required></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align:center;">
                <button type="submit" class="btn btn-detail" name="simpan_item">TAMBAH BARANG</button>
            </td>
        </tr>
    </form>
</table>

<br>

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
        $q_det = mysqli_query($conn, "
            SELECT transaksi_detail.*, barang.nama_barang 
            FROM transaksi_detail
            JOIN barang ON transaksi_detail.barang_id = barang.id
            WHERE transaksi_id='$id_trx'
        ");

        while ($r = mysqli_fetch_assoc($q_det)) {
            $sub = $r['harga'] * $r['qty'];
            echo "<tr>
                <td>{$r['nama_barang']}</td>
                <td>".number_format($r['harga'])."</td>
                <td>{$r['qty']}</td>
                <td>".number_format($sub)."</td>
                <td><a class='btn btn-hapus' href='?id=$id_trx&hapus={$r['barang_id']}'>Hapus</a></td>
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

<br>
<a href="transaksi.php" class="btn btn-selesai">Selesai</a>

<?php endif; ?>

<hr>

<h3>Riwayat Transaksi</h3>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php 
    $no = 1;

    $q = mysqli_query($conn, "
        SELECT transaksi.*, pelanggan.nama 
        FROM transaksi
        LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
        ORDER BY transaksi.waktu_transaksi ASC
    ");

    while ($row = mysqli_fetch_assoc($q)):

        $fix_total = mysqli_query($conn, "
            SELECT IFNULL(SUM(harga * qty),0) AS tot 
            FROM transaksi_detail WHERE transaksi_id='{$row['id']}'
        ");
        $ft = mysqli_fetch_assoc($fix_total);
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= date("d/m/Y", strtotime($row['waktu_transaksi'])); ?></td>
            <td><?= $row['nama'] ?: '-' ?></td>
            <td><?= number_format($ft['tot']) ?></td>
            <td>
                <a class="btn btn-hapus"
                   href="transaksi.php?hapus_trx=<?= $row['id'] ?>"
                   onclick="return confirm('Hapus transaksi ini?')">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div>

</body>
</html>
