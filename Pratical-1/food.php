<?php
//Name: Tan Chun Keat
//Student ID : 2314612
class Food extends Item
{
    private $unit;

    function __construct($unit, $itemCode, $description, $price)
    {
        parent::__construct($itemCode, $description, $price);
        $this->unit = $unit;
    }

    public function getDisplayInfo()
    {
        // Call the parent's method and add to it
        $parentInfo = parent::getDisplayInfo();
        return "{$parentInfo}, Unit: {$this->unit}";
    }


}





?>