<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-simpan { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; }
        .btn-batal { background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Data Master Supplier Baru</h2>
    
    <form method="POST" action="store_supplier.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required placeholder="Contoh: PT ABC Sentosa">
        
        <label for="telp">Telp:</label>
        <input type="text" id="telp" name="telp" required placeholder="Contoh: 08123456789">
        
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required placeholder="Masukkan alamat lengkap"></textarea>
        
        <button type="submit" class="btn-simpan">Simpan</button>
        <a href="list_supplier.php" class="btn-batal" style="display: inline-block;">Batal</a>
    </form>
</div>

</body>
</html>