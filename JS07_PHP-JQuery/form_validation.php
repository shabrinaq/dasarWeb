<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>
        <br>

        <input type="submit" value="Submit">
    </form>

    <div id="hasil" style="margin-top: 20px;">

    </div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault(); 

                var nama = $("#nama").val();
                var email = $("#email").val();
                var valid = true;

                $("#nama-error").text("");
                $("#email-error").text("");

                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                }

                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else if (!validateEmail(email)) {
                    $("#email-error").text("Format email tidak valid.");
                    valid = false;
                }

                if (valid) {
                    $.ajax({
                        url: "form_validation.php", 
                        type: "POST",
                        data: {
                            nama: nama,
                            email: email
                        },
                        success: function(response) {
                            $("#hasil").html(response); 
                        },
                        error: function() {
                            $("#hasil").html("<p style='color: red;'>Terjadi kesalahan saat mengirim data.</p>");
                        }
                    });
                }

                function validateEmail(email) {
                return email.indexOf('@') !== -1 && email.indexOf('.') !== -1;
            }
            });
        });
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $errors = array();

    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>"; 
        }
    } else {
        echo "Data berhasil dikirim:<br>";
        echo "Nama: $nama<br>";
        echo "Email: $email<br>";
    }
}
?>
