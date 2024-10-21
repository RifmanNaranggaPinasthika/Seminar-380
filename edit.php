<?php
// edit.php
$conn = mysqli_connect("localhost", "root", "", "seminar");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil data dari database berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM registration WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan sanitasi
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $institusi = mysqli_real_escape_string($conn, $_POST['institusi']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Update data ke database
    $sql = "UPDATE registration SET email = '$email', nama = '$nama', institusi = '$institusi', country = '$country', address = '$address' WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pendaftaran</title>
    <style>
        /* style.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input[type="email"],
input[type="text"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Menjaga padding tidak mempengaruhi lebar total */
}

input[type="submit"] {
    background-color: #5cb85c;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #4cae4c;
}
    </style>
</head>
<body>
    <h2>Edit Data Pendaftaran</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>
        <label for="institusi">Institusi:</label>
        <input type="text" id="institusi" name="institusi" value="<?php echo $row['institusi']; ?>" required><br><br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" required><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>