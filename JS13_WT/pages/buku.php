<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'dasar_web');

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah data
if (isset($_POST['add'])) {
    $kategori_id = $_POST['kategori_id'];
    $buku_kode = $_POST['buku_kode'];
    $buku_nama = $_POST['buku_nama'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];

    $sql = "INSERT INTO buku (kategori_id, buku_kode, buku_nama, jumlah, deskripsi, gambar) 
            VALUES ('$kategori_id', '$buku_kode', '$buku_nama', '$jumlah', '$deskripsi', '$gambar')";
    $conn->query($sql);
}

// Hapus data
if (isset($_GET['delete'])) {
    $buku_id = $_GET['delete'];
    $conn->query("DELETE FROM buku WHERE buku_id = $buku_id");
}

// Ambil data
$result = $conn->query("SELECT * FROM m_buku");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Manajemen Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>

    <!-- Form Tambah Buku -->
    <form method="post">
        <input type="text" name="kategori_id" placeholder="ID Kategori" required>
        <input type="text" name="buku_kode" placeholder="Kode Buku" required>
        <input type="text" name="buku_nama" placeholder="Nama Buku" required>
        <input type="number" name="jumlah" placeholder="Jumlah" required>
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input type="text" name="gambar" placeholder="URL Gambar">
        <button type="submit" name="add">Tambah</button>
    </form>

    <!-- Tabel Data Buku -->
    <table border="1">
        <tr>
            <th>ID Buku</th>
            <th>ID Kategori</th>
            <th>Kode Buku</th>
            <th>Nama Buku</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['buku_id'] ?></td>
                <td><?= $row['kategori_id'] ?></td>
                <td><?= $row['buku_kode'] ?></td>
                <td><?= $row['buku_nama'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td><?= $row['gambar'] ?></td>
                <td>
                    <a href="?page=buku&delete=<?= $row['buku_id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
