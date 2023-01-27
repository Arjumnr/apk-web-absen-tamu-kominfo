<?php
session_start();
session_unset();

require_once 'conn.php';
//login
//mencari data didatabase sesuai post
$result = mysqli_query($connect, "SELECT * FROM users WHERE username='" . $_POST['username'] . "'");
//cek apakah data ditemukan
if (mysqli_num_rows($result) === 1) {
    //mengambil data dari dari variable result merubah jadi array
    $row = mysqli_fetch_assoc($result);
    //cek password
    if (md5($_POST["password"]) == $row["password"]) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['x-y'] = $row['role'] == "admin" ? "x" : "y";
        echo json_encode(array("status" => "success", "message" => "Berhasil Login", "data" => $row['role']));
    } else {
        echo json_encode(array("status" => "error", "message" => "Password salah"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Username salah"));
}
