<?php
require 'config.php';

$tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : '';
$tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : '';

$query = "SELECT t.waktu_transaksi, SUM(td.harga * td.qty) as total_harga FROM transaksi as t 
            JOIN transaksi_detail as td ON t.id = td.transaksi_id";

$result = [];
if ($tgl_awal && $tgl_akhir){
    $query .= " WHERE t.waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir'";
    $query .= " GROUP BY t.id";
    $execute = mysqli_query($conn, $query);
    $result = mysqli_fetch_all($execute, MYSQLI_ASSOC);
}

$tanggal = [];
$total_harga = [];
$data = [];
if (!empty($result)){
    foreach ($result as $value){
        $tanggal[] = $value['waktu_transaksi'];
        $total_harga[] = $value['total_harga'];
        $data[] = $value;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHART JS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        .container{
            width: 100%;
            margin: auto;
        }
        @media print{
            canvas {
                width: 100% !important;
                height: auto !important;
            }
            @page {
                margin: 0;
            }
            body {
                transform: scale(0.85);
                transform-origin: top left;
                width: 100%;
                margin: 0;
                padding: 0;
            }
            .btn{
                display: none;
            }
            .no-print,
            .no-print-excel{
                display: none;
            }
            .form-date{
                display: none !important;
            }        
            body, html, #page-container, .scrollable-page, .ps, .panel {
                height: 100% !important;
                width: 100% !important;
                display: inline-block;
            }
        }
        h1{
            text-align: center;
        }
        .form-date {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-date input[type="date"] {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .form-date input[type="submit"] {
            padding: 8px 20px;
            background-color: #66b506ff;
            color: white;
            border: none;
            border-radius: 6px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Rekap Laporan Penjualan Mulai
        <?php if ($tgl_awal && $tgl_akhir) : ?>
            (<?= date('d F Y', strtotime($tgl_awal)) ?> – <?= date('d F Y', strtotime($tgl_akhir)) ?>)
        <?php endif; ?>
        </h1>
        <br>
        <form action="" method="get" class="form-date">
            <input type="date" name="tgl_awal" value="<?= $tgl_awal; ?>">
            <input type="date" name="tgl_akhir" value="<?= $tgl_akhir; ?>">
            <input type="submit" name="submit" value="Tampilkan">
        </form>
        <br>
        <button type="button" onclick="window.print()" class="btn btn-danger"><b><i class="bi bi-printer"></i> Cetak</b></button>
        <button type="button "onclick="window.location='export_excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>'" class='btn btn-danger'><b><i class="bi bi-printer"></i> Excel</b></button>
    
        <canvas id="mycanvas"></canvas>
        <script>
            const ctx = document.getElementById('mycanvas');
            const canvas = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: <?= json_encode($tanggal)?>,
                datasets: [{
                    label: 'Report Penjualan',
                    data: <?= json_encode($total_harga)?>,
                    backgroundColor : '#d6d4d4ff',
                    borderColor : 'black',
                    borderWidth: 0,
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
        </script>
        <br>
        <table class="table table-bordered">
            <thead class='table-primary'>
                <tr>
                    <th>No</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($result)){
                    $no = 1;
                    foreach ($result as $row){
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>Rp. " . $row['total_harga']. "</td>";
                        echo "<td>" . date('d F Y', strtotime ($row['waktu_transaksi'])). "</td>";
                        echo "</tr>";
                    }
                }
                    ?>
            </tbody>
        </table>
        <table class="table table-bordered" style="width: 500px;">
                <tr class='table-primary'>
                    <th>Jumlah Pelanggan</th>
                    <th>Jumlah Pendapatan</th>
                </tr>
                <?php if (!empty($result)): ?>
                    <tr>
                        <th><?= count($result) ?> Orang</th>
                        <th>Rp. <?= array_sum($total_harga)?></th>
                    </tr>
                <?php else: ?>
                    <tr>
                        <th>0</th>
                        <th>Rp. 0</th>
                    </tr>
                <?php endif; ?>
        </table>
    </div>
</body>
</html>