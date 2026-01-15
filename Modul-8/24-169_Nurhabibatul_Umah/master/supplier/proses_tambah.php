    <?php
    require '../../config.php';
    
    if (isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        
        $query = "INSERT INTO supplier (nama, telp, alamat, email) VALUES ('$nama', '$telp', '$alamat', '$email')";
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