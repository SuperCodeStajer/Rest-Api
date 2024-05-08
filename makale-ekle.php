<?php
require "config.php";

$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['HTTP_USERTOKEN'] != "123") {
    $return_array = array();
    $return_array["type"] = "error";
    $return_array["message"] = "not varible token";
    echo json_encode($return_array);
    die();
} else {
    $tarih = $data["tarih"];
    $baslik = $data["baslik"];
    $kisa_aciklama = $data["kisa_aciklama"];
    $aciklama = $data["aciklama"];

    $id = DB::insert('insert into makale (tarih,baslik,kisa_aciklama,aciklama) values (?,?,?,?)', [
        $tarih,
        $baslik,
        $kisa_aciklama,
        $aciklama
    ]);

    $return_array = array();
    $return_array["type"] = "success";
    $return_array["message"] = "gread add data";
    echo json_encode($return_array);
}
