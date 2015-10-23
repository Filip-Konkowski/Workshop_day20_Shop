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

    public $name;
    public $price;
    public $description;
    public $quantity;



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