<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "opl_dankos";

$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>