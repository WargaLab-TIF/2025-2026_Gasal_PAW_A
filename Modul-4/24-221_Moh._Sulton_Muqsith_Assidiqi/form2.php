<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 420px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="url"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 12px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #0078d7;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            font-size: 15px;
        }
        input[type="submit"]:hover {
            background-color: #005fa3;
        }
        .error {
            background: #ffe6e6;
            border: 1px solid #ff9999;
            color: #b30000;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .success {
            background: #e6ffe6;
            border: 1px solid #99ff99;
            color: #007a00;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
<?php
require_once 'validate.inc';

$errors = array();
$hasFormData = !empty($_POST);

if ($hasFormData) {
    $isValid = true;
    $isValid &= validateName($_POST, 'surname', $errors);
    $isValid &= validateEmail($_POST, 'email', $errors);
    $isValid &= validateAge($_POST, 'age', $errors);
    $isValid &= validatePhone($_POST, 'phone', $errors);
    $isValid &= validateURL($_POST, 'website', $errors);

    if (!$isValid) {
        echo '<div class="error"><strong>Terjadi kesalahan pada input:</strong><br>';
        foreach ($errors as $field => $error) {
            echo ucfirst($field) . ': ' . htmlspecialchars($error) . '<br>';
        }
        echo '</div>';
    } else {
        echo '<div class="success"><strong>Data berhasil dikirim!</strong></div>';
        echo '<div><strong>Data yang dikirim:</strong><br>';
        echo 'Nama Belakang: ' . htmlspecialchars($_POST['surname']) . '<br>';
        echo 'Email: ' . htmlspecialchars($_POST['email']) . '<br>';
        echo 'Umur: ' . htmlspecialchars($_POST['age']) . '<br>';
        echo 'Telepon: ' . htmlspecialchars($_POST['phone']) . '<br>';
        echo 'Website: ' . htmlspecialchars($_POST['website']) . '<br></div>';
    }
}
?>

<h2>Form Validasi</h2>
<form method="post" action="">
    <label for="surname">Nama Belakang</label>
    <input type="text" name="surname" id="surname" value="<?= htmlspecialchars($_POST['surname'] ?? '') ?>">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

    <label for="age">Umur</label>
    <input type="number" name="age" id="age" value="<?= htmlspecialchars($_POST['age'] ?? '') ?>">

    <label for="phone">Nomor Telepon</label>
    <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">

    <label for="website">Website</label>
    <input type="url" name="website" id="website" value="<?= htmlspecialchars($_POST['website'] ?? '') ?>">

    <input type="submit" value="Kirim">
</form>
</div>

</body>
</html>
