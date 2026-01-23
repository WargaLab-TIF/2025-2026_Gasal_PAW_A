<?php 
session_start();
if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}
echo "selamat datang ". $_SESSION['username'] . ' anda sebagai level '. $_SESSION['level'];
if($_SESSION['level']==1){
    echo '<br><a href="admin.php">lihat data user</a>';
}
echo '<br><a href="profil.php">lihat profil</a>';
?>
<form action="" method="post">
    <input type="submit" name="logout" value="logout">
</form>

