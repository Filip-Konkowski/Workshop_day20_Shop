<?php

//require_once __DIR__("main.php");

require_once("index.php");
session_start();

if(isset($_SESSION['user']) != false){
    header("location: main.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $newUser = User::register($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['password2'],$_POST['address']);
    if($newUser != false){
        $_SESSION['user'] = $newUser;
        header ('location: main.php');
    }
    echo "register error";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>
    <link href="css/css_bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Please register</h1>
                <div class="account-wall">
                    <form class="form-signin" action="register.php" method="POST" >
                        <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        <input type="password" class="form-control" name="password1" placeholder="Password" required>
                        <input type="password" class="form-control" name="password2" placeholder="Repeat password" required>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                        <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                        <input type="text" class="form-control" name="address" placeholder="Address" required><br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" value="register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
