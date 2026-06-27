<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pratikum"; // Pastikan nama ini sudah sesuai

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function updateStatusBarang($conn, $id, $stok, $limit_stok) {
    if ($stok <= 0) {
        $status_id = 2; // Habis
    } elseif ($stok <= $limit_stok) {
        $status_id = 3; // Menipis
    } else {
        $status_id = 1; // Tersedia
    }
    mysqli_query($conn, "UPDATE barang SET status_id = $status_id WHERE id = $id");
}