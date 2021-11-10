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
$kirjanimi = filter_var($input->kirjanimi,FILTER_SANITIZE_STRING);
$kirjailija = filter_var($input->kirjailija,FILTER_SANITIZE_STRING);
$vuosi = filter_var($input->vuosi,FILTER_SANITIZE_NUMBER_INT);
$kieli = filter_var($input->kieli,FILTER_SANITIZE_STRING);
$kustantaja = filter_var($input->kustantaja,FILTER_SANITIZE_STRING);
$trnro = filter_var($input->trnro,FILTER_SANITIZE_NUMBER_INT);
$kuvaus = filter_var($input->kuvaus,FILTER_SANITIZE_STRING);
$hinta = filter_var($input->hinta,FILTER_SANITIZE_NUMBER_INT);
$saldo = filter_var($input->saldo,FILTER_SANITIZE_NUMBER_INT);

try {
    $db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8','root','');
    
    $query = $db->prepare('insert into kirja (kirjanimi, kirjailija, vuosi, kieli, kustantaja, trnro, kuvaus, hinta, saldo) values (:kirjanimi, :kirjailija, :vuosi, :kieli, :kustantaja, :trnro, :kuvaus, :hinta, :saldo)');
    $query->bindValue(':kirjanimi',$kirjanimi, PDO::PARAM_STR);
    $query->bindValue(':kirjailija',$kirjailija, PDO::PARAM_STR);
    $query->bindValue(':vuosi', $vuosi, PDO::PARAM_INT);
    $query->bindValue(':kieli',$kieli, PDO::PARAM_STR);
    $query->bindValue(':kustantaja',$kustantaja, PDO::PARAM_STR);
    $query->bindValue(':trnro', $trnro, PDO::PARAM_INT);
    $query->bindValue(':kuvaus',$kuvaus, PDO::PARAM_STR);
    $query->bindValue(':hinta', $hinta, PDO::PARAM_INT);
    $query->bindValue(':saldo', $saldo, PDO::PARAM_INT);
    $query->execute();

    header('HTTP/1.1 200 OK');
    $data = array('kirjaid' => $db->lastInsertId(),'kirjanimi' => $kirjanimi, 'kirjailija' => $kirjailija, 'vuosi' => $vuosi, 'kieli' => $kieli, 'kustantaja' => $kustantaja, 'trnro' => $trnro,    'kuvaus' => $kuvaus, 'hinta' => $hinta, 'saldo' => $saldo);
    print json_encode($data);
} catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}
?>