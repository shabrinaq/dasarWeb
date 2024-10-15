<?php
if (isset($_POST["submit"])) {
    $targetdir = "uploads/"; 
    $fileName = $_FILES['myfile']['name']; 
    $fileTmpName = $_FILES['myfile']['tmp_name']; 
    $fileSize = $_FILES['myfile']['size']; 
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 

    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $maxsize = 5 * 1024 * 1024; 

    if ($_FILES['myfile']['error'] == 0) {
        if (in_array($fileType, $allowedExtensions) && $fileSize <= $maxsize) {
            if (move_uploaded_file($fileTmpName, $targetdir . $fileName)) {
                echo "File berhasil diunggah.<br>";
                // Menampilkan gambar yang diunggah
                echo "<img src='$targetdir$fileName' width='200' alt='Thumbnail'>";
            } else {
                echo "Gagal memindahkan file ke direktori tujuan.";
            }
        } else {
            echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
        }
    } else {
        echo "Gagal mengunggah file. Error: " . $_FILES['myfile']['error'];
    }
}
?>
