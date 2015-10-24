<?php

$router->map("GET", "register/", "registerHTML.php", "registerFile");
$router->map("POST", "register/", "register.php", "registerFilePost");
$router->map("GET", "login/", "login.php");
$router->map("GET", "viewAllItems/", "viewAllItems.php", "viewAllItemsFile");
$router->map("GET", "newItems/", "addItem.php", "addItemsFile");
$router->map("POST", "newItems/", "addItem.php", "addItemsFilePost");
