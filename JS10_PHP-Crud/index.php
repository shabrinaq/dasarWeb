<!DOCTYPE html>
<html>
<head>
    <title>Member Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Member Data</h2>
        <a href="create.php" class="btn-tambah">Add Member</a>
        <br>
        <?php
        include("koneksi.php");

        $query = "SELECT * FROM member ORDER BY id desc";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            echo "<table>";
            echo "<tr>
                <th>No</th><th>Name</th><th>Gender</th>
                <th>Address</th><th>Phone No.</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_array($result)) {
                $gender = ($row['gender'] == 'L') ? 'Male' : 'Female';
                echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $gender . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['phone_number'] . "</td>
                    <td>
                        <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
                        <a href='#' onclick='confirmDelete(" . $row['id'] . ", \"" . $row['name'] . "\")'>Delete</a>
                    </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No data available.</p>";
        }
        mysqli_close($koneksi);
        ?>
    </div>

    <script>
    function confirmDelete(id, name) {
        var confirmDelete = confirm("Are you sure you want to delete the data for Name = " + name + "?");
        if (confirmDelete) {
            window.location.href = "proses.php?action=delete&id=" + id;
        }
    }
    </script>
</body>
</html>
