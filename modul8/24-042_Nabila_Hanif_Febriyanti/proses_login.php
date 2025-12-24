<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username']; 
    $password = md5($_POST['password']); 

    $query = "SELECT * FROM user WHERE username = '$username'"; 
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row['password']) {
            $_SESSION['username'] = $row['username'];  
            $_SESSION['login'] = true;                
            $_SESSION['level'] = $row['level'];      
            $_SESSION['id_user'] = $row['id_user'];   

            echo "<script>
                alert('login berhasil selamat datang " . $row['nama'] . "');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>alert('password salah'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('username tidak ditemukan'); window.location.href='login.php';</script>";
    }
}
?> 