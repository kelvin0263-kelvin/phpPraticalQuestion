<?php

class Stationary extends Item
{
    private $weight;

    function __construct($weight, $itemCode, $description, $price)
    {
        parent::__construct($itemCode, $description, $price);
        $this->weight = $weight;
    }

    public function getDisplayInfo()
    {
        $parentInfo = parent::getDisplayInfo();
        return "{$parentInfo}, Unit: {$this->weight}g";
    }

}





?>