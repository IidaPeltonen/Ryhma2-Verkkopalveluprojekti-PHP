<?php

require_once '../../inc/functions.php';
require_once '../../inc/headers.php';
//avataan tietokantaan yhteys
//Suoritetaan selectAsJson-funktio, jonka avulla haetaan kaikki käyttäjät
//jos menee catchiin, palautetaan error
try {
    $db= openDb();
    selectAsJson($db, 'select * from user');
    } catch (PDOException $pdoex) {
    returnError($pdoex);
    }