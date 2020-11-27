<?php

// this is for foodID, FoodName, price, (restaurant id)restID
class Menu {
    private $id;
    private $name;
    private $price;
    private $restID;
    

    public function __construct() {
        $this->id = 0;
        $this->name = '';
        $this->price = 0;
        $this->restID = 0;
        
        
    }
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

     public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
     public function getPrice() {
        $formatted_price = number_format($this->price, 2);
        return $formatted_price;
    }

    public function setPrice($value) {
        $this->price = $value;
    }
     public function getRestID() {
        return $this->restID;
    }

    public function setRestID($value) {
        $this->restID = $value;
    }
  
    
}


?>