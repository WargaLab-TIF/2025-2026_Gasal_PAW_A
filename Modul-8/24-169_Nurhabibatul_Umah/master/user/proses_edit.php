<?php

require '../../config.php';

    if (isset($_POST['simpan'])){
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        $level = $_POST['level'];

    $sql = "UPDATE user SET username='$username', password='$password', nama='$nama', alamat='$alamat', hp='$hp', level='$level' WHERE id_user=$id_user";
    $query = mysqli_query($conn, $sql);

    if ($query){
        header('Location: index.php');
    }else{
        die("Gagal menyimpan perubahan");
    }
}else{
    die("Akses di larang");
}
?>

