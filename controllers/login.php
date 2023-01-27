<?php
session_start();
session_unset();

require_once 'config.php';

$result = mysqli_query($connect, "SELECT * FROM tb_users WHERE username='" . $_POST['username'] . "'");

if (mysqli_num_rows($result) == 1) {
    //mengambil data dari dari variable result merubah jadi array
    $row = mysqli_fetch_assoc($result);

    if($_POST["password"] == $row["password"]){
        $_SESSION['username'] = $row['username'];
        echo json_encode(array("status" => "success", "message" => "Login Berhasil"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Password salah"));
    }

}else{
    echo json_encode(array("status" => "error", "message" => "Username salah"));
}
