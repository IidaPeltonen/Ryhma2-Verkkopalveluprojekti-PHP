<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
//sanitoidaan inputit
$kirjaid = filter_var($input->kirjaid,FILTER_SANITIZE_NUMBER_INT);
//avataan tietokantaan yhteys
//Valmistellaan sql-lause, jolla poistetaan kirja tietokannasta
//Parametrisoidaan
//Tehdään poisto
//Palautetaan 200 OK
//jos menee catchiin, palautetaan error
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

