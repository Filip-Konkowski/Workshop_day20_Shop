<?php
//session_start();
require_once('src/User.php');
//require __DIR__. '/config/db.php';
$error = [];

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["email"]) && strlen(trim($_POST["email"])) > 1 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $email = trim($_POST["email"]);
    } else {
        $error["email"] = true;
    }
    if (isset($_POST["name"]) && ctype_alpha($_POST["name"]) && strlen(trim($_POST["name"])) > 1){
        $name = trim($_POST["name"]);
    } else {
        $error["name"] = true;
    }
    if (isset($_POST["surname"]) && ctype_alpha($_POST["surname"]) && strlen(trim($_POST["surname"])) > 1){
        $name = trim($_POST["surname"]);
    } else {
        $error["surname"] = true;
    }
    if (isset($_POST["address"]) && strlen(trim($_POST["address"])) > 1){
        $name = trim($_POST["address"]);
    } else {
        $error["address"] = true;
    }

    if(count($error) == 0) {
        User::setConnection($db);
        $newUser = User::register($_POST["name"], $_POST["surname"], $_POST["email"], $_POST['password1'], $_POST["password2"], $_POST["address"]);
        if ($newUser != false) {
            $_SESSION["user"] = $newUser;
            echo ("Successful register");
        } else {
            echo ("Problem with register");
        }
    }
}

if (isset($error["email"])) {
    echo ("Uncorrect email address");
}
if (isset($error["name"])) {
    echo ("Name needs to be at least one letter long. Names with numbers are uncorrect");
}
if (isset($error["surname"])) {
    echo ("Surname needs to be at least one letter long. Surnames with numbers are uncorrect");
}
if (isset($error["address"])) {
    echo ("Address needs to be at least one letter long. Address with numbers are uncorrect");
}

?>
