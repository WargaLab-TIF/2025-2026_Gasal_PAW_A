<?php
$name = "";
$nim = "";
$name_err = "";
$nim_err = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_err = "Nama wajib diisi!";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }


    if (empty($_POST["nim"])) {
        $nim_err = "NIM wajib diisi!";
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
    }

    if (empty($name_err) && empty($nim_err)) {
        $success_message = "Validasi berhasil! Data diterima.";

        $name = "";
        $nim = "";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas 4 - Validasi Server</title>
</head>
<body>

    <h2>Form Input Mahasiswa</h2>
    <p>Form dengan validasi sisi server (mengecek input kosong).</p>

    <?php

    if (!empty($success_message)) {
        echo "<p><b>$success_message</b></p>";
    }
    ?>

    <form action="" method="post">
        
        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            <span style="color: red;"><?php echo $name_err; ?></span>
        </div>
        
        <br>

        <div>
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>">
            <span style="color: red;"><?php echo $nim_err; ?></span>
        </div>

        <br>
        
        <button type="submit">Kirim</button>
    </form>

</body>
</html>