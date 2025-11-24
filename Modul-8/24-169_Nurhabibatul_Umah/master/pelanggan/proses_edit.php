<?php

require '../../config.php';

    if (isset($_POST['simpan'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

    $sql = "UPDATE pelanggan SET nama='$nama', jenis_kelamin = '$jenis_kelamin', telp='$telp', alamat='$alamat' WHERE id=$id";
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

