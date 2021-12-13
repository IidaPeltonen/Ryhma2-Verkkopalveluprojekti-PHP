<?php
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$firstname = filter_var($input->firstname,FILTER_SANITIZE_STRING);
$lastname = filter_var($input->lastname,FILTER_SANITIZE_STRING);
$username = filter_var($input->username,FILTER_SANITIZE_STRING);
$password = filter_var($input->password,FILTER_SANITIZE_STRING);

try {
    $db= openDb();    
    $query = $db->prepare('insert into user (firstname, lastname, username, password) values (:firstname, :lastname, :username, :password)');
    $query->bindValue(':firstname',$firstname, PDO::PARAM_STR);
    $query->bindValue(':lastname',$lastname, PDO::PARAM_STR);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':password',$password, PDO::PARAM_STR);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('userid' => $db->lastInsertId(),'firstname' => $firstname, 
        'lastname' => $lastname, 'username' => $username, 'password' => $password);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}