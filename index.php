<?php

require_once __DIR__ . "/vendor/autoload.php";
include('config/db.php');

$db = new mysqli(DB_HOST, DB_PORT, DB_USER, DB_PASSWORD, DB_DB);

if ($db->connect_error) {
    die('nieudane. blad:' . $db->connect_error);
} else {
    echo 'polaczenie udane';
}

$router = new AltoRouter();
$router->setBasePath(BASE_PATH);
require_once ("routing.php");
$match = $router->match()

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-shop</title>
    <link href="<?= DIR_PATH ?>css/css_bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIR_PATH ?>css/custom.css" rel="stylesheet">
</head>
<body>
<?php
require_once("header.php");
if ($match == true){
    var_dump($match);
    require_once ($match["target"]);
}
require_once("footer.php");

?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
