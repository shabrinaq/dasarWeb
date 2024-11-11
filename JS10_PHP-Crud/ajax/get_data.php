<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$id = $_POST['id'];
$query = "SELECT * FROM member WHERE id=? ORDER BY id DESC";
$sql = $db1->prepare($query);
$sql->bind_param('i', $id);
$sql->execute();
$res1 = $sql->get_result();
while ($row = $res1->fetch_assoc()) {
    $h['id'] = $row["id"];
    $h ['name' ] = $row["name"];
    $h['gender'] = $row["gender"];
    $h['address'] = $row["address"];
    $h['phone_number'] = $row["phone_number"];
}
echo json_encode($h);

$db1->close();
?>