<?php include 'koneksi.php'; 

$pelanggan = $koneksi->query("SELECT id_pelanggan FROM pelanggan");
?>

<h2>Tambah Pelanggan</h2>
<form method="post">
    ID Pelanggan: <input type="number" name="id_pelanggan" required><br><br>
    Nama: <input type="text" name="nama" required><br><br>
    Alamat: <textarea name="alamat">alamat</textarea><br><br>
    No Hp: <input type="text" name="no_hp" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $koneksi->query("INSERT INTO pelanggan
        (id_pelanggan, nama, alamat, no_hp)
        VALUES (
            '$id_pelanggan',
            '$nama',
            '$alamat',
            '$no_hp'
        )");

    header("Location: index.php");
}
?>
