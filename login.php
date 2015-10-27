<?php

require_once( __DIR__ . '/src/User.php');


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = "";
    User::setConnection($db);
    $user = User::login($_POST["email"], $_POST["password"]);
    if($user != false){
        $_SESSION["user"] = $user;
        header("Location: loggedUser/{$user->getId()}");
    }
    $error = "uncorrect login or password";
}