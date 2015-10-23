<?php

require_once __DIR__ . "/vendor/autoload.php";
include ('config/db.php');

$db = new mysqli(DB_HOST, DB_PORT, DB_USER, DB_PASSWORD, DB_DB);

if($db->connect_error){
    die('nieudane. blad:' .  $db->connect_error);
}
else{
    echo 'polaczenie udane';
}
