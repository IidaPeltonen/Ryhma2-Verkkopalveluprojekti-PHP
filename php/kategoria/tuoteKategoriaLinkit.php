<?php
// Koodi, jonka avulla haetaan kaikki tuotekategoriat, jotka näytetään sivuston navbarissa.
require_once '../../inc/functions.php';
require_once '../../inc/headers.php';

// Avataan tietokantayhteys. Suoritetaan selectAsJson-funktio, jonka avulla suoritetaan kaikkien tuotekategorioiden haku tietokannasta SQL-lauseella.
// Catch mahdollisten virhetilanteiden varalta.
try {
    $db= openDb();
    selectAsJson($db, 'select * from category');
     } catch (PDOException $pdoex) {
    returnError($pdoex);
    }
