<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        input { margin: 5px; padding: 6px; }
        .barang-item { margin-bottom: 8px; }
        button { padding: 6px 12px; margin-top: 10px; }
        a { text-decoration: none; color: white; background: gray; padding: 5px 10px; border-radius: 4px; }
    </style>
</head>
<body>

<h2>Form Input Transaksi (Nota & Barang)</h2>

<form method="POST" action="transaksi_store.php">
    <label>Tanggal:</label>
    <input type="date" name="tanggal" required><br>

    <label>Pelanggan:</label>
    <input type="text" name="pelanggan" placeholder="Nama pelanggan" required><br><br>

    <h3>Data Barang</h3>
    <div id="barang-list">
        <div class="barang-item">
            <input type="text" name="barang[0][kode]" placeholder="Kode Barang" required>
            <input type="text" name="barang[0][nama]" placeholder="Nama Barang" required>
            <input type="number" name="barang[0][jumlah]" placeholder="Jumlah" required>
            <input type="number" name="barang[0][harga]" placeholder="Harga" required>
        </div>
    </div>

    <button type="button" onclick="tambahBarang()">+ Tambah Barang</button><br><br>
    <button type="submit">Simpan Transaksi</button>
    <a href="index.php">Kembali</a>
</form>

<script>
let i = 1;
function tambahBarang() {
    let div = document.createElement('div');
    div.classList.add('barang-item');
    div.innerHTML = `
        <input type="text" name="barang[${i}][kode]" placeholder="Kode Barang" required>
        <input type="text" name="barang[${i}][nama]" placeholder="Nama Barang" required>
        <input type="number" name="barang[${i}][jumlah]" placeholder="Jumlah" required>
        <input type="number" name="barang[${i}][harga]" placeholder="Harga" required>
    `;
    document.getElementById('barang-list').appendChild(div);
    i++;
}
</script>

</body>
</html>