<?php
include 'koneksi.php';
$id = $_GET['id_pelanggan'];
$data = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = $id")->fetch_assoc();

?>

<h2>Edit Data Pelanggan</h2>
<form method="post">
    ID Pelanggan: 
    <input type="number" name="id_pelanggan" value="<?= $data['id_pelanggan'] ?>" required><br><br>
    Nama: 
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>
    Alamat: 
    <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required><br><br>
    No Hp:
    <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required><br><br>
    <button type="submit" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    $koneksi->query("UPDATE pelanggan SET 
        id_pelanggan = '{$_POST['id_pelanggan']}',
        nama = '{$_POST['nama']}',
        alamat = '{$_POST['alamat']}',
        no_hp = '{$_POST['no_hp']}'
        WHERE id_pelanggan = $id
    ");
    header("Location: index.php");
}
?>
