<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ### Ambil data master ###
    $nomor_nota = $_POST['nomor_nota'];
    $tanggal = $_POST['tanggal'];
    $nama_pembeli = $_POST['nama_pembeli'];

    ### Simpan ke tabel master ###
    $sqlMaster = "INSERT INTO master_nota (nomor_nota, tanggal, nama_pembeli)
                  VALUES ('$nomor_nota', '$tanggal', '$nama_pembeli')";
    $resultMaster = mysqli_query($koneksi, $sqlMaster);



    if ($resultMaster) {
        $id_nota = mysqli_insert_id($koneksi); ### ambil id nota yang baru ###
        
        
        
        ### Simpan ke tabel detail ###
        foreach ($_POST['barang'] as $i => $nama_barang) {
            $jumlah = $_POST['jumlah'][$i];
            $harga = $_POST['harga'][$i];
            $sqlDetail = "INSERT INTO detail_nota (id_nota, nama_barang, jumlah, harga)
                          VALUES ('$id_nota', '$nama_barang', '$jumlah', '$harga')";
            mysqli_query($koneksi, $sqlDetail);
        }
        echo "<script>alert('Transaksi berhasil disimpan!');</script>";
    } else {
        echo "Gagal menyimpan data master: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form Transaksi (Master - Detail)</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px; }
    .box { background: white; padding: 20px; border-radius: 10px; width: 800px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    table { background-color: #ccc; border-collapse: collapse; width: 100%; margin-top: 10px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    button { background: #4CAF50; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer; }
    .btn-del { background: #f44336; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Form Transaksi Penjualan</h2>
    <form method="post" action="">
      <label>No. Nota:</label><br>
      <input type="text" name="nomor_nota" required><br>
      <label>Tanggal:</label><br>
      <input type="date" name="tanggal" required><br>
      <label>Nama Pembeli:</label><br>
      <input type="text" name="nama_pembeli" required><br><br>

      <h3>Detail Barang</h3>
      <table id="barangTable">
        <tr>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
        <tr>
          <td><input type="text" name="barang[]" required></td>
          <td><input type="number" name="jumlah[]" required></td>
          <td><input type="number" name="harga[]" step="0.01" required></td>
          <td><button type="button" class="btn-del" onclick="hapusRow(this)">Hapus</button></td>
        </tr>
      </table>
      <br>
      <button type="button" onclick="tambahRow()">+ Tambah Barang</button><br><br>
      <button type="submit">Simpan Transaksi</button>
    </form>
  </div>

  <script>
    function tambahRow() {
      var table = document.getElementById("barangTable");
      var row = table.insertRow(-1);
      row.innerHTML = `
        <td><input type="text" name="barang[]" required></td>
        <td><input type="number" name="jumlah[]" required></td>
        <td><input type="number" name="harga[]" step="0.01" required></td>
        <td><button type="button" class="btn-del" onclick="hapusRow(this)">Hapus</button></td>`;
    }
    function hapusRow(btn) {
      var row = btn.parentNode.parentNode; //-### ambil baris <tr> tempat tombol hapus diklik ###
      row.parentNode.removeChild(row);
    }
  </script>
</body>
</html>
