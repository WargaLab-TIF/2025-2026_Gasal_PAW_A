<?php 
require "koneksi.php";

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

$query = "SELECT DATE(t.waktu_transaksi) AS tanggal, SUM(td.harga) AS total_harga
        FROM transaksi t JOIN transaksi_detail td ON t.id = td.transaksi_id
        WHERE t.waktu_transaksi BETWEEN '$dari' AND '$sampai' GROUP BY DATE(t.waktu_transaksi)";

$execute = mysqli_query($conn, $query);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal = [];
$total_harga = [];
$data = [];
$tPel = count(mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM transaksi AS t WHERE t.waktu_transaksi BETWEEN '$dari' AND '$sampai'"), MYSQLI_ASSOC));
$tPen = 0;
foreach($result as $value){
    $tanggal[] = $value['tanggal'];
    $total_harga[] = $value['total_harga'];
    $data[] = $value;
}
foreach ($total_harga as $key => $value) {
    $tPen += $value;
}
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header("Content-Disposition: attachment; filename=reporting.xls");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Rekap Laporan Penjualan</h2>
  <p><?= $dari; ?> sampai <?= $sampai; ?></p>

  <hr>

  <table border="1" cellpadding="1" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Total</th>
      <th>Tanggal</th>
    </tr>
    <?php 
        $no = 1; 
        foreach($data as $k => $v){ ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $v['total_harga']; ?></td>
      <td><?= $v['tanggal']; ?></td>
    </tr>
    <?php } ?>
  </table>

  <br>

  <table border="1" cellpadding="1" cellspacing="0">
    <tr>
      <th>Jumlah Pelanggan</th>
      <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
      <td><?= $tPel; ?></td>
      <td><?= $tPen; ?></td>
    </tr>
  </table>
</body>

</html>