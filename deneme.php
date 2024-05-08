<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://localhost/library/makale-ekle.php',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS =>'{
//     "tarih": "2024-05-08 12:00:00",
//     "baslik": "test b sitesi",
//     "kisa_aciklama": "test",
//     "aciklama": "test"
// }',
//   CURLOPT_HTTPHEADER => array(
//     'userToken: 123',
//     'Content-Type: application/json'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;
date_default_timezone_set('Europe/Istanbul');
$tarih_b = date("Y-m-d H:i:s");
$baslik = "d";
$kisa_aciklama = "d";
$aciklama = "fsgfvadgdg";

$url = 'http://localhost/library/makale-ekle.php';

$veri = array(
    "tarih" => $tarih_b,
    "baslik" => $baslik,
    "kisa_aciklama" => $kisa_aciklama,
    "aciklama" => $aciklama
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($veri)); // Veriyi JSON formatına çeviriyoruz
$header = array(
    'userToken: 123',
    'Authorization: Basic ' . base64_encode('APIKEY:APISECRET'),
    'Content-Type: application/json',
    'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1)'
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$result = curl_exec($ch);
curl_close($ch);

// curl_exec işlemi başarılı olduysa $result değişkeni isteğin cevabını içerir
if ($result === false) {
    echo 'Curl hatası: ' . curl_error($ch);
}
