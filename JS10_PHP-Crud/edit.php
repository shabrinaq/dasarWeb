<!DOCTYPE html>
<html>
    <head>
        <title>Edit Member Data</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include('koneksi.php');
        $id = $_GET['id'];
        $query = "SELECT * FROM member WHERE id = $id";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($koneksi);
        ?>
        <div class="container">
            <h2>Edit Member Data</h2>
            <form action="proses.php?action=edit" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
                <label for="gender">Gender:</label>
                <div class="radio-group">
                    <input type="radio" name="gender" value="L" id="male" <?php if ($row['gender'] === 'L') echo 'checked'; ?> required><label for="male">Male</label>
                    <input type="radio" name="gender" value="P" id="female" <?php if ($row['gender'] === 'P') echo 'checked'; ?> required><label for="female">Female</label>
                </div>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>" required>
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" value="<?php echo $row['phone_number']; ?>" required>
                <button type="submit">Save Changes</button> <a href="index.php" class="btn-kembali">Back</a>
            </form>
        </div>
    </body>
</html>
