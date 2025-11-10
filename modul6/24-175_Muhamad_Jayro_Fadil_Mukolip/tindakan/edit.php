<?php 
// 1. HARUS ada session_start() di paling atas
session_start();

require "../conn.php";

$stmt = $conn->prepare("SELECT * FROM supplier WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data) {
  $nama = $data['nama'];
  $tlp = $data['telp'];
  $alamat = $data['alamat'];
} else {
  echo "Data tidak ditemukan.";
  // Beri nilai default agar form tidak error
  $nama = "";
  $tlp = "";
  $alamat = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
    <style>
       
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

       
        .container {
            background-color: #fff;
            padding: 25px 40px;
            border-radius: 8px;           
            width: 450px;
        }

       
        h3 {
            font-size: 24px;
            color: #337ab7;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 600;
        }

       
        .edit-form {
            display: grid;           
            grid-template-columns: 80px 1fr;           
            row-gap: 15px;           
            column-gap: 15px;           
            align-items: center;
        }

        .edit-form label {
            font-weight: 600;
            color: #333;
        }

       
        .edit-form input[type="text"],
        .edit-form input[type="number"],
        .edit-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        
       
        .edit-form textarea {
            height: 80px;
            resize: vertical;
        }

       
        .button-group {
           
            grid-column: 2;
            margin-top: 10px;
        }

       
        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 8px;
        }

       
        .btn-update {
            background-color: #5cb85c;
        }
        .btn-update:hover {
            background-color: #4cae4c;
        }

       
        .btn-cancel {
            background-color: #d9534f;
        }
        .btn-cancel:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3>Edit Data Master Supplier</h3>
        
        <?php 
        // 2. Tampilkan error jika ada
        if (!empty($_SESSION['errors'])){
            echo '<div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">';
            echo '<b>Invalid, correct the following errors:</b><br>';
            foreach ($_SESSION['errors'] as $field => $error)
                echo htmlspecialchars($field) . ': ' . htmlspecialchars($error) . '<br>';
            echo '</div>';

            // 3. HAPUS error setelah ditampilkan
            // Agar saat di-refresh, errornya hilang
            unset($_SESSION['errors']);
        }
        ?>
        
        <form action="../operasi/val_edit.php" method="post" class="edit-form">
            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id'] ?? $_GET['id']) ?>">
            
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" id="Nama" value="<?= htmlspecialchars($nama) ?>">

            <label for="telpon">Telp</label>
            <input type="number" name="telpon" id="telpon" value="<?= htmlspecialchars($tlp) ?>">

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat"><?= htmlspecialchars($alamat) ?></textarea>
            
            <div class="button-group">
                <button type="submit" class="btn btn-update">Update</button>
                <a href="../index.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>