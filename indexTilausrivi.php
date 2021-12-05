<?php

//EI TOIMI, MILLÄ MUUTTUJALLA PITÄISI HAKEA?

require_once 'inc/functions.php';
require_once 'inc/headers.php';

try {
    $db = openDb();
    selectAsJson($db, "select * from tilausrivi where tilausnro = ?");
    $prepare = $db->prepare($sql); 
    $prepare->execute(array($tilausnro));
    } catch (PDOException $pdoex) {
    returnError($pdoex);
    }
