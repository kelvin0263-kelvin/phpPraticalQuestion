<?php
class Item
{
    private $itemCode;
    private $description;
    private $price;

    public function __construct($itemCode, $description, $price){
        $this->itemCode = $itemCode;
        $this->description = $description;
        $this->price = $price;
    }

    public function getItemCode(){
        return $this->itemCode;
    }
    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setItemCode($itemCode) {
        $this->itemCode = $itemCode;    
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getDisplayInfo() {
        return $this->getItemCode() ."". $this->getDescription();
    }

   

}






?>