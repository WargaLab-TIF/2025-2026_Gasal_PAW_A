<?php 
require 'config.php';
$q = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM supplier"), MYSQLI_ASSOC);

$fieldBarang = isset($_POST['fieldBarang']) ? $_POST['fieldBarang'] : 1;

if (isset($_POST['tambah'])) {
  $fieldBarang++;
}
if (isset($_POST['reset'])) {
  $fieldBarang = 1;
}

$total = 0;
if(!empty($_POST['harga']) && !empty($_POST['stok'])){
    for($i=0; $i < count($_POST['harga']); $i++){
        $harga = (float)($_POST['harga'][$i] ?? 0);
        $stok  = (int)($_POST['stok'][$i] ?? 0);
        $total += $harga * $stok;
    }
}
 
$nama_barang = $_POST['nama_barang'] ?? [];
$harga = $_POST['harga'] ?? [];
$stok = $_POST['stok'] ?? [];
$supplier_id = $_POST['supplier_id'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Transaksi</title>
</head>

<body>
  <h2>Input Transaksi</h2>

  <form method="post">
    <label for="tanggal">Tanggal</label>
    <br>
    <input type="date" name="tanggal" id="tanggal" value="<?= $_POST['tanggal'] ?? '' ?>" required>
    <br>

    <label for="metode">Metode Pembayaran</label>
    <br>
    <select name="metode" id="metode" required>
      <option value="Tunai">Tunai</option>
      <option value="Transfer">Transfer</option>
    </select>
    <br>

    <label for="keterangan">Keterangan</label>
    <br>
    <textarea name="keterangan" id="keterangan" cols="30" rows="3"><?= $_POST['keterangan'] ?? '' ?></textarea>
    <br>

    <h3>Detail Barang</h3>

    <?php for($i = 0; $i < $fieldBarang; $i++){ ?>
    <fieldset style="width: 350px; margin-bottom: 10px;">
      <legend>Barang <?= $i + 1 ?></legend>
      <input type="text" name="nama_barang[]" value="<?= $nama_barang[$i] ?? '' ?>" placeholder="Nama Barang...."
        required>
      <br>
      <input type="number" name="harga[]" value="<?= $harga[$i] ?? '' ?>" placeholder="Harga....." required>
      <br>
      <input type="number" name="stok[]" value="<?= $stok[$i] ?? '' ?>" placeholder="Stok...." required>
      <br>
      <select name="supplier_id[]">
        <?php foreach($q as $k => $v){ ?>
        <option value="<?= $v['id']; ?>"><?= $v['nama']; ?></option>
        <?php } ?>
      </select>
      <br>
    </fieldset>
    <?php } ?>

    <input type="hidden" name="fieldBarang" value="<?= $fieldBarang; ?>">

    <button type="submit" name="tambah">Tambah Barang</button>
    <button type="submit" name="reset">Reset</button>
    <button type="submit" name="simpan" formaction="./process.php">Simpan Transaksi</button>
  </form>

  <h4>Total: <?= number_format($total, 0, ',', '.'); ?></h4>
</body>

</html>