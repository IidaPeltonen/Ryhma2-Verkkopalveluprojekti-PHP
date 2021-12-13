<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$kirjaid = filter_var($input->kirjaid,FILTER_SANITIZE_NUMBER_INT);

try {
    $db= openDb();  
    $query = $db->prepare('delete from kirja where kirjaid=(:kirjaid)');
    $query->bindValue(':kirjaid',$kirjaid, PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('kirjaid' => $kirjaid);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}

