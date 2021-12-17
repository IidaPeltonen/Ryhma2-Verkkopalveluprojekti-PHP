<?php
// Sisäänkirjautumiseen käytettävä koodi. Tämä on siis käytössä, kun kirjaudutaan Admin-osioon.
// firebase\JWT käyttöön.
use Firebase\JWT\JWT;

require_once '../../inc/functions.php';
require_once '../../inc/headers.php';

//Tarkistetaan tuleeko palvelimelle basic login tiedot.
if (isset($_SERVER['PHP_AUTH_USER'])) {
    //Tarkistetaan käyttäjä tietokannasta.
    if (checkUser(openDb(), $_SERVER['PHP_AUTH_USER'], $_SERVER["PHP_AUTH_PW"])) {

        //Käyttäjä tunnistettu, joten luodaan vastaukseen JWT token payload.
        $payload = array(
            "iat" => time(),
            "sub" => $_SERVER['PHP_AUTH_USER']
        );

        //Luodaan signeerattu JWT.
        $jwt = JWT::encode($payload, base64_encode('mysecret'), 'HS256');

        //Lähetetään JSON muodossa infoteksti ja JWT token clientille.
        echo  json_encode(array("info" => "Kirjauduit sisään", "token" => $jwt));
        header('Content-Type: application/json');
        exit;
    }
}

//Login ei onnistunut. Käyttäjälle unauhtorized-otsikko sekä JSONissa info epäonnistumisesta.
echo '{"info":"Kirjautuminen epäonnistui"}';
header('Content-Type: application/json');
header('HTTP/1.1 401');
exit;
