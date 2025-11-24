<?php
require 'koneksi.php'; 

if (isset($_POST['update'])) {
    
   
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

     
    $sql = "UPDATE supplier SET 
                nama = '$nama', 
                telp = '$telp', 
                alamat = '$alamat' 
            WHERE id = $id";

    
    if (mysqli_query($conn, $sql)) {
        header("Location: supp.php");
        exit();
    } else {
        
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);  
} else {
    
    echo "Akses tidak sah.";
}
?>