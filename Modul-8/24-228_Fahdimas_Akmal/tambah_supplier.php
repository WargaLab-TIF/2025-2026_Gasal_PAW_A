<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Master Supplier Baru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h2>Tambah Data Master Supplier Baru</h2>

    <form action="proses_tambah_supplier.php" method="POST">
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Nama" required>
        </div>
        <div>
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp" placeholder="telp" required>
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" placeholder="alamat" required>
        </div>
        <div>
            <label></label> <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
            <a href="supplier.php" class="btn btn-batal">Batal</a>
        </div>
    </form>

</body>
</html>