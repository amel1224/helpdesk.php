<?php
include 'koneksi.php'; // Hubungkan ke database

// Cek apakah id ada di URL
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Perintah SQL untuk menghapus data
    $query = "DELETE FROM pengaduan WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, kembali ke halaman utama
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>