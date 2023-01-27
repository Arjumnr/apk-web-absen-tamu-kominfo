<?php
$connect = mysqli_connect("localhost", "root", "", "db_absen_kominfo");
function single($query)
{
    global $connect;
    $data = mysqli_query($connect, $query);
    return mysqli_fetch_assoc($data);
}

function many($table)
{
    global $connect;
    $hasil = mysqli_query($connect, "$table");
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($table, $value)
{
    global $connect;
    $query = "INSERT INTO $table values $value";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function hapus($table, $id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM $table WHERE id=$id");
    return mysqli_affected_rows($connect);
}

function update($table, $query)
{
    global $connect;
    $result = mysqli_query($connect, "UPDATE $table SET $query");
    return mysqli_affected_rows($connect);
}


function counts($table)
{
    global $connect;
    $hasil = mysqli_query($connect, "SELECT count(*) as jumlah FROM $table");
    return mysqli_fetch_assoc($hasil);
}

