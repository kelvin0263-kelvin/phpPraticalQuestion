<?php

require("item.php");
require("food.php");
require("stationary.php");


$item = [
    new food(10, 'F001', 'This is a food3', 10.00),
    new food(20, 'F002', 'This is a food2', 15.00),
    new Stationary(3.0, 'S001', 'This is a stationary1', 5.0),
    new Stationary(4.0, 'S002', 'This is a stationary2', 6.0)
];


foreach($item as $item){
    echo '<p>'. $item->getDisplayInfo() .'</p>';
}








?>