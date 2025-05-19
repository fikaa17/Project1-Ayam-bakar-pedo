<!DOCTYPE html>
<html>
<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Input Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
        <h2>Input Data Baru</h2>
    </div>

    <br/>
    <a href="index.php">Lihat Semua Data</a>

    <h3>Input Data Baru</h3>
    <form action="input-aksi.php" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><input type="text" name="pekerjaan" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>