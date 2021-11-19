<?php
// require_once './inc/headers.php';
require_once './inc/functions.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// try {
// $db= openDb();
// selectAsJson($db, 'select * from kirja');
// }
// catch (PDOException $pdoex) {
//     returnError($pdoex);
// }
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

$db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
$sql = "select * from kirja";
// // $sql = "select * from asiakas";
// // $sql = "select * from tilaus";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);

?>