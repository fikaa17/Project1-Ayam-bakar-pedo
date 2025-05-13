<?php
$koneksi = new mysqli("localhost", "root", "", "project1");
if ($koneksi->connect_error) {
    die ("koneksi gagal: ". $koneksi->connect_error);
}
?>