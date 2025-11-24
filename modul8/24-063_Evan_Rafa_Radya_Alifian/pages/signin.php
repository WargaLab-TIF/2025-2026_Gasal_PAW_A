<?php

require_once "../utils.php";

isAuth();

?>
<?php require_once "./templates/header.php" ?>
<div class="container">
  <div style="height: 100vh" class="row d-flex justify-content-center align-items-center">
    <div class="col-sm-4">
      <h2 class="text-center mb-4">Sign In First</h2>
      <form action="../action/signin.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
          <p>Don't have an account? <a href="./signup.php" class>Register here</a>.</p>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>
    <?php if (isset($_SESSION["err_msg"]) && $_SESSION["err_msg"] != []): ?>
    <div class="col-sm-6">
      <div class="alert alert-danger">
        <ul>
          <?php foreach ($_SESSION["err_msg"] as $msg): ?>
            <li><?= $msg ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
    <?php endif ?>
  </div>
</div>

<?php require_once "./templates/footer.php" ?>