<?php
session_start();
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__. '/config/db.php';

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
if ($db->connect_error) {
    die('nieudane. blad:' . $db->connect_error);
}

$router = new AltoRouter();
$router->setBasePath(BASE_PATH);
require_once ("routing.php");
$match = $router->match();



if ($match["target"] == "loggedUserHtml.php"){
    require_once ($match["target"]);
}

else {
    require_once("header.php");
    if ($match) {
        require_once($match["target"]);
    }
    else{
        echo("nie ma takiej strony");
    }
    require_once("footer.php");
}

?>
