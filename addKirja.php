<?php
require_once './inc/headers.php';
require_once './inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$kirjanimi = filter_var($input->kirjanimi,FILTER_SANITIZE_STRING);
$kirjailija = filter_var($input->kirjailija,FILTER_SANITIZE_STRING);
$vuosi = filter_var($input->vuosi,FILTER_SANITIZE_NUMBER_INT);
$kieli = filter_var($input->kieli,FILTER_SANITIZE_STRING);
$kustantaja = filter_var($input->kustantaja,FILTER_SANITIZE_STRING);
$kuvaus = filter_var($input->kuvaus,FILTER_SANITIZE_STRING);
$hinta = filter_var($input->hinta,FILTER_SANITIZE_STRING);
$saldo = filter_var($input->saldo,FILTER_SANITIZE_NUMBER_INT);
$kuva = filter_var($input->kuva,FILTER_SANITIZE_STRING);
$category_id = filter_var($input->category_id,FILTER_SANITIZE_NUMBER_INT);

try {
    $db= openDb();
    $query = $db->prepare('insert into kirja (kirjanimi, kirjailija, vuosi, kieli, 
    kustantaja, kuvaus, hinta, saldo, kuva, category_id) values (:kirjanimi, :kirjailija, :vuosi, 
    :kieli, :kustantaja, :kuvaus, :hinta, :saldo, :kuva, :category_id)');
    $query->bindValue(':kirjanimi',$kirjanimi, PDO::PARAM_STR);
    $query->bindValue(':kirjailija',$kirjailija, PDO::PARAM_STR);
    $query->bindValue(':vuosi', $vuosi, PDO::PARAM_INT);
    $query->bindValue(':kieli',$kieli, PDO::PARAM_STR);
    $query->bindValue(':kustantaja',$kustantaja, PDO::PARAM_STR);
    $query->bindValue(':kuvaus',$kuvaus, PDO::PARAM_STR);
    $query->bindValue(':hinta', $hinta, PDO::PARAM_STR);
    $query->bindValue(':saldo', $saldo, PDO::PARAM_INT);
    $query->bindValue(':kuva', $kuva, PDO::PARAM_STR);
    $query->bindValue(':category_id', $category_id, PDO::PARAM_STR);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('kirjaid' => $db->lastInsertId(),'kirjanimi' => $kirjanimi, 'kirjailija' => $kirjailija, 
    'vuosi' => $vuosi, 'kieli' => $kieli, 'kustantaja' => $kustantaja, 'kuvaus' => $kuvaus, 
    'hinta' => $hinta, 'saldo' => $saldo, 'kuva' => $kuva, 'category_id' => $category_id);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}