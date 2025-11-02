<?php
require 'koneksi.php'; // Panggil file koneksi

// Cek apakah tombol 'update' telah ditekan
if (isset($_POST['update'])) {
    
    // Ambil data dari form dan amankan
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    // Query SQL untuk update data
    $sql = "UPDATE supplier SET 
                nama = '$nama', 
                telp = '$telp', 
                alamat = '$alamat' 
            WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, redirect kembali ke halaman index.php
        header("Location: index.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn); // Tutup koneksi
} else {
    // Jika file diakses secara langsung
    echo "Akses tidak sah.";
}
?>