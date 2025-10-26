<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: #f4f7fb;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px;
        }

        .container {
            background: #fff;
            padding: 25px 35px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 9px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 12px;
            font-size: 14px;
            transition: border 0.2s;
        }

        input:focus, select:focus {
            border-color: #0078d7;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            background: #0078d7;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #005fa3;
        }

        .error-box {
            background: #ffeaea;
            border-left: 4px solid #ff5252;
            color: #c62828;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .success-box {
            background: #e7f9ed;
            border-left: 4px solid #2ecc71;
            color: #2e7d32;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .error {
            color: #e53935;
            font-size: 13px;
            margin-top: -8px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Input Data Mahasiswa</h2>

    <?php
    $errors = [];
    $hasFormData = !empty($_POST);

    if ($hasFormData) {
        // Validasi NIM
        if (empty($_POST['nim'])) {
            $errors['nim'] = "NIM tidak boleh kosong";
        } elseif (!preg_match("/^[0-9]{8,12}$/", $_POST['nim'])) {
            $errors['nim'] = "NIM harus berupa angka 8-12 digit";
        }

        // Validasi Nama
        if (empty($_POST['nama'])) {
            $errors['nama'] = "Nama tidak boleh kosong";
        } elseif (!preg_match("/^[a-zA-Z\s]{3,50}$/", $_POST['nama'])) {
            $errors['nama'] = "Nama hanya boleh huruf (3-50 karakter)";
        }

        // Validasi Email
        if (empty($_POST['email'])) {
            $errors['email'] = "Email tidak boleh kosong";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Format email tidak valid";
        }

        // Validasi Password
        if (empty($_POST['password'])) {
            $errors['password'] = "Password tidak boleh kosong";
        } elseif (strlen($_POST['password']) < 8) {
            $errors['password'] = "Password minimal 8 karakter";
        } elseif (!preg_match("/^[a-zA-Z0-9@#$%]+$/", $_POST['password'])) {
            $errors['password'] = "Password hanya boleh huruf, angka, dan karakter @#$%";
        }

        // Validasi Semester
        if (empty($_POST['semester'])) {
            $errors['semester'] = "Semester harus dipilih";
        } elseif (!preg_match("/^[1-8]$/", $_POST['semester'])) {
            $errors['semester'] = "Semester harus antara 1-8";
        }

        // Tampilkan hasil
        if (!empty($errors)) {
            echo '<div class="error-box"><strong>⚠️ Terjadi Kesalahan:</strong><br>';
            foreach ($errors as $field => $error) {
                echo ucfirst($field) . ": " . htmlspecialchars($error) . "<br>";
            }
            echo '</div>';
        } else {
            echo '<div class="success-box"><strong>✅ Data berhasil dikirim!</strong></div>';
            echo '<ul>';
            echo '<li><b>NIM:</b> ' . htmlspecialchars($_POST['nim']) . '</li>';
            echo '<li><b>Nama:</b> ' . htmlspecialchars($_POST['nama']) . '</li>';
            echo '<li><b>Email:</b> ' . htmlspecialchars($_POST['email']) . '</li>';
            echo '<li><b>Password:</b> ' . str_repeat('*', strlen($_POST['password'])) . '</li>';
            echo '<li><b>Semester:</b> ' . htmlspecialchars($_POST['semester']) . '</li>';
            echo '</ul>';
        }
    }
    ?>

    <form method="POST">
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" placeholder="Contoh: 2305123456"
               value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>">
        <?php if (isset($errors['nim'])) echo "<div class='error'>{$errors['nim']}</div>"; ?>

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Contoh: Budi Santoso"
               value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
        <?php if (isset($errors['nama'])) echo "<div class='error'>{$errors['nama']}</div>"; ?>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Contoh: budi@email.com"
               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <?php if (isset($errors['email'])) echo "<div class='error'>{$errors['email']}</div>"; ?>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter">
        <?php if (isset($errors['password'])) echo "<div class='error'>{$errors['password']}</div>"; ?>

        <label for="semester">Semester</label>
        <select id="semester" name="semester">
            <option value="">-- Pilih Semester --</option>
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <option value="<?= $i ?>" <?= (isset($_POST['semester']) && $_POST['semester'] == $i) ? 'selected' : '' ?>>
                    Semester <?= $i ?>
                </option>
            <?php endfor; ?>
        </select>
        <?php if (isset($errors['semester'])) echo "<div class='error'>{$errors['semester']}</div>"; ?>

        <button type="submit" class="submit-btn">Kirim Data</button>
    </form>
</div>

</body>
</html>
