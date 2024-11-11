<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$name = stripslashes(strip_tags(htmlspecialchars($_POST['name'] ,ENT_QUOTES)));
$gender = stripslashes(strip_tags(htmlspecialchars($_POST['gender'] ,ENT_QUOTES)));
$address = stripslashes(strip_tags(htmlspecialchars($_POST['address'] ,ENT_QUOTES) ));
$phone_number = stripslashes(strip_tags(htmlspecialchars($_POST['phone_number'] ,ENT_QUOTES)));

$query = "INSERT into member (name, gender, address, phone_number) VALUES (?, ?, ?, ?)";
$sql = $db1->prepare($query);
$sql->bind_param("ssss", $name, $gender, $address, $phone_number);
$sql->execute();

echo json_encode(['success' => 'Data saved successfully']);

$db1->close();
?>