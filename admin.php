<?php
// admin.php
$conn = mysqli_connect("localhost", "root", "", "seminar");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Mengambil data pendaftaran
$sql = "SELECT * FROM registration WHERE is_deleted = 0";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Data Pendaftaran</title>
    <style>
        /* CSS di sini */
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5cb85c;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #5cb85c;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Data Pendaftaran Peserta</h2>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Nama</th>
            <th>Institusi</th>
            <th>Country</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['institusi']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>