<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikumDatabase"; 


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "

INSERT INTO supplier (nama, telp, alamat) VALUES
('CV. Sumber Rejeki Abadi', '081234567890', 'Surabaya'),
('PT. Mandiri Jaya Teknik', '085732211456', 'Bandung'),
('UD. Bumi Lancar Makmur', '087851234678', 'Pamekasan'),
('CV. Cahaya Utama', '081322445567', 'Sampang'),
('PT. Sidoarjo Maju Bersama', '085733221198', 'Sidoarjo'),
('UD. Berkah Abadi', '087832211009', 'Surabaya'),
('CV. Mitra Karya Sentosa', '081355667890', 'Bandung'),
('PT. Pamekasan Steelindo', '085877221345', 'Pamekasan'),
('CV. Sampang Makmur', '087833445667', 'Sampang'),
('PT. Mega Sukses Sidoarjo', '081377899002', 'Sidoarjo');

";

if (mysqli_multi_query($conn, $sql)) {
    echo "Semua data berhasil dimasukkan ke setiap tabel!";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
