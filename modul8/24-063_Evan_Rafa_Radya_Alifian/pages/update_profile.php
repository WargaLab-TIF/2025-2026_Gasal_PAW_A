<?php

require_once "../conn.php";
require_once "../utils.php";

isNotAuth();

$username = $_SESSION["user"]["username"];
$user = getUser($conn, $username);

?>
<?php require_once "./templates/header.php" ?>
<?php require_once "./templates/navbar.php" ?>
<div class="container d-flex flex-column row-gap-5 py-5">
  <div class="row">
    <div class="col-sm-4">
      <div class="col">
        <?= $username ?>
        <h2>Ubah Profile</h2>
        <hr>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <form action="../action/update_profile.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" value="<?= $user['username'] ?>">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" name="name" id="name" value="<?= $user['nama'] ?>">
        </div>
        <div class="mb-3">
          <label for="telp" class="form-label">No Telepon</label>
          <input type="number" class="form-control" name="telp" id="telp" value="<?= $user['hp'] ?>">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Alamat</label>
          <textarea class="form-control" name="address" id="address" rows="3"><?= $user['alamat'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit Profile</button>
      </form>
    </div>
    <div class="col-sm-6">
      <?php if (isset($_SESSION["err_msg"]) && $_SESSION["err_msg"] != []): ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach ($_SESSION["err_msg"] as $msg): ?>
              <li><?= $msg ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>
<?php require_once "./templates/footer.php" ?>