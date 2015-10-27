<?php

if (isset($_SESSION["user"]) == false) {
    header("Location: index.php");
}

$user = $_SESSION["user"];
$arrayUser = get_object_vars($user);

?>

<div class="container">
    <div class="row">

        <div class="col-md-9" id="userInfo">
            <p>User name: <?= $arrayUser["name"] ?> </p>
            <p>User surname: <?= $arrayUser["surname"] ?> </p>
            <p>User email: <?= $arrayUser["mail"] ?> </p>
            <p>User address: <?= $arrayUser["address"] ?> </p>
        </div>
        <div class="col-md-3" >
            <a class="btn btn-default" href="<?= $router->generate("logout") ?>">Logout</a>
        </div>
    </div>
</div>