
<?php




require_once 'inc/functions.php';
require_once 'inc/headers.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$uri = parse_url(filter_input(INPUT_SERVER, 'PATH_INFO'), PHP_URL_PATH);
$parameters = explode('/', $uri);
$category_id = $parameters[1];

$db = new PDO('mysql:host=localhost;dbname=kauppa;charset=utf8', 'root', '');

$sql = "select * from kirja where category_id = $category_id";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);
?>
