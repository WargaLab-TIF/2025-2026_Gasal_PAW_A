<?php 
include '../conn.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $kodeBarang = $_POST['kode'];
  $namaBarang = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $supplier_id = $_POST['supplier'];

  $query = "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) 
            VALUES ('$kodeBarang', '$namaBarang', '$harga', '$stok', '$supplier_id')";
  
  $ex = mysqli_query($conn, $query);
  if($ex){
    $last_barang_id = mysqli_insert_id($conn);
    $tgl_sql = date('Y-m-d H:i:s');
    $no_nota_baru = "NT-" . date('Ymd') . "-" . mt_rand(1000, 9999);
    $query_nota = "INSERT INTO nota (no_nota, transaksi_id, tgl_nota) 
                       VALUES ('$no_nota_baru', '$last_barang_id', '$tgl_sql')";
    $ex_nota = mysqli_query($conn, $query_nota);
    if($ex_nota){
      echo "<script>
              alert('Data Barang dan Nota Berhasil Ditambahkan');
              window.location.href = 'barang.php';
            </script>";
      exit;
    }else{
      echo "Data Gagal Ditambahkan";
    }
  }else{
    echo "Data Gagal Ditambahkan";
  }
}

?>