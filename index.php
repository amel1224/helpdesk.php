<?php
include 'koneksi.php';//Mengambil tabel koneksi

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nama = $_POST['nama'];
    $laporan = $_POST['laporan'];

    //perintah untuk masukan data ke tabel pengaduan
    $query = "INSERT INTO pengaduan(nama, laporan)VALUES('$nama', '$laporan')";

    if(mysqli_query($conn, $query)){
            echo "<div style='color:green;'><b>Sukses!</b>Laporan berhasil disimpan ke database.</div><hr>";
    } else { 
        echo "Error:" .mysqli_error($conn);
    }

        echo "<div style='color:green;'><b>Sukses!</b>Laporan dari <b>$nama</b>telah diterima:<i>$laporan</i></div><hr>";
}
?>

<?php
// 2. PROSES AMBIL DATA (Untuk ditampilkan di tabel)
$ambil_data = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
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
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Kirim Laporan Pengaduan</h1>

<form method="POST" action="">
    <label>Nama Anda:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Isi Laporan:</label><br>
    <textarea name="laporan" required></textarea><br><br>

    <button type="submit">Kirim Sekarang</button>
</form>

<hr>

<h2>Daftar Laporan Masuk</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Pelapor</th>
        <th>Isi Laporan</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_array($ambil_data)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['laporan']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>