<?php
include 'koneksi.php';

$id = $_GET['id_detail'];
$data = $koneksi->query("SELECT * FROM detail_pemesanan WHERE id_detail = $id")->fetch_assoc();
$pemesanan = $koneksi->query("SELECT id_pemesanan FROM pemesanan");
$menu = $koneksi->query("SELECT id_menu FROM menu");
?>

<h2>Edit Data Detail Pemesanan</h2>
<form method="post">
    ID Pemesanan: 
    <select name="id_pemesanan" required>
        <option value="">-- Pilih ID Pemesanan --</option>
        <?php while ($row = $pemesanan->fetch_assoc()): ?>
            <option value="<?= $row['id_pemesanan']; ?>" 
                <?= $row['id_pemesanan'] == $data['id_pemesanan'] ? 'selected' : '' ?>>
                <?= $row['id_pemesanan']; ?>
            </option>
        <?php endwhile; ?>
    </select>
    ID Menu: 
    <select name="id_menu" required>
        <option value="">-- Pilih ID Menu --</option>
        <?php while ($row = $menu->fetch_assoc()): ?>
            <option value="<?= $row['id_menu']; ?>" 
                <?= $row['id_menu'] == $data['id_menu'] ? 'selected' : '' ?>>
                <?= $row['id_menu']; ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br><br>

    Jumlah: <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required><br><br>

    <button type="submit" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    $koneksi->query("UPDATE detail_pemesanan SET 
        id_pemesanan = '$id_pemesanan',
        id_menu = '$id_menu',
        jumlah = '$jumlah'
        WHERE id_detail = $id
    ");

    header("Location: index.php");
}
?>