<?php
require "conn.php";

$id_user = "";
$username = "";
$nama = "";
$level = "";
$alamat = "";
$hp = "";
$error_message = "";

if (isset($_POST['update'])) {
   
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $password_baru = $_POST['password'];

   
    $update_fields = "username = '$username', nama = '$nama', level = '$level', alamat = '$alamat', hp = '$hp'";
    
   
    if (!empty($password_baru)) {
        $password_enkripsi = md5($password_baru);
        $update_fields .= ", password = '$password_enkripsi'";
    }

   
    $sql = "UPDATE user SET $update_fields WHERE id_user = $id_user";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Error: Gagal mengupdate data. " . mysqli_error($conn);
    }
}


if (isset($_GET['id_user'])) {
   
    $id_user = $_GET['id_user'];

   
    $sql = "SELECT username, nama, level, alamat, hp FROM user WHERE id_user = '$id_user' ";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $nama = $row['nama'];
        $level = $row['level'];
        $alamat = $row['alamat'];
        $hp = $row['hp'];
    } else {
        $error_message = "Data user tidak ditemukan.";
    }
} else if (!isset($_POST['update'])) {
    mysqli_close($conn);
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Edit Data User</h1>

    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="edit.php" method="post">
        
        <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($id_user); ?>">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required><br>
        
        <label for="password">Password (kosongkan jika tidak ingin diubah)</label>
        <input type="password" name="password" id="password" placeholder="Isi untuk mengubah password"><br>
        
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>" required><br>
        
        <label for="level">Level</label>
        <input type="text" name="level" id="level" value="<?php echo htmlspecialchars($level); ?>" required><br>
        
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required><br>
        
        <label for="hp">No. HP</label>
        <input type="tel" name="hp" id="hp" value="<?php echo htmlspecialchars($hp); ?>" required>
        
        <button class="simpan" type="submit" name="update">Update</button>
        
        <button type="button" class="batal" onclick="location.href='index.php'">Batal</button>
    </form>
</body>
</html>
<?php
if (isset($conn)) {
    mysqli_close($conn);
}
?>