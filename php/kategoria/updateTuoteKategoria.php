<?php
// Tämä koodi toteuttaa tuotekategorian päivittämisen tietokantaan.
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';
// luetaan muuttujat inputeista ja sanitoidaan.
$input = json_decode(file_get_contents('php://input'));
$id = filter_var($input->id,FILTER_SANITIZE_NUMBER_INT);
$name = filter_var($input->name,FILTER_SANITIZE_STRING);
// Avataan tietokantayhteys. Valmistellaan SQL-lause ja bindataan muuttujat. Viedään tiedot tietokantaan ja palautetaan 200 OK.
try {
    $db= openDb();    
    $query = $db->prepare('update category set name=:name where id=:id');
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->bindValue(':name',$name, PDO::PARAM_STR);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('id' => $id, 'name' => $name);
    print json_encode($data);
    // Catch mahdollisten virhetilanteiden varalta.
} catch (PDOException $pdoex) {
    returnError($pdoex);
}