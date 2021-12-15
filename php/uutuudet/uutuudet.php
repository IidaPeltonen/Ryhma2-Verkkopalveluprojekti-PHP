<?php
require_once '../../inc/headers.php';
require_once '../../inc/functions.php';

try {
$db= openDb();
selectAsJson($db, 'select * from kirja where vuosi = year(curdate())');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}

