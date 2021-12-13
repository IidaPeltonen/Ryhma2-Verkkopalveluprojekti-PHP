<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$asid = filter_var($input->asid,FILTER_SANITIZE_NUMBER_INT);

try {
    $db= openDb();
    $query = $db->prepare('delete from asiakas where asid=(:asid)');
    $query->bindValue(':asid', $asid, PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('asid' => $asid);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}

