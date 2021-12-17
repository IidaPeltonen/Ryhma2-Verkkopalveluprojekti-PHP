<?php
// Tämä koodi toteuttaa tuotekategorian lisäämisen tietokantaan.
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';
// luetaan muuttuja inputista ja sanitoidaan.
$input = json_decode(file_get_contents('php://input'));
$name = filter_var($input->name,FILTER_SANITIZE_STRING);
// Avataan tietokantayhteys. Valmistellaan SQL-lause ja bindataan muuttuja. Viedään tiedot tietokantaan ja palautetaan 200 OK status.
try {
    $db= openDb();    
    $query = $db->prepare('insert into category (name) values (:name)');
    $query->bindValue(':name',$name, PDO::PARAM_STR);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('id' => $db->lastInsertId(),'name' => $name);
    print json_encode($data);
    // Catch mahdollisten virhetilanteiden varalta.
} catch (PDOException $pdoex) {
    returnError($pdoex);
}