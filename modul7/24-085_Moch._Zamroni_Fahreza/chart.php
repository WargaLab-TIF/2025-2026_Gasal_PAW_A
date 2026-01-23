<?php 
require "koneksi.php";

if(isset($_POST['tampilkan'])){
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];

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
    // foreach($result as $v){
    //     $tPel += $v['id'];
    // }
}

// var_dump($tanggal);
// var_dump($total_harga);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <h1>Laporan Penjualan</h1>
  <p>Periode: <?= $dari ?> s/d <?= $sampai ?></p>

  <div class="no-print">
    <button onclick="window.location.href='./index.php'" style="background-color: red;">
      < Kembali</button>
        <button onclick="window.print()">Cetak</button>
        <button onclick="window.location='export_excel.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>'">Export to
          Excel</button>
  </div>

  <div style="text-align:center;">
    <canvas id="my_canvas"></canvas>
  </div>

  <script>
  const ctx = document.getElementById('my_canvas');
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($tanggal)  ?>,
      datasets: [{
        label: 'Report Penjualan',
        data: <?= json_encode($total_harga)  ?>,
        backgroundColor: 'gray',
        borderColor: 'black',
        borderWidth: 2
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


  <table border="1">
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
      <td><?= number_format($v['total_harga']); ?></td>
      <td><?= $v['tanggal']; ?></td>
    </tr>
    <?php } ?>
  </table>

  <table border="1" class="total-box">
    <tr>
      <th>Jumlah Pelanggan</th>
      <th>Jumlah Pendapatan</th>
    </tr>
    <tr>
      <td><?= $tPel; ?></td>
      <td><?= number_format($tPen); ?></td>
    </tr>
  </table>
</body>

</html>