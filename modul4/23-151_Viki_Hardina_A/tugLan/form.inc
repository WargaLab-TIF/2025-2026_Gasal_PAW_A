<form action="form.php" method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo $_POST['nama'] ?? ''; ?>">
    <span style="color:red"><?php echo $errors['nama'] ?? ''; ?></span><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
    <span style="color:red"><?php echo $errors['email'] ?? ''; ?></span><br><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?php echo $_POST['nim'] ?? ''; ?>">
    <span style="color:red"><?php echo $errors['nim'] ?? ''; ?></span><br><br>

    <label>Umur:</label><br>
    <input type="text" name="umur" value="<?php echo $_POST['umur'] ?? ''; ?>">
    <span style="color:red"><?php echo $errors['umur'] ?? ''; ?></span><br><br>

    <label>IPK:</label><br>
    <input type="text" name="ipk" value="<?php echo $_POST['ipk'] ?? ''; ?>">
    <span style="color:red"><?php echo $errors['ipk'] ?? ''; ?></span><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal_lahir" value="<?php echo $_POST['tanggal_lahir'] ?? ''; ?>">
    <span style="color:red"><?php echo $errors['tanggal_lahir'] ?? ''; ?></span><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>">
    <span style="color:red"><?php echo $errors['password'] ?? ''; ?></span><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat"><?php echo $_POST['alamat'] ?? ''; ?></textarea>
    <span style="color:red"><?php echo $errors['alamat'] ?? ''; ?></span><br><br>

    <input type="submit" value="Kirim">
</form>
