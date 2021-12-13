<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$asid = filter_var($input->asid,FILTER_SANITIZE_NUMBER_INT);
$tila = filter_var($input->tila,FILTER_SANITIZE_STRING);

try {
    $db= openDb();
    $query = $db->prepare('insert into tilaus (asid,  tila) values (:asid,  :tila)');
    $query->bindValue(':asid',$asid, PDO::PARAM_INT);
    $query->bindValue(':tila',$tila, PDO::PARAM_STR);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('tilausnro' => $db->lastInsertId(),'asid' => $asid, 'tila' => $tila);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}