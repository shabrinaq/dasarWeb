<!DOCTYPE html>
<html>
<head>
    <title>Member Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Member Data</h2>
    <a class="btn btn-success mt-2" href="create.php">Add Data</a>
    <br><br>
    <?php
    include('koneksi.php');
    $query = "SELECT * FROM anggota ORDER BY id DESC";
    $result = mysqli_query($koneksi, $query);
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $gender = ($row["jenis_kelamin"] == 'L') ? 'Male' : 'Female';
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $gender ?></td>
            <td><?= $row["address"] ?></td>
            <td><?= $row["phone_number"] ?></td>
            <td>
                <a class="btn btn-primary" href="edit.php?id=<?= $row["id"] ?>">Edit</a>
                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal<?= $row["id"] ?>">Delete</a>
            </td>
        </tr>

        <div class="modal fade" id="deleteModal<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= "Are you sure you want to delete the data for " . $row["name"] . "?" ?>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="proses.php?aksi=hapus&id=<?= $row["id"] ?>">Delete</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>