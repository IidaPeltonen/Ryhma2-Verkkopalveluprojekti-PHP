<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
$sql = "SELECT distinct kirja.kirjaid, kirjanimi,kirjailija, vuosi, kieli, kustantaja, trnimi,  kuvaus, hinta, saldo, kuva, SUM(kpl)
FROM tilausrivi, kirja
where kirja.kirjaid = tilausrivi.kirjaid
GROUP by kirjaid
ORDER BY SUM(kpl) DESC LIMIT 7";
//$sql = "select * from kirja";
//$sql = "select * from asiakas";
//$sql = "select * from tilaus";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);

?>