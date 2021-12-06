<?php

require_once 'inc/functions.php';
require_once 'inc/headers.php';

try {
    $db = openDb();
    selectAsJson($db, "SELECT tilaus.tilausnro, tilaus.asid, asiakas.astunnus,asiakas.asetunimi, asiakas.assukunimi, tilaus.pvm, tilaus.tila, tilausrivi.kirjaid, kirja.kirjanimi, tilausrivi.kpl from tilaus,asiakas, tilausrivi,kirja where tilaus.asid = asiakas.asid AND tilaus.tilausnro = tilausrivi.tilausnro AND tilausrivi.kirjaid = kirja.kirjaid;");
    } catch (PDOException $pdoex) {
    returnError($pdoex);
    }

    //tämä näyttäisi kaikki tilaukset, asiakkaat, rilausrivit ja kirjat yhdellä haulla
    //SELECT tilaus.tilausnro, tilaus.asid, asiakas.astunnus,asiakas.asetunimi, asiakas.assukunimi, tilaus.pvm, tilaus.tila, tilausrivi.kirjaid, kirja.kirjanimi, tilausrivi.kpl from tilaus,asiakas, tilausrivi,kirja where tilaus.asid = asiakas.asid AND tilaus.tilausnro = tilausrivi.tilausnro AND tilausrivi.kirjaid = kirja.kirjaid;

    


