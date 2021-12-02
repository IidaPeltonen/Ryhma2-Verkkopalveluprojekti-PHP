<?php
require_once './inc/headers.php';
require_once './inc/functions.php';

// Luetaan tilauksen tiedot JSON-muodossa
$input = json_decode(file_get_contents('php://input'));
$asetunimi = filter_var($input->asetunimi,FILTER_SANITIZE_STRING);
$assukunimi = filter_var($input->assukunimi,FILTER_SANITIZE_STRING);
$asosoite = filter_var($input->asosoite,FILTER_SANITIZE_STRING);
$postinro = filter_var($input->postinro,FILTER_SANITIZE_STRING);
$postitmp = filter_var($input->postitmp,FILTER_SANITIZE_STRING);
$puhelin = filter_var($input->puhelin,FILTER_SANITIZE_STRING);
$email = filter_var($input->email,FILTER_SANITIZE_STRING);
$cart = $input->cart;

// muuttuja tietokantayhteydelle
$db = null;
try {
    // avataan tietokantayhteys
    $db = openDb();
    // aloitetaan transaktio
    $db->beginTransaction();
    // viedään asiakkaan tiedot tietokantaan
    $sql = "insert into asiakas (asetunimi, assukunimi ,asosoite,postinro,postitmp,puhelin,email) values
    ('" .
        filter_var($asetunimi,FILTER_SANITIZE_STRING) . "','" .
        filter_var($assukunimi,FILTER_SANITIZE_STRING) . "','" .
        filter_var($asosoite,FILTER_SANITIZE_STRING) . "','" .
        filter_var($postinro,FILTER_SANITIZE_STRING) . "','" .
        filter_var($postitmp,FILTER_SANITIZE_STRING) . "','" .
        filter_var($puhelin,FILTER_SANITIZE_STRING) . "','" .
        filter_var($email,FILTER_SANITIZE_STRING)
    . "')";

    $asid = executeInsert($db,$sql);

    // viedään tilauksen tiedot tilaus-tauluun
    $sql = "insert into tilaus (asid) values ($asid)";
    $tilausnro = executeInsert($db,$sql);

    // viedään ostoskorin tiedot tilausrivi-tauluun
    foreach ($cart as $product) {
        $sql = "insert into tilausrivi (tilausnro,kirjaid,kpl) values ("
        .
            $tilausnro . "," .
            $product->kirjaid . "," .
            $product->amount
        . ")";
        executeInsert($db,$sql);
    }

    // Commitoidaan transaktio
    $db->commit();

    // palautetaan 200 status ja asiakas id.
    header('HTTP/1.1 200 OK');
    $data = array('id' => $asid);
    print json_encode($data);
}
catch (PDOException $pdoex) {
    // perutaan transaktio, jos mennään erroriin.
    $db->rollback();
    // palautetaan error 500 statuksella. 
    returnError($pdoex);
}

