<style>
.error-message {
    color: #D8000C;
    font-weight: bold;
    font-size: 0.9em;
    margin-left: 10px;
}
</style>

<form action="formno9.php" method="post">
  <p>
    Surname: <input name="surname" value="<?php 
      if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); 
    ?>">
    <?php
    if (isset($errors['surname'])) {
        echo '<span class="error-message">' . $errors['surname'] . '</span>';
    }
    ?>
  </p>
  
  <p>
    Email: <input name="email" value="<?php 
      if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); 
    ?>">
    <?php
    if (isset($errors['email'])) {
        echo '<span class="error-message">' . $errors['email'] . '</span>';
    }
    ?>
  </p>

  <button type="submit">Submit</button>
</form>
