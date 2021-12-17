<?php
// Tähän tiedostoon koottu kaikki funktiot.

// Tämä funktio luo tietokantayhteyden.
function openDb(): object {
    $ini= parse_ini_file("../../config.ini", true);
    $host = $ini['host'];
    $database = $ini['database'];
    $user = $ini['user'];
    $password = $ini['password'];
    $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db;
}
// Funktio, jota käytetään tietojen hakuun tietokannasta.
function selectAsJson(object $db,string $sql): void {
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    echo json_encode($results);
}
// Funktio, virhetilanteita varten. Palautetaan 500 internal server error.
function returnError(PDOException $pdoex): void {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    echo json_encode($error);
    exit;
}
// Funktio käyttäjän tietojen tarkistamiseen tietokannasta.
function checkUser(PDO $dbcon, $username, $passwd){
    //Sanitoidaan muuttujat
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $passwd = filter_var($passwd, FILTER_SANITIZE_STRING);

    try{
        //SQL komento, johon username parametrina
        $sql = "SELECT password FROM user WHERE username=?";
        //valmistellaan SQL-komento, tehdään kysely tietokantaan ja haetaan tulokset
        $prepare = $dbcon->prepare($sql);
        $prepare->execute(array($username));
        $rows = $prepare->fetchAll();

        //Käydään rivit läpi ja tarkistetaan salasana
        foreach($rows as $row){
            $pw = $row["password"];
            if( $pw === $passwd ){
                return true;
            }
        }
        //Jos ei löytynyt vastaavuutta tietokannasta, palautetaan false
        return false;
        // Catch, virhetilanteiden varalta.
    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }
}