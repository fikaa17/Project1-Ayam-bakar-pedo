<?php
include 'koneksi.php';
$id = $_GET['id_pemesanan'];
$koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan = $id");
header("Location: index.php");
?>