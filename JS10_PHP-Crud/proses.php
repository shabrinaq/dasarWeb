<?php
include('koneksi.php');

$action = isset($_GET['action']) ? $_GET['action'] : ''; 
$name = isset($_POST['name']) ? $_POST['name'] : ''; 
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';

if ($action == 'add') {
    $query = "INSERT INTO member (name, gender, address, phone_number) VALUES ('$name', '$gender', '$address', '$phone_number')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to add data: " . mysqli_error($koneksi);
    }
} elseif ($action == "edit") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "UPDATE member SET name='$name', gender='$gender', address='$address', phone_number='$phone_number' WHERE id=$id";

        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to edit data: " . mysqli_error($koneksi);
        }
    } else {
        echo "Invalid ID";
    }
} elseif ($action == "delete") { 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "DELETE FROM member WHERE id = $id"; 
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to delete data: " . mysqli_error($koneksi);
        }
    } else {
        echo "Invalid ID";
    }
}

mysqli_close($koneksi);
?>
