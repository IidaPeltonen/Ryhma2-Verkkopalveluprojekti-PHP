<?php


require_once 'inc/functions.php';
require_once 'inc/headers.php';

try {
    $db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    $sql = "select distinct trnimi from kirja";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    print json_encode($results);
    } catch (PDOException $pdoex) {
    returnError($pdoex);
    }
