<?php
function openDb(): object {
    $ini= parse_ini_file("../config.ini", true);

    $host = $ini['host'];
    $database = $ini['database'];
    $user = $ini['user'];
    $password = $ini['password'];
    $db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function selectAsJson(object $db, string $sql): int {
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    echo json_decode($results);
}

function executeInsert(object $db, string $sql): int {
    $query = $db->query($sql);
    return $db->lastInsertId();
}

function returnError(PDOException $pdoex): void {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    echo json_encode($error);
    exit;
}