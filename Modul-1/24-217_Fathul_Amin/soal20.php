<?php
// Ambil data dari query string (GET)
$nama      = isset($_GET['nama']) ? $_GET['nama'] : "-";
$nim       = isset($_GET['nim']) ? $_GET['nim'] : "-";
$umur      = isset($_GET['umur']) ? $_GET['umur'] : "-";
$semester  = isset($_GET['semester']) ? $_GET['semester'] : "-";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biodata input query</title>
</head>
<body>
    <h2>Biodata dengan Input Query String</h2>
    <table border="1" cellpadding="6">
        <tr>
            <th>Nama</th>
            <td><?php echo htmlspecialchars($nama); ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?php echo htmlspecialchars($nim); ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?php echo htmlspecialchars($umur); ?> tahun</td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?php echo htmlspecialchars($semester); ?></td>
        </tr>
    </table>
</body>
</html>