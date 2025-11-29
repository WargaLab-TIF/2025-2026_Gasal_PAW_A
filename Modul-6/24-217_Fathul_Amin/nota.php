<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "praktikumdatabase");

// Jika kasir belum pilih kasir otomatis ke index
if (!isset($_SESSION['kasir'])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST['lanjut_isi'])) {
    $no_nota   = $_POST['no_nota'];        
    $tgl       = $_POST['tgl_transaksi'];  
    $id_pel    = $_POST['pelanggan'];    

    // Cek apakah nomor nota 
    $cek = mysqli_query($conn, "SELECT id FROM nota WHERE no_nota = '$no_nota'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Nomor Nota sudah ada! Ganti yang lain.');</script>";
    } else {
        $q_simpan = "INSERT INTO nota (no_nota, tanggal, pelanggan_id, total_transaksi) 
                     VALUES ('$no_nota', '$tgl', '$id_pel', 0)";

        if (mysqli_query($conn, $q_simpan)) {
            $id_baru = mysqli_insert_id($conn);

            header("Location: detail_nota.php?id=$id_baru");
            exit;
        } else {
            echo "Gagal: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buat Nota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <div class="kasir">
        Kasir: <?= $_SESSION['kasir'] ?>
        <!-- tombol logout dihilangkan -->
    </div>

    <h3>Buat Nota</h3>
    <form method="POST">
        <label>Nomor Nota:</label>
        <input type="text" name="no_nota" required placeholder="Misal: HP- / LP- / AK-">

        <label>Tanggal:</label>
        <input type="date" name="tgl_transaksi" value="<?= date('Y-m-d') ?>" required>

        <label>Pilih Pelanggan:</label>
        <select name="pelanggan" required>
            <option value="">- Pilih -</option>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama ASC");
            while ($r = mysqli_fetch_assoc($q)) {
                echo "<option value='{$r['id']}'>{$r['nama']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="lanjut_isi">ISI BARANG</button>
    </form>
</div>
</body>
</html>
