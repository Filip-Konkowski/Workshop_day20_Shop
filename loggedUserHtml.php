<?php

if (isset($_SESSION["user"]) == false) {
    header("Location: index.php");
}

$user = $_SESSION["user"];

?>

<div class="container">
    <div class="row">
        <div class="col-md-3" >
            <a href="<?= $router->generate("logout") ?>">Logout</a>
        </div>
    </div>
</div>