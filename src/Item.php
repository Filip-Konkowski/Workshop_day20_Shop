<?php

/*
CREATE TABLE items(
        item_id INT AUTO_INCREMENT,
        item_name VARCHAR(60),
        item_price int,
        item_description VARCHAR(255),
        item_quantity int,
        PRIMARY KEY(item_id)
);

*/
class Item {

    static private $conn;
    public $id;
    public $name;
    public $price;
    public $description;
    public $quantity;

    static public function setConnection (mysqli $newConnection) {
        self::$conn = $newConnection;
    }

    static public function addItem($newName, $newPrice, $newDescription, $newQuantity){
        $sql = "INSERT INTO items (item_name, item_price, item_description, item_quantity)
                VALUES ('$newName', '$newPrice', '$newDescription', '$newQuantity')";

        $result = self::$conn->query($sql);

        if($result == true){
            $newItem = new Item(self::$conn->insert_id, $newName, $newPrice, $newDescription, $newQuantity );
            return $newItem;
        }
        return false;
    }

    public function getItemById($id){
        $sql = "SELECT * FROM items WHERE item_name= {$id}";
        $return = self::$conn->query($sql);
        if($return == true){
            if($return->row_nums == 1){
                $row = $return->fetch_assoc();
                $ItemById = new Item($row["item_id"], $row["item_name"], $row["item_price"], $row["item_description"], $row["item_quantity"]);
                return $ItemById;
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}