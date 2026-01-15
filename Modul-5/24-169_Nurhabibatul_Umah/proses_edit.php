<?php

require 'config.php';

if (isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";
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

