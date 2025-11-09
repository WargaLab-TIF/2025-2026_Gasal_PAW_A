<?php
$name = "";
$nim = "";
$email = "";

$name_err = "";
$nim_err = "";
$email_err = "";
$password_err = "";
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


    $email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (empty($_POST["email"])) {
        $email_err = "Email wajib diisi!";
    } elseif (!preg_match($email_regex, $_POST["email"])) {
        $email_err = "Format email tidak valid!";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $password_err = "Password wajib diisi!";
    } elseif (strlen($_POST["password"]) < 8) {
        $password_err = "Password minimal harus 8 karakter!";
    }

    if (empty($name_err) && empty($nim_err) && empty($email_err) && empty($password_err)) {
        $success_message = "Validasi lanjutan berhasil! Semua data diterima.";

        $name = "";
        $nim = "";
        $email = "";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi Lanjutan</title>
</head>
<body>

    <h2>Form dengan Validasi Lanjutan</h2>
    <p>Menambahkan validasi regex untuk email dan panjang untuk password.</p>

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

        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>">
            <span style="color: red;"><?php echo $email_err; ?></span>
        </div>

        <br>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span style="color: red;"><?php echo $password_err; ?></span>
        </div>

        <br>
        
        <button type="submit">Kirim</button>
    </form>

</body>
</html>