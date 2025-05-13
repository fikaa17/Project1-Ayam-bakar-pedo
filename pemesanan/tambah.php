<?php include 'koneksi.php'; 

$pelanggan = $koneksi->query("SELECT id_pelanggan FROM pelanggan");
?>

<h2>Tambah Pemesanan</h2>
<form method="post">
    ID Pelanggan: 
    <select name="id_pelanggan" required>
        <option value="">-- Pilih ID Pelanggan --</option>
        <?php while ($row = $pelanggan->fetch_assoc()): ?>
            <option value="<?= $row['id_pelanggan']; ?>"><?= $row['id_pelanggan']; ?></option>
        <?php endwhile; ?>
    </select>
    <br><br>
    ID Pemesanan: <input type="number" name="id_pemesanan" required><br><br>
    Tanggal Pemesanan: <input type="date" name="tgl_pemesanan" required><br><br>
    Status: 
    <select name="status" required>
        <option value="">-- Pilih Status --</option>
        <option value="pending">Pending</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
    </select>
    <br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_pemesanan = $_POST['id_pemesanan'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];
    $status = $_POST['status'];

    $koneksi->query("INSERT INTO pemesanan
        (id_pelanggan, id_pemesanan, tgl_pemesanan, status)
        VALUES (
            '$id_pelanggan',
            '$id_pemesanan',
            '$tgl_pemesanan',
            '$status'
        )");

    header("Location: index.php");
}
?>