<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Validasi Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }
        h3 {
            color: #333;
        }
        .error {
            color: red;
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
    <h3>Hasil Validasi:</h3>

    <?php
    require 'validate.inc';

    $errors = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        validateName($errors, $_POST, 'surname');

        if ($errors) {
            echo '<h4 class="error">Errors:</h4>';
            echo '<pre>';
            foreach ($errors as $field => $error) {
                echo "$field : $error<br>";
            }
            echo '</pre>';
        } else {
            echo '<p><strong>Data OK!</strong></p>'; 
            echo '<pre>';
            foreach ($_POST as $key => $value) {
                if (is_array($value)) {
                    $value = implode(", ", $value);
                }
                echo "({$key}) => ({$value})<br>";
            }
            echo '</pre>';
        }
    } else {
        echo '<p class="error">Form belum dikirim!</p>';
    }
    ?>
</body>
</html>
