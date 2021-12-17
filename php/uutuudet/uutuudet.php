<?php
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

try {
    // avataan tietokantaan yhteys
$db= openDb();
// Suoritetaan kysely, jossa haetaan kuluvana vuotena julkaistut kirjat
selectAsJson($db, 'select * from kirja where vuosi = year(curdate())');
}
// Käyttäjälle palautetaan error, jos pyyntö ei mene läpi
catch (PDOException $pdoex) {
    returnError($pdoex);
}

