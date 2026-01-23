<div class="navbar">
    <a href="index.php">Home</a>

    <?php if ($_SESSION['level'] == 1): ?>
        <a href="master.php">Data Master</a>
    <?php endif; ?>

    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>

    <a class="right">User: <?= $_SESSION['username']; ?></a>
    <a href="logout.php" class="right">Logout</a>
</div>
