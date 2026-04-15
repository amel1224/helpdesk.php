<?php
include "koneksi.php";

// cek apakah tombol kirim sudah ditekan
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // ambil data dari form
    $nama = $_POST["nama"];
    $laporan = $_POST["laporan"];

    $query = "INSERT INTO pengaduan (nama, laporan) VALUES ('$nama', '$laporan')";

    if (mysqli_query($conn, $query)) {
        echo "<div style='color: green;'><b>Sukses! </b>Laporan dari <b>$nama</b> telah diterima: <i>$laporan</i></div><hr>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// proses ambil data dari database
$ambil_data = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan - Helpdesk</title>
    <style>
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }
    </style>
</head>
<body>

<h1>Kirim Laporan Pengaduan</h1>

<form method="POST" action="">
    <label>Nama anda</label><br>
    <input type="text" name="nama" placeholder="Masukan nama... " required><br><br>

    <label>Laporan</label><br>
    <textarea name="laporan" placeholder="Tulis kendala Anda di sini..." required></textarea><br><br>

    <button type="submit">Kirim Sekarang</button>
</form>

<hr>

<h2>Daftar Laporan Masuk</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Pelapor</th>
        <th>Laporan</th>
        <th>Aksi</th>
    </tr>

    <?php 
    $no = 1; 
    while($row = mysqli_fetch_array($ambil_data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['laporan']; ?></td>
        <td>
            <a href="hapus.php?id=<?php echo $row['id']; ?>"
            onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>