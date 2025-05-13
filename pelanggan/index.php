<?php
include 'koneksi.php';
$data = $koneksi->query("SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
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

<h2>CRUD Data Pelanggan</h2>

<table>
    <tr>
        <th>ID Pelanggan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $data->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id_pelanggan'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['no_hp'] ?></td>
        <td>
            <a href="edit.php?id_pelanggan=<?= $row['id_pelanggan'] ?>"><button class="edit-btn">Edit</button></a>
            <a href="hapus.php?id_pelanggan=<?= $row['id_pelanggan'] ?>" onclick="return confirm('Yakin hapus?')"><button class="del-btn">Del</button></a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="tambah.php"><button class="add-btn">Tambah Data</button></a>

</body>
</html>
