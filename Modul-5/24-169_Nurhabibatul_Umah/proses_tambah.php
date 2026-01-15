    <?php
    require 'config.php';
    
    if (isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
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