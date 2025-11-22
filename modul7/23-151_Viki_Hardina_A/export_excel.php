<?php
include 'koneksi.php';


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan.xls");

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

$q = mysqli_query($koneksi, "
    SELECT p.*, t.pelanggan_id
    FROM pembayaran p
    JOIN transaksi t ON p.transaksi_id = t.id
    WHERE DATE(waktu_bayar) BETWEEN '$dari' AND '$sampai'
    ");
?>
<link rel="stylesheet" href="style.css">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Pelanggan</th>
    </tr>

<?php while ($d = mysqli_fetch_assoc($q)) { ?>
<tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['waktu_bayar'] ?></td>
    <td><?= $d['total'] ?></td>
    <td><?= $d['pelanggan_id'] ?></td>
</tr>
<?php } ?>
</table>
