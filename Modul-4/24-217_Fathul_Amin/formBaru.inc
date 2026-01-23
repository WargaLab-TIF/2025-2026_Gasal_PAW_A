<form action="formBaru2.php" method="post">
  Surname: <input name="surname" value="<?php 
    if (isset($_POST['surname'])) echo $_POST['surname']; 
  ?>">
  <button type="submit">Submit</button>
</form>