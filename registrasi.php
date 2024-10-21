<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Peserta Seminar</title>
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
    <h2>Form Registrasi</h2>
    <form action="proses_registrasi.php" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="institusi">Institusi:</label>
        <input type="text" id="institusi" name="institusi" required><br><br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>