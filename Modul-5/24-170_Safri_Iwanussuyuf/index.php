<?php

require "conn.php";
$query = "SELECT * FROM suppliers";
$result = mysqli_query($conn, $query);
if (isset($_POST["submit"])) {
    $nama=$_POST["nama"];
    $telp=$_POST["telp"];
    $alamat=$_POST["alamat"];
    $tambah="INSERT INTO suppliers(nama,telp,alamat)
    VALUES ('$nama','$telp','$alamat')";
    if (mysqli_query($conn,$tambah)) {
        echo "<script>alert ('data baru berhasil ditambahkan')</script>";
    }else {
        echo "error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function konfirmasiHapus(id) {
 
            var konfirmasi = confirm("Anda yakin akan menghapus supplier ini? ");
            
            if (konfirmasi == true) {

                window.location.href = 'hapus.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <h1>Data Master Supplier</h1> 

    <button class="tambah" onclick="location.href='tambah.php'">Tambah Data</button>
    
    <table>
        <tr>
            <th>No</th> 
            <th>Nama</th>  
            <th>Telp</th>  
            <th>Alamat</th>  
            <th>Tindakan</th>  
        </tr>
        
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>";

                echo "<button class='edit' onclick=\"location.href='edit.php?id=" . $row['id'] . "'\">Edit</button> ";
                
                echo "<button class='hapus' onclick='konfirmasiHapus(" . $row['id'] . ")'>Hapus</button>";
                
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
        
    </table>
</body>
</html>
