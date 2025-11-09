<?php

require "conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = mysqli_prepare($conn, "DELETE FROM suppliers WHERE id = ?");

    mysqli_stmt_bind_param($stmt, "i", $id);

    // 5. Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        // Berhasil dihapus
    } else {
        // Gagal dihapus
        echo "Error: Gagal menghapus data. " . mysqli_error($conn);
    }

    // 6. Tutup statement
    mysqli_stmt_close($stmt);

}

// 7. Kembalikan pengguna ke halaman utama
header("Location: index.php");
exit; // Pastikan skrip berhenti setelah redirect

?>