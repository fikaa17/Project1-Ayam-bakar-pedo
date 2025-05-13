<?php
include 'koneksi.php';
$id = $_GET['id_pelanggan'];
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan = $id");
header("Location: index.php");
?>