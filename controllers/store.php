<?php
require_once 'config.php';

if ($_POST['instansi'] == "" || $_POST['nama'] == "" || $_POST['tema'] == "") {
    echo json_encode(array("status" => "error", "message" => "Tidak Boleh Kosong"));
    return;
}



//insert data instansi nama tema tanggal satus ke database
$result = mysqli_query($connect, "INSERT INTO tb_tamu VALUES (NULL, '" . $_POST['instansi'] . "', '" . $_POST['nama'] . "', '" . $_POST['tema'] . "', '" . date('Y-m-d') . "', 'invalid')");
if ($result) {
    echo json_encode(array("status" => "success", "message" => "Berhasil Menambahkan Data"));
} else {
    echo json_encode(array("status" => "error", "message" => "Gagal Menambahkan Data"));
}
