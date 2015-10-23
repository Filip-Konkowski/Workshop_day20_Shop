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

}