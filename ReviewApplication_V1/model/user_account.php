<?php


class User_Account {
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;

    public function __construct() {
        $this->id = 0;
        $this->email = '';
        $this->password = '';
        $this->firstName = '';
        $this->lastName = '';
        
    }
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }
     public function getPassword() {
        return $this->password;
    }

    public function setPassword($value) {
        $this->password = $value;
    }
     public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) {
        $this->firstName = $value;
    }
     public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) {
        $this->lastName = $value;
    }
    
    public function setHashPassword($value){
        // use this to hash password before inputing them into db
        $hash = password_hash($value, PASSWORD_BCRYPT);
        $this->password = $hash;
    }
    
}
?>