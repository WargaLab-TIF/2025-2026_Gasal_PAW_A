<form action="form.php" method="post">
    <label>Surname:</label>
    <input type="text" name="surname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">
    <br><br>
    <label>Email:</label>
    <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    <br>
    <input type="submit" value="Kirim">
</form>
