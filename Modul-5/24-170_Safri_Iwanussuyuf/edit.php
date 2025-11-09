<?php
require "conn.php";

$id = "";
$nama = "";
$telp = "";
$alamat = "";
$error_message = "";

// PROSES 1: PROSES UPDATE DATA (Saat tombol 'Update' ditekan)
//---------------------------------------------------------
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    // Siapkan statement (mencegah SQL Injection)
    $stmt = mysqli_prepare($conn, "UPDATE suppliers SET nama = ?, telp = ?, alamat = ? WHERE id = ?");
    
    // Bind parameter (sss = string, i = integer)
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $telp, $alamat, $id);

    // Eksekusi
    if (mysqli_stmt_execute($stmt)) {
        // Berhasil, kembalikan ke index.php
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Error: Gagal mengupdate data. " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

// PROSES 2: AMBIL DATA UNTUK FORM (Saat halaman baru dibuka)
//---------------------------------------------------------
// Periksa apakah ada 'id' di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM suppliers WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Isi variabel untuk nilai default form
        $nama = $row['nama'];
        $telp = $row['telp'];
        $alamat = $row['alamat'];
    } else {
        // ID tidak valid
        $error_message = "Data supplier tidak ditemukan.";
    }
    mysqli_stmt_close($stmt);
} else if (!isset($_POST['update'])) {
    // Jika tidak ada ID di GET dan bukan proses POST,
    // berarti halaman diakses secara ilegal.
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Edit Data Master Supplier</h1>

    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="edit.php" method="post">
        
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>"><br>
        
        <label for="telp">Telp</label>
        <input type="tel" name="telp" id="telp" value="<?php echo $telp; ?>"><br>
        
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?php echo $alamat; ?>">
        
        <button class="simpan" type="submit" name="update">Update</button>
        
        <button type="button" class="batal" onclick="location.href='index.php'">Batal</button>
    </form>
</body>
</html>