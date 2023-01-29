<?php
require_once("config.php");


$result = mysqli_query($connect, "SELECT * FROM tb_tamu WHERE id='" . $_POST['id'] . "'");

    if(mysqli_num_rows($result) <= 1 ){
        $result = update("tb_tamu", "status" . "='" . $_POST['status'] . "' WHERE id=" . $_GET['id']);

        if ($result) {
            echo json_encode(array("status" => "success", "message" => "Berhasil Update Data"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Gagal Update Data"));
        }
    }
