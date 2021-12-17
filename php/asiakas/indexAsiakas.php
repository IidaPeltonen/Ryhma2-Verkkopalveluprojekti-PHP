<?php
// Tällä koodilla saadaan tehtyä kaikkien asiakkaiden kysely tietokantaan.
require_once '../../inc/functions.php';
require_once '../../inc/headers.php';
// Avataan tietokantayhteys. Suoritetaan selectAsJson-funktio, jonka avulla suoritetaan kaikkien asiakkaiden haku tietokannasta SQL-lauseella.
// Catch mahdollisten virhetilanteiden varalta.
try {
    $db= openDb();
    selectAsJson($db, 'select * from asiakas');
    } catch (PDOException $pdoex) {
    returnError($pdoex);
    }