<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Home</title></head><body>
<h2>Halaman Home</h2>
<p>Konten Home untuk semua level.</p>
</body></html>
