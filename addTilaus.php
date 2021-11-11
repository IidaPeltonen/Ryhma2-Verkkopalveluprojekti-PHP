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
$astunnus = filter_var($input->astunnus,FILTER_SANITIZE_STRING);
$pvm = filter_var($input->pvm,FILTER_SANITIZE_STRING);
$tila = filter_var($input->tila,FILTER_SANITIZE_STRING);


try {
    $db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = $db->prepare('insert into tilaus (astunnus, pvm, tila) values (:astunnus, :pvm, :tila)');
    $query->bindValue(':astunnus',$astunnus, PDO::PARAM_STR);
    $query->bindValue(':pvm',$pvm, PDO::PARAM_STR);
    $query->bindValue(':tila',$tila, PDO::PARAM_INT);
    $query->execute();

    header('HTTP/1.1 200 OK');
    $data = array('tilausnro' => $db->lastInsertId(),'astunnus' => $astunnus, 'pvm' => $pvm, 'tila' => $tila);
    print json_encode($data);
} catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}
?>