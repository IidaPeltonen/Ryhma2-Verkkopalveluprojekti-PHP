<?php
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

try {
// avataan tietokantaan yhteys
// Suoritetaan selectAsJson-funktio, jonka avulla haetaan kuluvana vuotena julkaistut kirjat
// Käyttäjälle palautetaan error, jos pyyntö ei mene läpi
$db= openDb();
selectAsJson($db, 'select * from kirja where vuosi = year(curdate())');
}

catch (PDOException $pdoex) {
    returnError($pdoex);
}

