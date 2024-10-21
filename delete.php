<?php
// delete.php

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$database = "seminar"; // Ganti dengan nama database Anda

$conn = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil ID dari URL
$id = $_GET['id'];

// Update data ke database dengan soft delete
$sql = "UPDATE registration SET is_deleted = 1 WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil dihapus (soft delete)!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>