<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
//trnimi puuttuu vielä
$sql = "SELECT ROW_NUMBER() over(order by sum(kpl) desc ) as rownum, kirja.kirjaid, kirjanimi,kirjailija, vuosi, kieli, kustantaja, kuvaus, hinta, saldo, kuva, SUM(kpl) AS SUM
FROM tilausrivi, kirja
where kirja.kirjaid = tilausrivi.kirjaid
GROUP by kirjaid
ORDER BY SUM(kpl) desc LIMIT 7";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);
