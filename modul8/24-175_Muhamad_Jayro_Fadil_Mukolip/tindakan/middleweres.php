<?php
session_start();

if (!isset($_SESSION['login'])) {
    ?>
    <script>
        alert("Silahkan login dulu!");
        window.location.href = '../../index.php';
    </script>
    <?php
    exit();
}
?>