    <?php
    require '../../config.php';
    
    if (isset($_POST['simpan'])){
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $supplier_id = $_POST['supplier_id'];
        
        $query = "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) VALUES ('$kode_barang' ,'$nama_barang', '$harga', '$stok', '$supplier_id')";
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