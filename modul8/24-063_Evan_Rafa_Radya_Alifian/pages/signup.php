<?php

require_once "../utils.php";

isAuth();

?>
<?php require_once "./templates/header.php" ?>
<div class="container">
  <div style="height: 100vh" class="row d-flex justify-content-center align-items-center overflow-auto">
    <div class="col-sm-6">
      <h2 class="text-center mb-4">Register Account</h2>
      <form action="../action/signup.php" method="post" class="d-flex flex-column row-gap-3">
        <div class="row">
          <div class="col">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username">
          </div>
          <div class="col">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col">
            <label for="telp" class="form-label">No Telp</label>
            <input type="telp" class="form-control" name="telp" id="telp">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
          </div>
        </div>
        <div class="mb-3">
          <p>Have an account? <a href="./signin.php" class>Sign in here</a>.</p>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
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