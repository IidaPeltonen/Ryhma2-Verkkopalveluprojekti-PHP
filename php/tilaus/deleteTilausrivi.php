<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$tilausnro = filter_var($input->tilausnro,FILTER_SANITIZE_NUMBER_INT);
$kirjaid = filter_var($input->kirjaid,FILTER_SANITIZE_NUMBER_INT);

try {
    $db= openDb();
    $query = $db->prepare('delete from tilausrivi where tilausnro=(:tilausnro) AND kirjaid=(:kirjaid)');
    $query->bindValue(':tilausnro',$tilausnro, PDO::PARAM_INT);
    $query->bindValue(':kirjaid',$kirjaid, PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('tilausnro' => $tilausnro, 'kirjaid' => $kirjaid);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}
