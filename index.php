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
$router->setBasePath('BASE_PATH');
include('routing.php');
$match = $router->match();

?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sklep</title>
        <link href="css/css_bootstrap/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">

    </div>
    </body>
    </html>



<?php
/*//dopisz html
include('register.php');

if($match){
    require
}
*/