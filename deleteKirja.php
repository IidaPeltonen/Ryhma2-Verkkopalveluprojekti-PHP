<?php

header('Access-Control-Allow-Origin:' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Accept, Content-Type', 'Access-Control-Allow-Header');
header('Access-Control-Max-Age: 3600');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD']=== 'OPTIONS') {
    return 0;
}

$input = json_decode(file_get_contents('php://input'));
$kirjaid = filter_var($input->kirjaid,FILTER_SANITIZE_NUMBER_INT);

try {
    $db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   

    $query = $db->prepare('delete from kirja where kirjaid=(:kirjaid)');
    $query->bindValue(':kirjaid',$kirjaid, PDO::PARAM_INT);
    $query->execute();

    header('HTTP/1.1 200 OK');
    $data = array('kirjaid' => $kirjaid);
    print json_encode($data);
} catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}
?>