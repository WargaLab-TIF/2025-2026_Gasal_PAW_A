<?php
require 'config.php';
require 'func.php';
$data = [
  'tanggal' => $_POST['tanggal'],
  'metode' => $_POST['metode'],
  'keterangan' => $_POST['keterangan'],
  'barang_list' => []
];

for ($i = 0; $i < count($_POST['nama_barang']); $i++) {
  $data['barang_list'][] = [
    'nama_barang' => $_POST['nama_barang'][$i],
    'harga' => $_POST['harga'][$i],
    'stok' => $_POST['stok'][$i],
    'supplier_id' => $_POST['supplier_id'][$i]
  ];
}

$nota_id = simpanTransaksi($conn, $data);

echo "<script>
        alert('Transaksi berhasil disimpan (ID Nota: $nota_id)!');
        window.location.href = './form.php';
      </script>";
exit;
?>