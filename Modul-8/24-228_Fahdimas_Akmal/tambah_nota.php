<?php
$conn = mysqli_connect("localhost", "root", "", "Tugas_Pendahuluan_6");

if (isset($_POST['buat'])) {
    $no = $_POST['no_nota']; 
    $tgl = $_POST['tanggal'];
    $pelanggan = $_POST['pelanggan_id'];
    
  
    $cek = mysqli_query($conn, "SELECT * FROM nota WHERE no_nota = '$no'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('GAGAL! Nomor Nota $no sudah pernah dipakai.');</script>";
    } else {
        $query = "INSERT INTO nota (no_nota, tanggal, pelanggan_id) VALUES ('$no', '$tgl', '$pelanggan')";
        if (mysqli_query($conn, $query)) {
            header("Location: isi_nota.php?id_nota=" . mysqli_insert_id($conn));
            exit;
        } else {
            echo "<script>alert('Gagal membuat nota: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buat Nota Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">Kembali ke Dashboard</a>
  </div>
</nav>
    <div class="container" style="max-width: 500px; margin-top: 50px;"> 
        <h3 style="text-align: center;">Mulai Transaksi Penjualan</h3>
        <form method="POST">
            <p>
                <label>No. Nota :</label><br>
                <input type="text" name="no_nota" placeholder="Contoh: INV-001" required style="background-color: #fff; border: 2px solid #007BFF;">
            </p>
            <p>
                <label>Tanggal:</label><br>
                <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required>
            </p>
            <p>
                <label>Pelanggan:</label><br>
                <select name="pelanggan_id" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama ASC");
                    while($r = mysqli_fetch_assoc($res)) {
                        echo "<option value='{$r['id']}'>{$r['nama']}</option>";
                    }
                    ?>
                </select>
            </p>
            <br>
            <button type="submit" name="buat" class="btn btn-green" style="width: 100%;">Lanjut Isi Barang &rarr;</button>
        </form>
    </div>
</body>
</html>