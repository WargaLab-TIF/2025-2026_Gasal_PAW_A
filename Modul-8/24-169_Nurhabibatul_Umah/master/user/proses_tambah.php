    <?php
    require '../../config.php';
    
    if (isset($_POST['simpan'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        $level = $_POST['level'];

        $query = "INSERT INTO user (username, password, nama, alamat, hp, level) VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')";
        $result = mysqli_query($conn, $query);

        if ($result){
            header('Location: index.php?status=sukses');
        }else{
            header('Location: index.php?status=gagal');
        }
        
    }else{
        die("Akses di larang");
    }
    ?>