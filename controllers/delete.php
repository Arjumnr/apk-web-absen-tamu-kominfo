<?php
require_once 'config.php';

//login

$result = hapus("tb_tamu",  $_GET['id']);
//cek apakah data ditemukan
if ($result) {
    echo json_encode(array("status" => "success", "message" => "Berhasil Hapus User"));
} else {
    echo json_encode(array("status" => "error", "message" => "Gagal Hapus User"));
}
