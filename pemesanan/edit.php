<?php
include 'koneksi.php';

$id = $_GET['id_pemesanan'];
$data = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan = $id")->fetch_assoc();
$pelanggan = $koneksi->query("SELECT id_pelanggan FROM pelanggan");
?>

<h2>Edit Data Pemesanan</h2>
<form method="post">
    ID Pelanggan: 
    <select name="id_pelanggan" required>
        <option value="">-- Pilih ID Pelanggan --</option>
        <?php while ($row = $pelanggan->fetch_assoc()): ?>
            <option value="<?= $row['id_pelanggan']; ?>" 
                <?= $row['id_pelanggan'] == $data['id_pelanggan'] ? 'selected' : '' ?>>
                <?= $row['id_pelanggan']; ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br><br>

    ID Pemesanan: <input type="number" name="id_pemesanan" value="<?= $data['id_pemesanan']; ?>" readonly><br><br>

    Tanggal Pemesanan: <input type="date" name="tgl_pemesanan" value="<?= $data['tgl_pemesanan']; ?>" required><br><br>

    Status:
    <select name="status" required>
        <option value="">-- Pilih Status --</option>
        <option value="pending" <?= $data['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="proses" <?= $data['status'] == 'proses' ? 'selected' : '' ?>>Proses</option>
        <option value="selesai" <?= $data['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
    </select>
    <br><br>

    <button type="submit" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];
    $status = $_POST['status'];

    $koneksi->query("UPDATE pemesanan SET 
        id_pelanggan = '$id_pelanggan',
        tgl_pemesanan = '$tgl_pemesanan',
        status = '$status'
        WHERE id_pemesanan = $id
    ");

    header("Location: index.php");
}
?>