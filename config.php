<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_pohon";

$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>