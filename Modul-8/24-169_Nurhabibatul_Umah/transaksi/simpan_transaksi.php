<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location: ../../login/login.php");
    exit;
}
require '../config.php';

if(!isset($_POST['tgl'], $_POST['id'], $_POST['total_transaksi'])) {
    die("Data transaksi belum dikirim. Pastikan mengisi form dengan benar.");
}

$tgl = $_POST['tgl'];
$id_pelanggan = $_POST['id'];
$total = $_POST['total_transaksi'];
$keterangan = $_POST['keterangan'];

$sql_nota = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) VALUES ('$tgl', '$keterangan', '$total', '$id_pelanggan')";
$query = mysqli_query($conn, $sql_nota);

if (!$query) {
    die("Gagal menyimpan transaksi: " . mysqli_error($conn));
}

$id_transaksi = mysqli_insert_id($conn);

$barang = $_POST['pilih_barang'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];

for ($i = 0; $i < count($barang); $i++) {

    if ($barang[$i] == '') continue;

    $id_barang = $barang[$i];
    $jumlah = $qty[$i];
    $harga_satuan = $harga[$i];

    $cek = mysqli_query($conn, "SELECT stok FROM barang WHERE id='$id_barang'");
    $data_barang = mysqli_fetch_assoc($cek);

    if ($data_barang['stok'] < $jumlah) {
        echo "
        <script>
            alert('Stok barang tidak cukup!');
            window.location.href = 'transaksi.php';
        </script>";
        exit;
    }

    $sql_detail = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
                   VALUES ('$id_transaksi', '$id_barang', '$harga_satuan', '$jumlah')";
    mysqli_query($conn, $sql_detail);

    // UPDATE STOK BARANG (DIKURANGI)
    $sql_update_stok = "UPDATE barang SET stok = stok - $jumlah WHERE id = '$id_barang'";
    mysqli_query($conn, $sql_update_stok);
}

echo "
<script>
    alert('Transaksi berhasil disimpan!');
    window.location.href = 'transaksi.php';
</script>
";
?>
