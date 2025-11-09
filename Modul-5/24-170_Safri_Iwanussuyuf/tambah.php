<?php
require "conn.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="nama"><br>
        <label for="telp">Telp</label>
        <input type="tel" name="telp" id="telp" placeholder="telp"><br>
        <label for="alamat">alamat</label>
        <input type="text" name="alamat" id="alamat" placeholder="alamat">
        <button class="simpan" type="submit" name="submit">Simpan</button>
        <button class="batal" onclick="location.href='index.php'">Batal</button>
    </form>
</body>
</html>