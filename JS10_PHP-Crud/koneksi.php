<?php
$koneksi = mysqli_connect("localhost", "root", "", "prakwebdb");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}
