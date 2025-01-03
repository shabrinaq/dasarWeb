<?php
include('../lib/Session.php');
$session = new Session();
if ($session->get('is_login') !== true) {
    header('Location: login.php');
    exit();
}

include_once('../model/bukuModel.php');
include_once('../lib/Secure.php');

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

header('Content-Type: application/json'); // Ensure the content type is JSON

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($act == 'load') {
    $buku = new BukuModel();
    $data = $buku->getData();
    $result = [];
    $i = 1;
    while ($row = $data->fetch_assoc()) {
        $result['data'][] = [
            $i,
            $row['buku_kode'],
            $row['buku_nama'],
            $row['kategori_id'],
            $row['jumlah'],
            $row['deskripsi'],
            '<img width="200px" src="'.$row['gambar'].'">',
            '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['buku_id'] . ')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['buku_id'] . ')"><i class="fa fa-trash"></i></button>'
        ];
        $i++;
    }
    echo json_encode($result);
    exit();
}

if ($act == 'get') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $buku = new BukuModel();
    $data = $buku->getDataById($id);
    echo json_encode($data);
    exit();
}

if ($act == 'save') {
    $data = [
        'kategori_id' => antiSqlInjection($_POST['kategori_id']),
        'buku_kode' => antiSqlInjection($_POST['buku_kode']),
        'buku_nama' => antiSqlInjection($_POST['buku_nama']),
        'jumlah' => (int)$_POST['jumlah'],
        'deskripsi' => antiSqlInjection($_POST['deskripsi']),
        'gambar' => antiSqlInjection($_POST['gambar'])
    ];
    $buku = new bukuModel();
    $buku->insertData($data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil disimpan.'
    ]);
    exit();
}

if ($act == 'update') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $data = [
        'kategori_id' => antiSqlInjection($_POST['kategori_id']),
        'buku_kode' => antiSqlInjection($_POST['buku_kode']),
        'buku_nama' => antiSqlInjection($_POST['buku_nama']),
        'jumlah' => (int)$_POST['jumlah'],
        'deskripsi' => antiSqlInjection($_POST['deskripsi']),
        'gambar' => antiSqlInjection($_POST['gambar'])
    ];
    $buku = new bukuModel();
    $buku->updateData($id, $data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil diupdate.'
    ]);
    exit();
}

if ($act == 'delete') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $buku = new bukuModel();
    $buku->deleteData($id);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil dihapus.'
    ]);
    exit();
}
?>