<?php

require '../../config.php';

    if (isset($_POST['simpan'])){
        $id = $_POST['id'];
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $supplier_id = $_POST['supplier_id'];

    $sql = "UPDATE barang SET kode_barang='$kode_barang', nama_barang = '$nama_barang', harga='$harga', stok='$stok', supplier_id='$supplier_id' WHERE id=$id";
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

