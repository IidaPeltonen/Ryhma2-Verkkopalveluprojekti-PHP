<?php
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
//sanitoidaan inputit
$tilausnro = filter_var($input->tilausnro,FILTER_SANITIZE_NUMBER_INT);
$asid = filter_var($input->asid,FILTER_SANITIZE_NUMBER_INT);
$tila = filter_var($input->tila,FILTER_SANITIZE_STRING);

//avataan tietokantaan yhteys
//Valmistellaan sql-lause, jossa päivitetään tilauksen tiedot
//Parametrisoidaan
//Viedään tiedot tietokantaan
//Palautetaan 200 OK
//jos menee catchiin, palautetaan error

try {
    $db= openDb();
    $query = $db->prepare('update tilaus set tila=:tila where tilausnro=:tilausnro');
    $query->bindValue(':tilausnro',$tilausnro, PDO::PARAM_INT);
    $query->bindValue(':tila', $tila, PDO::PARAM_STR);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('tilausnro' => $tilausnro, 'tila' => $tila);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}