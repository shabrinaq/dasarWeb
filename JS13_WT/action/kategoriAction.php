<?php
include('../lib/Session.php');
$session = new Session();
if ($session->get('is_login') !== true) {
    header('Location: login.php');
    exit();
}

include_once('../model/kategoriModel.php');
include_once('../lib/Secure.php');

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

header('Content-Type: application/json'); // Ensure the content type is JSON

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($act == 'load') {
    $kategori = new kategoriModel();
    $data = $kategori->getData();
    $result = [];
    $i = 1;
    while ($row = $data->fetch_assoc()) {
        $result['data'][] = [
            $i,
            $row['kategori_kode'],
            $row['kategori_nama'],
            '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['kategori_id'] . ')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['kategori_id'] . ')"><i class="fa fa-trash"></i></button>'
        ];
        $i++;
    }
    echo json_encode($result);
    exit();
}

if ($act == 'get') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $kategori = new kategoriModel();
    $data = $kategori->getDataById($id);
    echo json_encode($data);
    exit();
}

if ($act == 'save') {
    $data = [
        'kategori_kode' => antiSqlInjection($_POST['kategori_kode']),
        'kategori_nama' => antiSqlInjection($_POST['kategori_nama'])
    ];
    $kategori = new kategoriModel();
    $kategori->insertData($data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil disimpan.'
    ]);
    exit();
}

if ($act == 'update') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $data = [
        'kategori_kode' => antiSqlInjection($_POST['kategori_kode']),
        'kategori_nama' => antiSqlInjection($_POST['kategori_nama'])
    ];
    $kategori = new kategoriModel();
    $kategori->updateData($id, $data);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil diupdate.'
    ]);
    exit();
}

if ($act == 'delete') {
    $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
    $kategori = new kategoriModel();
    $kategori->deleteData($id);
    echo json_encode([
        'status' => true,
        'message' => 'Data berhasil dihapus.'
    ]);
    exit();
}
?>