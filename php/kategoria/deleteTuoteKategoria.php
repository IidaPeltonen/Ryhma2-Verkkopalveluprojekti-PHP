<?php
// Tällä koodilla toteutetaan tuotekategorian poisto tietokannasta.
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';
// luetaan muuttuja inputista ja sanitoidaan.
$input = json_decode(file_get_contents('php://input'));
$id = filter_var($input->id,FILTER_SANITIZE_NUMBER_INT);
// Avataan tietokantayhteys. Valmistellaan SQL-lause ja bindataan muuttuja. Tehdään ja palautetaan 200 OK status.
try {
    $db= openDb();  
    $query = $db->prepare('delete from category where id=(:id)');
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('id' => $id);
    print json_encode($data);
    // Catch mahdollisten virhetilanteiden varalta.
} catch (PDOException $pdoex) {
    returnError($pdoex);
}