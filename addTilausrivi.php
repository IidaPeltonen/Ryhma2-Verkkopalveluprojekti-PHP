<?php

require_once './inc/headers.php';
require_once './inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$tilausnro = filter_var($input->tilausnro,FILTER_SANITIZE_NUMBER_INT);
$kirjaid = filter_var($input->kirjaid,FILTER_SANITIZE_NUMBER_INT);
$kpl = filter_var($input->kpl,FILTER_SANITIZE_NUMBER_INT);

try {
    $db= openDb();
    $query = $db->prepare('insert into tilausrivi (tilausnro, kirjaid, kpl) values (:tilausnro,  :kirjaid, :kpl)');
    $query->bindValue(':tilausnro',$tilausnro, PDO::PARAM_INT);
    $query->bindValue(':kirjaid',$kirjaid, PDO::PARAM_INT);
    $query->bindValue(':kpl',$kpl, PDO::PARAM_STR);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('tilausnro' => $tilausnro,'kirjaid' => $kirjaid, 'kpl' => $kpl);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}