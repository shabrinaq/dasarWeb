<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD With AJAX</title>
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlW3e6y6e0K1zFurJN8uN91j+3iQtbJq0WNaO01nXhJpWZ1HEeFLfl0ZK" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#" style="color: #fff;">
            CRUD With Ajax
        </a>
    </nav>
    <div class="container">
        <div align="center" style="margin: 30px;">Member Data</div>
        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="name" id="name" class="form-control" required="true">
                        <p class="text-danger" id="err_name"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" name="gender" id="gender1" value="L" required="true"> Male
                        <input type="radio" name="gender" id="gender2" value="P"> Female
                    </div>
                    <p class="text-danger" id="err_gender"></p>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control" required="true"></textarea>
                <p class="text-danger" id="err_address"></p>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" name="phone_number" id="phone_number" class="form-control" required="true">
                <p class="text-danger" id="err_phone_number"></p>
            </div>

            <div class="form-group">
                <button type="button" name="save" id="save" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
        <div class="data"></div>
    </div>
    <div class="text-center">© <?php echo date('Y'); ?> Copyright: 
        <a href="https://google.com">Web Design and Programming</a>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Mengirim token keamanan
            $.ajaxSetup({
                headers: {
                    'Csrf-Token' : $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.data').load('data.php');
        
            $("#save").click(function(){
                var data = $('.form-data').serialize();
                var name = document.getElementById("name").value;
                var address = document.getElementById("address").value;
                var phone_number = document.getElementById("phone_number").value;

                // Validasi Nama
                if (name=="") {
                    document.getElementById("err_name").innerHTML = "Name is required";
                } else {
                    document.getElementById("err_name").innerHTML = "";
                }

                // Validasi Alamat
                if (address=="") {
                    document.getElementById("err_address").innerHTML = "Address is required";
                } else {
                    document.getElementById("err_address").innerHTML = "";
                }

                // Validasi Gender
                if (document.getElementById("gender1").checked==false && document.getElementById("gender2").checked == false) {
                    document.getElementById("err_gender").innerHTML = "Gender must be selected";
                } else {
                    document.getElementById("err_gender").innerHTML = "";
                }

                // Validasi Nomor Telepon
                if (phone_number=="") {
                    document.getElementById("err_phone_number").innerHTML = "Phone number is required";
                } else {
                    document.getElementById("err_phone_number").innerHTML = "";
                }

                // Kirim data jika semua validasi berhasil
                if (name!="" && address != "" && (document.getElementById("gender1").checked == true || document.getElementById("gender2").checked == true) && phone_number != "") {
                    $.ajax({
                        type: 'POST',
                        url: "form_action.php",
                        data: data,
                        success: function() {
                            $('.data').load("data.php");
                            document.getElementById("id").value = "";
                            document.getElementById("form-data").reset();
                        }, 
                        error: function(response) {
                            console.log(response.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>