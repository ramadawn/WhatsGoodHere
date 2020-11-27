<?php


class Restaurants {
    private $id;
    private $name;
    private $address;
    private $phone;

    public function __construct() {
        $this->id = 0;
        $this->name = '';
        $this->address = '';
        $this->phone = '';
        
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
     public function getAddress() {
        return $this->address;
    }

    public function setAddress($value) {
        $this->address = $value;
    }
     public function getPhone() {
        return $this->phone;
    }

    public function setPhone($value) {
        $this->phone = $value;
    }
   
    
}
?>

