<?php
function simpanTransaksi($conn, $data) {
  $tanggal = $data['tanggal'];
  $metode = $data['metode'];
  $keterangan = $data['keterangan'];
  $barang_list = $data['barang_list'];

  mysqli_query($conn, "INSERT INTO nota (tanggal, metode_pembayaran, keterangan, total) VALUES ('$tanggal', '$metode', '$keterangan', 0)");

  $nota_id = mysqli_insert_id($conn);

  $total = 0;
  foreach ($barang_list as $b) {
    $bytes = random_bytes(4); 
    $codeBar = "BRG" . bin2hex($bytes); 
    $nama = $b['nama_barang'];
    $harga = $b['harga'];
    $stok = $b['stok'];
    $supplier_id = $b['supplier_id'];

    mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id, nota_id) VALUES ('$codeBar', '$nama', '$harga', '$stok', '$supplier_id', '$nota_id')");

    $total += $harga * $stok;
  }

  mysqli_query($conn, "UPDATE nota SET total = '$total' WHERE id = '$nota_id'");

  return $nota_id;
}
?>