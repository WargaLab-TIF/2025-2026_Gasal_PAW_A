    <?php
    require '../../config.php';
    
    if (isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        
        $query = "INSERT INTO pelanggan (nama, jenis_kelamin, telp, alamat) VALUES ('$nama', '$jenis_kelamin', '$telp', '$alamat')";
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