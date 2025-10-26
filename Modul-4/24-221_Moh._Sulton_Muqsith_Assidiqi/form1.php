<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 30px;
        }

        .container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="tel"],
        input[type="url"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
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
        echo '<div class="error"><strong>Terjadi Kesalahan:</strong><br>';
        foreach ($errors as $field => $error) {
            echo "- " . htmlspecialchars($field) . ": " . htmlspecialchars($error) . "<br>";
        }
        echo '</div>';
    } else {
        echo '<div class="success"><strong>Data berhasil dikirim!</strong></div>';
        echo '<p><strong>Data yang dikirim:</strong><br>';
        echo '• Surname: ' . htmlspecialchars($_POST['surname']) . '<br>';
        echo '• Email: ' . htmlspecialchars($_POST['email']) . '<br>';
        echo '• Age: ' . htmlspecialchars($_POST['age']) . '<br>';
        echo '• Phone: ' . htmlspecialchars($_POST['phone']) . '<br>';
        echo '• Website: ' . htmlspecialchars($_POST['website']) . '</p>';
    }
}
?>

<h2>Form Validasi</h2>
<form method="POST">
    <label for="surname">Nama Belakang:</label>
    <input type="text" id="surname" name="surname" placeholder="Masukkan nama belakang" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Masukkan email" required>

    <label for="age">Umur:</label>
    <input type="number" id="age" name="age" placeholder="Masukkan umur" required>

    <label for="phone">Nomor Telepon:</label>
    <input type="tel" id="phone" name="phone" placeholder="Contoh: 08123456789" required>

    <label for="website">Website:</label>
    <input type="url" id="website" name="website" placeholder="https://contoh.com" required>

    <input type="submit" value="Kirim">
</form>
</div>

</body>
</html>
