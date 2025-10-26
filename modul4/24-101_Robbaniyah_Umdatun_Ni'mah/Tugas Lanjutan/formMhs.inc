<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="max-width:400px; background:#fff; padding:20px; border-radius:10px;">
    <h2>Form Input Data Mahasiswa</h2>

    <label for="nama">Nama Lengkap:</label>
    <input type="text" id="nama" name="nama" required
           value="<?php if (isset($_POST['nama'])) echo htmlspecialchars($_POST['nama']); ?>">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required
           value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" required
           value="<?php if (isset($_POST['nim'])) echo htmlspecialchars($_POST['nim']); ?>">

    <br><br>
    <input type="submit" value="Kirim">
</form>