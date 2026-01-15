<html>
<form action="form.php" method="post">
    <h2>Form Mahasiswa Teknik Informatika</h2>
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>">
    <br><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?php if (isset($_POST['nim'])) echo $_POST['nim']; ?>">
    <br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    <br><br>

    <label>Password:</label><br>
    <input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
    <br><br>

    <input type="submit" value="Kirim">
</form>
</html>
