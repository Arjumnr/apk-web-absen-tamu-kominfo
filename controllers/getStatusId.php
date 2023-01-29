<?php
require_once("config.php");
$data = single("SELECT * FROM tb_tamu WHERE id='" . $_POST['id'] . "'");
//cek apakah data ditemukan
if ($data) {
    //mengambil data dari dari variable data merubah jadi array
    echo json_encode(array("status" => "success", "message" => "Data Ditemukan", "data" => $data));
} else {
    echo json_encode(array("status" => "error", "message" => "Data Tidak Ditemukan"));
}
