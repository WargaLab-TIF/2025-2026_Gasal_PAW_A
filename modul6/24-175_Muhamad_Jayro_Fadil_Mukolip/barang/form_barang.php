<?php 
include '../conn.php';

$query = "SELECT * FROM supplier";
$ex = mysqli_query($conn, $query);
$result = mysqli_fetch_all($ex, MYSQLI_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form method="post" action="process_data.php">
    <label for="kode">Kode Barang</label>
    <br>
    <input type="text" name="kode" id="kode" placeholder="BRG000">
    <br>
    <label for="nama">Nama Barang</label>
    <br>
    <input type="text" name="nama" id="nama" placeholder="barang saya">
    <br>
    <label for="harga">Harga Barang</label>
    <br>
    <input type="number" name="harga" id="harga" placeholder="10000">
    <br>
    <label for="stok">Stok Barang</label>
    <br>
    <input type="number" name="stok" id="stok" placeholder="100">
    <br>
    <label for="supplier">Supplier</label>
    <br>
    <select name="supplier" id="supplier">
      <?php foreach($result as $k => $v){ ?>
      <option value="<?= $v['id']; ?>"><?= $v['nama']; ?></option>
      <?php } ?>
    </select>

    <br>
    <br>
    <button type="submit" name="submit">Tambah</button>
  </form>
</body>

</html>