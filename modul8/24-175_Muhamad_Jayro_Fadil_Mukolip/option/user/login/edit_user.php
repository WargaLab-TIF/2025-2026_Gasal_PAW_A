<?php
require "../conn.php";

$stmt = $conn->prepare("SELECT * FROM user WHERE id_user = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- CSS START (Sama dengan form register agar konsisten) --- */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #374151;
        }

        form {
            background-color: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
            border: 1px solid #e5e7eb;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 24px;
            color: #111827;
            font-size: 24px;
            font-weight: 700;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Tombol Update (Warna Kuning/Orange untuk membedakan dengan Register) */
        input[type="submit"] {
            width: 100%;
            background-color: #f59e0b; /* Amber/Orange */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 10px;
            text-transform: uppercase; /* Agar tulisan 'update' jadi kapital */
        }

        input[type="submit"]:hover {
            background-color: #d97706; /* Amber lebih gelap */
        }

        /* Tombol Kembali (Opsional, agar user bisa batal) */
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-back:hover {
            color: #374151;
            text-decoration: underline;
        }
        /* --- CSS END --- */
    </style>
</head>
<body>
    <form action="user_editvall.php" method="post">
        <h2>Edit Data User</h2>
        
        <!-- ID Hidden tetap ada sesuai logic asli -->
        <input type="hidden" name="id" value="<?= $data['id_user']; ?>">
        
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= $data['username']; ?>" required>

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama']; ?>" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?= $data['password']; ?>" required>

        <label for="Hp">No Hp</label>
        <input type="number" id="Hp" name="Hp" value="<?= $data['hp']; ?>">

        <label for="role">Role / Jabatan</label>
        <select name="role" id="role">
            <option value="kasir" <?= $data['role'] === 'kasir' ? 'selected' : '' ?>>Kasir</option>
            <option value="manager" <?= $data['role'] === 'manager' ? 'selected' : '' ?>>Manager</option>
            <option value="gudang" <?= $data['role'] === 'gudang' ? 'selected' : '' ?>>Gudang</option>
            <option value="user" <?= $data['role'] === 'user' ? 'selected' : '' ?>>User</option>
        </select>

        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat"><?= $data['alamat']; ?></textarea>

        <input type="submit" value="update">
        
        <!-- Tambahan kecil: Link kembali ke halaman data user -->
        <a href="../index.php" class="btn-back">Batal / Kembali</a>
    </form>
</body>
</html>