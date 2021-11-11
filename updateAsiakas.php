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
$asid = filter_var($input->asid,FILTER_SANITIZE_NUMBER_INT);
$astunnus = filter_var($input->astunnus,FILTER_SANITIZE_STRING);
$asnimi = filter_var($input->asnimi,FILTER_SANITIZE_STRING);
$asosoite = filter_var($input->asosoite,FILTER_SANITIZE_STRING);
$postinro = filter_var($input->postinro,FILTER_SANITIZE_STRING);
$postitmp = filter_var($input->postitmp,FILTER_SANITIZE_STRING);
$puhelin = filter_var($input->puhelin,FILTER_SANITIZE_STRING);
$email = filter_var($input->email,FILTER_SANITIZE_STRING);

try {
    $db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    
    $query = $db->prepare('update asiakas set astunnus=:astunnus,asnimi=:asnimi, asosoite=:asosoite, 
    postinro=:postinro, postitmp=:postitmp, puhelin=:puhelin, email=:email where asid=:asid');
    $query->bindValue(':asid',$asid, PDO::PARAM_INT);
    $query->bindValue(':astunnus',$astunnus, PDO::PARAM_STR);
    $query->bindValue(':asnimi',$asnimi, PDO::PARAM_STR);
    $query->bindValue(':asosoite', $asosoite, PDO::PARAM_STR);
    $query->bindValue(':postinro',$postinro, PDO::PARAM_STR);
    $query->bindValue(':postitmp',$postitmp, PDO::PARAM_STR);
    $query->bindValue(':puhelin', $puhelin, PDO::PARAM_STR);
    $query->bindValue(':email',$email, PDO::PARAM_STR);
    $query->execute();

    header('HTTP/1.1 200 OK');
    $data = array('asid' => $asid, 'astunnus' => $astunnus, 'asnimi' => $asnimi, 'asosoite' => $asosoite,
     'postinro' => $postinro, 'postitmp' => $postitmp, 'puhelin' => $puhelin, 'email' => $email);
    print json_encode($data);
} catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}

?>