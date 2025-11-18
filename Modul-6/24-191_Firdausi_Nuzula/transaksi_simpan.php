<?php
include 'koneksi.php';

// Ambil data dari form
$no_nota = $_POST['no_nota'];
$pelanggan_id = $_POST['pelanggan_id'];
$tanggal = $_POST['tanggal'];
$barang_id = $_POST['barang_id'];
$qty = $_POST['qty'];

// SIMPAN KE TABEL NOTA
$query_nota = "INSERT INTO nota (no_nota, pelanggan_id, tgl_nota, total)
               VALUES ('$no_nota', '$pelanggan_id', '$tanggal', 0)";
mysqli_query($conn, $query_nota);

$id_nota = mysqli_insert_id($conn);

// SIMPAN KE TABEL NOTA_DETAIL
$total = 0;
for ($i = 0; $i < count($barang_id); $i++) {
    if ($barang_id[$i] == "" || $qty[$i] == "") continue;

    $q = mysqli_query($conn, "SELECT harga FROM barang WHERE id = ".$barang_id[$i]);
    $row = mysqli_fetch_assoc($q);

    $harga = $row['harga'];
    $sub = $harga * $qty[$i];
    $total += $sub;

    $q_detail = "INSERT INTO nota_detail (id_nota, barang_id, qty, harga, subtotal)
                 VALUES ('$id_nota', '".$barang_id[$i]."', '".$qty[$i]."', '$harga', '$sub')";
    mysqli_query($conn, $q_detail);
}

// UPDATE TOTAL NOTA
mysqli_query($conn, "UPDATE nota SET total = '$total' WHERE id_nota = '$id_nota'");

// ALERT
echo "<script>
    alert('Transaksi berhasil disimpan!');
    window.location.href = 'transaksi_form.php';
</script>";
exit();
?>
