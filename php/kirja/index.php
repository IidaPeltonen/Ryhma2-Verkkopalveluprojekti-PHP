<?php
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';
//avataan tietokantaan yhteys
//Suoritetaan selectAsJson-funktio, jonka avulla haetaan kaikki kirjat
//jos menee catchiin, palautetaan error
try {
$db= openDb();
selectAsJson($db, 'select * from kirja');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}

