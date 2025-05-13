<?php
include 'koneksi.php';
$id = $_GET['id_detail'];
$koneksi->query("DELETE FROM pelanggan WHERE id_detail = $id");
header("Location: index.php");
?>