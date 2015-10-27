<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-shop</title>
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    <link href="<?= DIR_PATH ?>css/css_bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DIR_PATH ?>css/custom.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" id="E-shop" href="<?= $router->generate("viewAllItemsFile") ?>">E-shop</a>
        </div>

        <div class="collapse navbar-collapse" >
            <ul class="nav navbar-nav">
                <li id="register"><a href="<?= $router->generate("registerFile")?>">Register</a></li>
            </ul>
            <?php
                if (!isset($_SESSION["user"])){
                    echo '
                        <form class="navbar-form navbar-left" role="search" method="POST" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="password" name="password" placeholder="password">
                            </div>
                            <button type="submit" class="btn btn-default" id="login">Login</button>
                        </form>
                    ';
                }
            else{
                echo '<ul class="nav navbar-nav">
                <li id="userPanel"><a href="'.$router->generate("panel").'">Panel User</a></li>
                </ul>';
            }
            ?>

        </div>
    </div>
</nav>
