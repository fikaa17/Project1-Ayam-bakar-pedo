<?php
include 'koneksi.php';
$data = $koneksi->query("SELECT * FROM detail_pemesanan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Detail Pemesanan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f9f9f9;
        }
        .edit-btn {
            background-color: #ffc107;
            color: black;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-right: 5px;
        }
        .del-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .add-btn, .csv-btn {
            padding: 8px 15px;
            margin: 10px 5px;
            border: none;
            cursor: pointer;
            color: white;
        }
        .add-btn {
            background-color: #28a745;
        }
        .csv-btn {
            background-color: #007bff;
        }
    </style>
</head>
<body>

<h2>CRUD Data Detail Pemesanan</h2>

<table>
    <tr>
        <th>ID Detail</th>
        <th>ID Pemesanan</th>
        <th>ID Menu</th>
        <th>Jumlah</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $data->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id_detail'] ?></td>
        <td><?= $row['id_pemesanan'] ?></td>
        <td><?= $row['id_menu'] ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td>
            <a href="edit.php?id_detail=<?= $row['id_detail'] ?>"><button class="edit-btn">Edit</button></a>
            <a href="hapus.php?id_detail=<?= $row['id_detail'] ?>" onclick="return confirm('Yakin hapus?')"><button class="del-btn">Del</button></a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="tambah.php"><button class="add-btn">Tambah Data</button></a>

</body>
</html>
