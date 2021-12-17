<?php
// Tämä tiedosto on asiakkaan poistamiseen tietokannasta.
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';
// luetaan muuttuja inputista ja sanitoidaan.
$input = json_decode(file_get_contents('php://input'));
$asid = filter_var($input->asid,FILTER_SANITIZE_NUMBER_INT);
// Avataan tietokantayhteys. Valmistellaan SQL-lause ja bindataan muuttuja. Tehdään poisto ja palautetaan 200 OK status.
try {
    $db= openDb();
    $query = $db->prepare('delete from asiakas where asid=(:asid)');
    $query->bindValue(':asid', $asid, PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('asid' => $asid);
    print json_encode($data);
// Catch mahdollisten virhetilanteiden varalta.
} catch (PDOException $pdoex) {
    returnError($pdoex);
}

