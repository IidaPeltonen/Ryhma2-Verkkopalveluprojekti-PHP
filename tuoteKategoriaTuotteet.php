
<?php

require_once 'inc/functions.php';
require_once 'inc/headers.php';

 $uri = parse_url(filter_input(INPUT_SERVER, 'PATH_INFO'), PHP_URL_PATH);
 $parameters = explode('/',$uri);
 $category_id = $parameters[1];

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    
$sql="select * from kirja where trnimi = $category_id";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);
?>