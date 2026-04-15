<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nama = $_POST['nama'];
    $laporan = $_POST['laporan'];

    echo "<div style='color:green;'><b>Sukses!</b>Laporan dari <b>$nama</b>telah diterima:<i>$laporan</i></div><hr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan-Helpdesk</title>
</head>
<body>
    <h1>Kirim laporan Pengaduan</h1>
    <form method="POST">
        <label>Nama Anda</label>
        <input type="text" name="nama" placeholder="Masukan nama" ><br><br>

        <label>Isi laporan</label><br>
        <textarea name="laporan" placeholder="tulis kendala anda disni"></textarea><br><br>

        <button type="submit">Kirim sekarang</button>
</form>
</body>
</html>