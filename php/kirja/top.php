<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';
//avataan tietokantaan yhteys
//Suoritetaan selectAsJson-funktio, jonka avulla haetaan top7-myydyimmät kirjat
//jos menee catchiin, palautetaan error
try {
    $db= openDb();
    selectAsJson($db, 
    'SELECT kirja.kirjaid, kirjanimi,kirjailija, vuosi, kieli, kustantaja, kuvaus, hinta, 
    saldo, kuva, SUM(kpl) AS SUM
    FROM tilausrivi, kirja
    where kirja.kirjaid = tilausrivi.kirjaid
    GROUP by kirjaid
    ORDER BY SUM(kpl) desc LIMIT 7');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}