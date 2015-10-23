<?php
session_start();
require_once('src/Item.php');
/*
if(!$userAdmin){ // TODO Jeżeli nie jest admin to wraca do index
    header("location: index.php");
}
*/

if($_SERVER["REQUEST_METHOD"] === "POST") {
    Item::setConnection($db);
    $newItem = Item::addItem($_POST["itemName"], $_POST["itemPrice"], $_POST["itemDescription"], $_POST["itemAvailableQuantity"]);
    if($newItem != false){
        echo "udalo sie dodac produkt";
    }
    else {
        echo "produkt nie dodany";
    }
}
?>


<form action="" method="post">
    <input type="text" id="itemName" name="itemName" placeholder="Name of Item">
    <input type="text" id="itemPrice" name="itemPrice" placeholder="Price of Item">
    <input type="text" id="itemDescription" name="itemDescription" placeholder="Description of Item">
    <input type="text" id="itemAvailableQuantity" name="itemAvailableQuantity" placeholder="Quantity of Item">
    <input type="submit" id="submit">
</form>