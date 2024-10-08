<!DOCTYPE html>
<html>
    <head>
        <title>Form Input dengan Validasi</title>
    </head>
    <body>
        <h1>Form Input dengan Validasi</h1>
        <form method="post" action="proses_validasi.php">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama">
            <br>

            <label for="email">Email;</label>
            <input type="text" id="nama" name="nama">
            <br>

            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $errors = array();

    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (empty($errors)) {
        foreach ($errors as $errors) {
            echo $error . "<br>";
        }
    } else {
        echo "Data berhasil dikirim: Nama ="
    }
    
}