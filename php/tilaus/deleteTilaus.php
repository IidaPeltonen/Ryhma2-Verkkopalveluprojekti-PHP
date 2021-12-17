<?php
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
//sanitoidaan inputit
$tilausnro = filter_var($input->tilausnro,FILTER_SANITIZE_NUMBER_INT);
//avataan tietokantaan yhteys
//Valmistellaan sql-lause, jolla poistetaan tilaus sekä tilausrivi
//Parametrisoidaan
//Tehdään poisto
//Palautetaan 200 OK
//jos menee catchiin, palautetaan error
try {
    $db= openDb();
    $query = $db->prepare('delete from tilausrivi where tilausnro=(:tilausnro)');
    $query->bindValue(':tilausnro',$tilausnro, PDO::PARAM_INT);
    $query->execute();
    $query = $db->prepare('delete from tilaus where tilausnro=(:tilausnro)');
    $query->bindValue(':tilausnro',$tilausnro, PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('tilausnro' => $tilausnro);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}
