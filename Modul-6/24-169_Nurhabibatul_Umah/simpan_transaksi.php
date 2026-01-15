<?php
require 'config.php';

if(!isset($_POST['tgl'], $_POST['id'], $_POST['total_transaksi'])) {
    die("Data transaksi belum dikirim. Pastikan mengisi form dengan benar.");
}

$tgl = $_POST['tgl'];
$id_pelanggan = $_POST['id'];
$total = $_POST['total_transaksi'];

$sql_nota = "INSERT INTO nota (tanggal, pelanggan_id, total) VALUES ('$tgl', '$id_pelanggan', '$total')";

$query = mysqli_query($conn, $sql_nota);
if (!$query) {
    die("Gagal menyimpan nota: " . mysqli_error($conn));
}

$id_nota = mysqli_insert_id($conn);
$barang = $_POST['pilih_barang'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$subtotal = $_POST['subtotal'];

for ($i=0; $i < count($barang); $i++){
    if ($barang[$i] == ''){
        continue;
    }

    $id_barang = $barang[$i];
    $jml = $qty[$i];
    $hrg = $harga[$i];
    $sub = $subtotal[$i];

    $sql_nota_detail = "INSERT INTO nota_detail (id_nota, id_barang, qty, harga, subtotal) VALUES ('$id_nota', '$id_barang', '$jml', '$hrg', '$sub')";
    $query_nota_detail = mysqli_query($conn, $sql_nota_detail);
}
echo "
<script>
    alert('Transaksi berhasil disimpan!');
    window.location.href = 'transaksi.php';
</script>
";
?>