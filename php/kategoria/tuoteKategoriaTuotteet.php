<?php
// Tämä koodi hakee tietokannasta kirjat kategorioittain.
require_once '../../inc/functions.php';
require_once '../../inc/headers.php';
//Sanitoidaan ja suodatetaan url-osoite.
$uri = parse_url(filter_input(INPUT_SERVER, 'PATH_INFO'), PHP_URL_PATH);
$parameters = explode('/', $uri);
$category_id = $parameters[1];
// Avataan tietokantayhteys. Tehdään SQL-lause, jonka avulla saadaan haettua tietokannasta tietyn tuotekategorian kirjat.
// Palautetaan tietokannasta saadut tiedot ja 200 OK.
try {
$db = openDb();
$sql = "select * from kirja where category_id = $category_id";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);
// Catch mahdollisten virhetilanteiden varalta.
} catch (PDOException $pdoex) {
    returnError($pdoex);
}