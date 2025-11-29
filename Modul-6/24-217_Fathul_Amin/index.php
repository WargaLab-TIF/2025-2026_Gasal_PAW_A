<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "praktikumdatabase");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pilih Kasir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h2 align="center">TOKO AMINN</h2>
    <p style="text-align:center; color:#555; margin-bottom:20px;">Silakan pilih kasir yang bertugas</p>

    <form method="POST">
        <select name="kasir" required>
            <option value="">-- Pilih Kasir --</option>
            <option value="Fathul">Fathu - kasir 1</option>
            <option value="Amin">Amin - kasir 2</option>
        </select>
        <button type="submit" name="pilih">Lanjut</button>
    </form>

    <?php
    if (isset($_POST['pilih'])) {
        $_SESSION['kasir'] = $_POST['kasir'];
        header("Location: nota.php");
        exit;
    }
    ?>
</div>
</body>
</html>