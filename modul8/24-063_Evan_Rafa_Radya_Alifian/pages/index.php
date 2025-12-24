<?php

require_once "../utils.php";

isNotAuth();

$isAdmin = $_SESSION["user"]["level"] === 1;

?>
<?php require_once "./templates/header.php" ?>
<?php require_once "./templates/navbar.php" ?>
<div class="container py-5">
  <div class="row">
    <div class="col">
      <span class="badge rounded-pill text-bg-<?= $isAdmin ? "success" : "primary" ?>">Role: <?= $isAdmin ? "Admin" : "User" ?></span>
      <h1>Welcome <?= $_SESSION["user"]["name"] ? $_SESSION["user"]["name"] : $_SESSION["user"]["username"] ?></h1>
    </div>
  </div>
</div>
<?php require_once "./templates/footer.php" ?>