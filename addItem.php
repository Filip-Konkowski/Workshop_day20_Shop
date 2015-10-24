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
    $dir = dirname(__FILE__);
    if(isset($_FILES)) {
        foreach($_FILES["files"]["tmp_name"] as $key => $tmpName){
            $fileName = $_FILES["files"]["name"][$key];
            $fileTmp = $_FILES["files"]["tmp_name"][$key];
            $uploadDir = $dir . "/photos/" . $fileName;
            move_uploaded_file($tmpName,$uploadDir);
            $itemId = $newItem->getId();
            $newItem->addPhoto($itemId, $uploadDir);
        }
        echo "pliki przeniesione <br>";
    }
    else {
        echo "wystapil blad przy przenoszeniu <br>";
    }

    if($newItem != false){
        echo "udalo sie dodac produkt";
    }
    else {
        echo "produkt nie dodany";
    }
}
?>


<form action="" enctype="multipart/form-data" method="post">
    <input type="text" id="itemName" name="itemName" placeholder="Name of Item">
    <input type="text" id="itemPrice" name="itemPrice" placeholder="Price of Item">
    <input type="text" id="itemDescription" name="itemDescription" placeholder="Description of Item">
    <input type="text" id="itemAvailableQuantity" name="itemAvailableQuantity" placeholder="Quantity of Item">
    <br>
    <input multiple="true" type="file" name="files[]" id="uploadFile">
    <input type="submit" id="submit" value="send">
</form>
