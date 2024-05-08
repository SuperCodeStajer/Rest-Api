<?php
require "config.php";

$makaleler = DB::get("SELECT * FROM makale");
$token = $_GET['token'];

if ($token == "123") {
    $return_array = array();
    $return_array['type'] = "success";
    $return_array['count'] = count($makaleler);
    $return_array['data'] = $makaleler;
    echo json_encode($return_array);
} else {
    $return_array = array();
    $return_array['type'] = "error";
    echo json_encode($return_array);
}
