<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';
        $no = 1;
        $query = "SELECT * FROM member ORDER BY id DESC";
        $sql = $db1->prepare($query);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $gender = ($row['gender'] == 'L') ? 'Male' : 'Female';
                $address = $row['address'];
                $phone_number = $row['phone_number'];
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $phone_number; ?></td>
                    <td>
                        <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6" class="text-center">No data found</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    }
        );
        function reset() {
            document.getElementById("err_name").innerHTML = "";
            document.getElementById("err_gender").innerHTML = "";
            document.getElementById("err_address").innerHTML = "";
            document.getElementById("err_phone_number").innerHTML = "";
        }

        $(document).on('click', '.edit_data', function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: "get_data.php",
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    reset();
                    $('html, body').animate({ scrollTop: 30 }, 'slow');
                    document.getElementById("id").value = response.id;
                    document.getElementById("name").value = response.name;
                    document.getElementById("address").value = response.address;
                    document.getElementById("phone_number").value = response.phone_number;
                    
                    if (response.jenis_kelamin == "L") {
                        document.getElementById("gender1").checked = true;
                    } else {
                        document.getElementById("gender2").checked = true;
                    }
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        });
</script>

