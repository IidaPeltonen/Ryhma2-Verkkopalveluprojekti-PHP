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
$tilausnro = filter_var($input->tilausnro,FILTER_SANITIZE_NUMBER_INT);
$asid = filter_var($input->asid,FILTER_SANITIZE_NUMBER_INT);
$pvm = filter_var($input->pvm,FILTER_SANITIZE_STRING);
$tila = filter_var($input->tila,FILTER_SANITIZE_STRING);


try {
    $db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    
    $query = $db->prepare('update tilaus set asid=:asid,pvm=:pvm,tila=:tila where tilausnro=:tilausnro');
    $query->bindValue(':tilausnro',$tilausnro, PDO::PARAM_INT);
    $query->bindValue(':asid',$asid, PDO::PARAM_INT);
    $query->bindValue(':pvm',$pvm, PDO::PARAM_STR);
    $query->bindValue(':tila', $tila, PDO::PARAM_STR);
    $query->execute();

    header('HTTP/1.1 200 OK');
    $data = array('tilausnro' => $tilausnro, 'asid' => $asid, 'pvm' => $pvm, 'tila' => $tila);
    print json_encode($data);
} catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}

?>