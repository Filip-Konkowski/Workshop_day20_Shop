<?php

//$router->map("GET", "", "index.php", "indexFile");

$router->map("GET", "/register", "registerHTML.php", "registerFile");
$router->map("POST", "/register", "register.php", "registerFilePost");
$router->map("GET|POST", "/", "login.php", "loginPost");
$router->map("GET", "/loggedUser/[i:userId]", "loggedUserHtml.php", "loggedUser");
$router->map("GET", "/panel", "loggedUserHtml.php", "panel");
$router->map("GET", "/logout", "logout.php", "logout");



$router->map("GET", "/viewAllItems", "viewAllItems.php", "viewAllItemsFile");
$router->map("GET", "/newItems", "addItem.php", "addItemsFile");
$router->map("POST", "/newItems", "addItem.php", "addItemsFilePost");
