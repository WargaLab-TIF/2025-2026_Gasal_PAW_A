<form action="form.php" method="post">
    <label>Surname:</label>
    <input type="text" name="surname" 
           value="<?php echo $_POST['surname'] ?? ''; ?>"><br>

    <label>Email:</label>
    <input type="text" name="email" 
           value="<?php echo $_POST['email'] ?? ''; ?>"><br>

    <label>Password:</label>
    <input type="password" name="password" 
           value="<?php echo $_POST['password'] ?? ''; ?>"><br>

    <input type="submit" value="Kirim">
</form>
