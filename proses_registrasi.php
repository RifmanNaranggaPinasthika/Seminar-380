<?php
// proses_registrasi.php

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

// Ambil data dari form dan sanitasi
$email = mysqli_real_escape_string($conn, $_POST['email']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$institusi = mysqli_real_escape_string($conn, $_POST['institusi']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

// Masukkan data ke database
$sql = "INSERT INTO registration (email, nama, institusi, country, address) VALUES ('$email', '$nama', '$institusi', '$country', '$address')";

if (mysqli_query($conn, $sql)) {
    echo "Registrasi berhasil!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>