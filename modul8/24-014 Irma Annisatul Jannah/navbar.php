<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$level = $_SESSION['level'] ?? '';
$nama  = $_SESSION['nama'] ?? '';
?>

<style>
.navbar {
    background: #ff99d1ff;
    padding: 15px;
    margin-bottom: 20px;
    text-align: left;
    font-family: Arial;
}

.navbar a {
    color: #242424ff;
    text-decoration: none;
    font-weight: bold;
    padding: 0 8px;
}

.navbar a:hover {
    color: #d20073ff;
}

.navbar b {
    padding: 0 8px;
    color: #333;
}
</style>

<div class="navbar">
    <a href="home.php">Home</a> |

<?php if($level == "admin"): ?>  
    <a href="datamaser.php">Data Master</a> |
<?php endif; ?>

    <a href="transaksi.php">Transaksi</a> |
    <a href="laporan.php">Laporan</a> |
    <b><?= $nama ?></b> |
    <a href="logout.php">Logout</a>
</div>
