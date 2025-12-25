<?php
require __DIR__ . '/../conn.php';
require __DIR__ . '/function_vall.php';


$_SESSION['errors'] = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    vall_username($_POST['username'], $_SESSION['errors']);
    vall_password($_POST['password'], $_SESSION['errors']);

    if (isset($_POST['name'])) {
        vall_name($_POST['name'], $_SESSION['errors']);
    }
    if (isset($_POST['hp'])) {
        vall_hp($_POST['hp'], $_SESSION['errors']);
    }
    if (isset($_POST['register'])) {
        $qr = "SELECT * FROM user WHERE username = '$name'";
        $hasil = mysqli_query($conn, $qr);
        if (mysqli_num_rows($hasil) > 0) {
            $errors['username'] = 'sudah ada, silahkan ganti';
        }
    }

    if (!empty($_SESSION['errors'])) {
        if (isset($_POST['login'])) {
            header('location: ../pages/login.php');
            exit();
        } else if (isset($_POST['register'])) {
            header('location: ../pages/register.php');
            exit();
        }

    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $qr = "SELECT * FROM user WHERE username = '$username'";
        $hasil = mysqli_query($conn, $qr);

        if (mysqli_num_rows($hasil) > 0) {
            $row = mysqli_fetch_assoc($hasil);

            if ($row['password'] === md5($_POST['password'])) {
                $_SESSION['login'] = $row;
                header('location: ../pages/home/index.php');
                exit();
            } else {
                $_SESSION['errors']['password'] = 'salah, silahkan isi lagi!';
                header('location: ../pages/login.php');
                exit();
            }
        } else {
            $_SESSION['errors']['username'] = 'tidak ditemuka';
            header('location: /../pages/login.php');
            exit();
        }
    }


    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $nama = $_POST['name'];
        $password = md5($_POST['password']);
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        $level = 4;
        $role = 'user';

        $qr = "INSERT INTO user (nama, hp, alamat, username, password, level, role) 
        VALUES ('$nama', '$hp', '$alamat', '$username', '$password', '$level', '$role')";
        if (mysqli_query($conn, $qr)) {
            $_SESSION['login'] = [
                'nama' => $nama,
                'hp' => $hp,
                'alamat' => $alamat,
                'username' => $username,
                'level' => $level,
                'role' => $role
            ];
            header('location: ../pages/home/index.php');
            exit();
        }
    }
}
?>