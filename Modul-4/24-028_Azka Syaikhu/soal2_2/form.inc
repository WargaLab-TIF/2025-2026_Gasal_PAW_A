<form action="processData_form.php" method="POST">
    
    <?php 
    // Ambil nilai lama (old value) dari POST jika ada
    $nama_val = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $nim_val = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : '';
    $email_val = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    ?>

    <label for="name">Nama Lengkap:</label><br>
    <input type="text" id="name" name="name" required value="<?php echo $nama_val; ?>">
    <br><br>

    <label for="nim">NIM (Nomor Induk Mahasiswa):</label><br>
    <input type="text" id="nim" name="nim" required value="<?php echo $nim_val; ?>">
    <br><br>
    
    <label for="email">Email Aktif:</label><br>
    <input type="email" id="email" name="email" required value="<?php echo $email_val; ?>">
    <br><br>
    
    <input type="submit" value="Submit">
</form>