<?php
//session_start();
require_once('src/User.php');
//require __DIR__. '/config/db.php';
$error = [];

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["email"]) && strlen(trim($_POST["email"])) > 1 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $email = trim($_POST["email"]);
    }
    else {
        $error["email"] = true;
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

?>
