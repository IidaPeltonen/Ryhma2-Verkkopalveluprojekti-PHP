<?php

require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

try {
    $db= openDb();
    selectAsJson($db, 
    'SELECT ROW_NUMBER() over(order by sum(kpl) desc ) as rownum, 
    kirja.kirjaid, kirjanimi,kirjailija, vuosi, kieli, kustantaja, kuvaus, hinta, 
    saldo, kuva, SUM(kpl) AS SUM
    FROM tilausrivi, kirja
    where kirja.kirjaid = tilausrivi.kirjaid
    GROUP by kirjaid
    ORDER BY SUM(kpl) desc LIMIT 7');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}