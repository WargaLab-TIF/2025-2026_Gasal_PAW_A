<?php
require '../conn.php';
session_start();

$Q = "SELECT t.waktu_transaksi, SUM(td.harga) as total_harga FROM transaksi as t JOIN transaksi_detail as td ON t.id = td.transaksi_id GROUP BY transaksi_id";

$exe = mysqli_query($conn, $Q);
$has = mysqli_fetch_all($exe, MYSQLI_ASSOC);
// var_dump($has);

$tg = [];
$t_harga = [];
$data = [];

foreach ($has as $key => $value) {
    if (isset($_SESSION['date_first'], $_SESSION['date_last']) && !empty($_SESSION['date_first']) && !empty($_SESSION['date_last'])) {
        if ($value['waktu_transaksi'] >= $_SESSION['date_first'] && $value['waktu_transaksi'] <= $_SESSION['date_last']) {
            $tg[] = $value['waktu_transaksi'];
            $t_harga[] = $value['total_harga'];
            $data[] = $value;
        }
    } else {
        $tg[] = $value['waktu_transaksi'];
        $t_harga[] = $value['total_harga'];
        $data[] = $value;
    }
}

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>no</th>
            <th>Harga</th>
            <th>Tanggal</th>
        </tr>
        <?php $no = 0;
        $hasil = 0 ?>
        <?php for ($i = 0; $i < count($tg); $i++) { ?>
            <?php $no++ ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= 'Rp ' . $t_harga[$i] ?></td>
                <td><?= $tg[$i] ?></td>
                <?php $hasil += $t_harga[$i] ?>
            </tr>
        <?php } ?>
    </table>
    <h2>jumlah</h2>
    <table>
        <tr>
            <th>jumlah orang</th>
            <th>hasil</th>
        </tr>
        <tr>
            <td><?= count($tg) . ' orang' ?></td>
            <td><?= 'Rp' . $hasil ?></td>
        </tr>
    </table>
</body>

</html>