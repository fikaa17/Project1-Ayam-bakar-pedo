<?php include 'koneksi.php'; 

$pemesanan = $koneksi->query("SELECT id_pemesanan FROM pemesanan");
$menu = $koneksi->query("SELECT id_menu FROM menu");
?>

<h2>Tambah Detail Pemesanan</h2>
<form method="post">
    ID Pemesanan: 
    <select name="id_pemesanan" required>
        <option value="">-- Pilih ID Pemesanan --</option>
        <?php while ($row = $pemesanan->fetch_assoc()): ?>
            <option value="<?= $row['id_pemesanan']; ?>"><?= $row['id_pemesanan']; ?></option>
        <?php endwhile; ?>
    </select>
    <br><br>
    ID Menu: 
    <select name="id_menu" required>
        <option value="">-- Pilih ID Menu --</option>
        <?php while ($row = $menu->fetch_assoc()): ?>
            <option value="<?= $row['id_menu']; ?>"><?= $row['id_menu']; ?></option>
        <?php endwhile; ?>
    </select>
    <br><br>
    ID Detail: <input type="number" name="id_detail" value="<?= $data['id_detail']; ?>" readonly><br><br>
    Jumlah: <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    $koneksi->query("INSERT INTO detail_pemesanan
        (id_detail, id_pemesanan, id_menu, jumlah)
        VALUES (
            '$id_detail',
            '$id_pemesanan',
            '$id_menu',
            '$jumlah'
        )");

    header("Location: index.php");
}
?>