<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Validasi Server-side</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }
        h3 {
            color: #333;
        }
        .ok {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        pre {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            font-family: Consolas, monospace;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <h3>Hasil Validasi Server-side:</h3>

    <?php
    require 'validatee.inc';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (validateName($_POST, 'surname')) {
            echo "<p class='ok'>Data OK!</p>";
            echo "<pre>";
            foreach ($_POST as $key => $value) {
                if (is_array($value)) {
                    $value = implode(", ", $value);
                }
                echo "({$key}) => ({$value})<br>";
            }
            echo "</pre>";
        } else {
            echo "<p class='error'>Data invalid! Surname harus berupa huruf alfabet saja.</p>";
        }

    } else {
        echo "<p class='error'>Form belum dikirim!</p>";
    }
    ?>
</body>
</html>