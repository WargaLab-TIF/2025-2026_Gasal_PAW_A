<?php
session_start();
session_destroy();
session_unset();
echo "<script>alert('Anda telah logout'); window.location='login.php';</script>";
?>