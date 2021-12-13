<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$userid = filter_var($input->userid,FILTER_SANITIZE_NUMBER_INT);

try {
    $db= openDb();
    $query = $db->prepare('delete from user where userid=(:userid)');
    $query->bindValue(':userid', $userid, PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('userid' => $userid);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}

