<?php
session_start();
require "conn.php";
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}
$error_message = "";

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $level = $_POST["level"];
    $alamat = $_POST["alamat"]; 
    $hp = $_POST["hp"];


    $password_enkripsi = md5($password);
    

    $tambah = "INSERT INTO user(username, password, nama, level, alamat, hp) 
               VALUES ('$username', '$password_enkripsi', '$nama', '$level', '$alamat', '$hp')";
    
    if (mysqli_query($conn, $tambah)) {
        echo "<script>alert ('Data user baru berhasil ditambahkan'); window.location.href='index.php';</script>";
        exit;
    }else {
        $error_message = "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah User Baru</h1>
    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    
    <form action="tambah.php" method="post">
        
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="username" required><br>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" required><br>
        
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="nama" required><br>
        
        <label for="level">Level</label>
        <input type="text" name="level" id="level" placeholder="Admin/User Biasa" required><br>
        
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" placeholder="alamat" required><br>
        
        <label for="hp">No. HP</label>
        <input type="tel" name="hp" id="hp" placeholder="nomor hp" required>
        
        <button class="simpan" type="submit" name="submit">Simpan</button>
        <button type="button" class="batal" onclick="location.href='index.php'">Batal</button>
    </form>
</body>
</html>