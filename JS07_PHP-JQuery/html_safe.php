<?php
$input = $_POST['input'];
$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

echo "<script>alert('You have been hacked!');</script>";
?>
