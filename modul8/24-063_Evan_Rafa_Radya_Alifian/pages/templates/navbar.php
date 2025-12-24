<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/pages/">Sistem Penjualan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/pages/">Home</a>
        </li>
        <?php if ($_SESSION["user"]["level"] === 1): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Master
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <?php endif ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Laporan</a>
        </li>
      </ul>
      <div class="d-flex align-items-center column-gap-3" role="search">
        <span><?= $_SESSION["user"]["username"] ?></span>
        <div class="dropstart">
          <img src="https://hwchamber.co.uk/wp-content/uploads/2022/04/avatar-placeholder.gif"
            class="rounded-circle dropdown-toggle" width="32" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
          </button>
          <ul class="dropdown-menu">
            <li>
              <a href="/pages/update_profile.php" class="dropdown-item">Update Profile</a>
            </li>
            <li>
              <a href="/action/logout.php" class="dropdown-item text-danger"
                onclick="return confirm('Are you sure want to logout?')">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>