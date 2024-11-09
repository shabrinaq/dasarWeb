<!DOCTYPE html>
<html>
    <head>
        <title>Add Member Data</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <h2>Add Member Data</h2>
            <form action="proses.php?action=tambah" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <label for="gender">Gender:</label>
                <div class="radio-group">
                    <input type="radio" name="gender" value="L" id="male" required><label for="male">Male</label>
                    <input type="radio" name="gender" value="P" id="female" required><label for="female">Female</label>
                </div>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" required>
                <button type="submit">Save Data</button>
                <a href="index.php" class="btn-kembali">Back</a>
            </form>
        </div>
    </body>
</html>