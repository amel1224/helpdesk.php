<?php
include 'koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data berdasarkan id
$data = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id='$id'");
$row = mysqli_fetch_array($data);

// proses update saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $laporan = $_POST['laporan'];

    // query update
    $update = "UPDATE pengaduan SET nama='$nama', laporan='$laporan' WHERE id='$id'";

    if (mysqli_query($conn, $update)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Laporan</h2>

<form method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>

    <label>Laporan:</label><br>
    <textarea name="laporan" required><?php echo $row['laporan']; ?></textarea><br><br>

    <button type="submit">Simpan Perubahan</button>
    <a href="index.php">Batal</a>
</form>